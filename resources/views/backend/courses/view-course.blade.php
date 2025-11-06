@extends('layouts.backend')

@section('content')

<style>
    /* Modern admin table card styling */
    .card-modern {
        border: 0;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(47, 57, 77, 0.06);
        overflow: hidden;
    }
    .card-modern .card-header {
        background: linear-gradient(90deg, rgba(59,130,246,0.08), rgba(99,102,241,0.04));
        border-bottom: 1px solid rgba(0,0,0,0.03);
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
    }
    .card-modern h6 {
        margin: 0;
        font-weight: 700;
        color: #0f172a;
    }
    .table-modern {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }
    .table-modern thead th {
        background: #f8fafc;
        color: #334155;
        font-weight: 700;
        border-bottom: 0;
        vertical-align: middle;
        padding: 1rem 0.75rem;
        text-align: center;
    }
    .table-modern tbody tr {
        transition: background .18s ease, transform .18s ease;
    }
    .table-modern tbody tr:hover {
        background: rgba(14,165,233,0.03);
        transform: translateY(-2px);
    }
    .table-modern td {
        vertical-align: middle;
        padding: 0.75rem;
    }
    .thumb-sm {
        width: 96px;
        height: 64px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 6px 18px rgba(2,6,23,0.06);
    }
    .actions .btn {
        min-width: 92px;
    }
    .empty-state {
        padding: 4rem 0;
    }
    @media (max-width: 576px) {
        .table-modern thead { display: none; }
        .table-modern tbody td { display: block; text-align: right; padding-left: 50%; position: relative; }
        .table-modern tbody td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 0.75rem;
            text-align: left;
            font-weight: 600;
            color: #475569;
        }
        .actions .btn { width: 48%; min-width: 0; display: inline-block; }
    }
</style>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card card-modern mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <h6 class="m-0">Courses List</h6>
            <span class="ms-3 text-muted small">Manage and publish your course offerings</span>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm d-flex align-items-center">
                <i class="fas fa-plus me-2"></i> Add Course
            </a>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table-modern table mb-0">
                <thead>
                    <tr>
                        <th style="width:6%;">#</th>
                        <th class="text-start">Title</th>
                        <th style="width:18%;">Thumbnail</th>
                        <th style="width:12%;">Price (LKR)</th>
                        <th style="width:22%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($Courses && $Courses->count() > 0)
                        @foreach ($Courses as $course)
                            <tr class="align-middle">
                                <td data-label="#" class="text-center">{{ $loop->iteration }}</td>

                                <td data-label="Title" class="text-start">
                                    <div class="fw-bold">{{ $course->title }}</div>
                                    <div class="text-muted small">{{ Str::limit($course->description ?? '', 80) }}</div>
                                </td>

                                <td data-label="Thumbnail" class="text-center">
                                    <img src="{{ asset($course->thumbnail) }}" 
                                         alt="Thumbnail" 
                                         class="thumb-sm mx-auto d-block">
                                </td>

                                <td data-label="Price" class="text-center">
                                    <span class="badge bg-light text-dark px-3 py-2">
                                        {{ number_format($course->price, 2) }}
                                    </span>
                                </td>

                                <td data-label="Action" class="text-center">
                                    <div class="d-flex justify-content-center gap-2 actions flex-wrap">
                                        <a href="{{ route('courses.edit', $course->id) }}" 
                                           class="btn btn-outline-primary btn-sm d-flex align-items-center">
                                            <i class="fas fa-edit me-2"></i> Edit
                                        </a>

                                        <form action="{{ route('courses.destroy', $course->id) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this course?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                                <i class="fas fa-trash me-2"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                <div class="text-center empty-state">
                                    <i class="bi bi-inbox display-4 text-muted"></i>
                                    <p class="mt-3 mb-0 text-muted">No courses found. <a href="{{ route('courses.create') }}">Create your first course</a></p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
