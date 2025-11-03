@extends('layouts.backend')

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 fw-bold text-primary">Courses List</h6>
        <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Course
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary text-nowrap">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Price (LKR)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($Courses && $Courses->count() > 0)
                        @foreach ($Courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $course->title }}</td>
                                <td>
                                    <img src="{{ asset($course->thumbnail) }}" 
                                         alt="Thumbnail" 
                                         class="img-thumbnail rounded mx-auto d-block" 
                                         style="max-width: 100px;">
                                </td>
                                <td>{{ number_format($course->price, 2) }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                                        <a href="{{ route('courses.edit', $course->id) }}" 
                                           class="btn btn-sm btn-warning me-4 mb-2 d-flex align-items-center">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('courses.destroy', $course->id) }}" 
                                              method="POST" 
                                              class="mb-2 mr-3"
                                              onsubmit="return confirm('Are you sure you want to delete this course?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center">
                                                <i class="fas fa-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center text-muted">No courses found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
