@extends('layouts.backend')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <div class="row g-3 align-items-center justify-content-between">
            <div class="col-auto">
                <h5 class="mb-0">Enrollments</h5>
                <small class="text-muted">Manage student enrollments</small>
            </div>
            
            <div class="col-auto">
                <div class="d-flex gap-2">
                    <!-- Search Form -->
                    <form action="{{ route('enroll.index') }}" method="GET" class="d-flex gap-2">
                        <div class="input-group">
                            <input type="search" 
                                   name="search" 
                                   class="form-control" 
                                   placeholder="Search by email or name..."
                                   value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>

                    <a href="{{ route('enroll.create') }}" class="btn btn-primary d-flex align-items-center">
                        <i class="bi bi-plus-lg me-2"></i> New Enrollment
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(isset($enrollments) && $enrollments->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Student</th>
                            <th scope="col">Course</th>
                            <th scope="col">Reference</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enrollments as $enrollment)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset($enrollment->user->profile_image ?? 'images/default-avatar.png') }}" 
                                             class="rounded-circle" 
                                             width="32" 
                                             height="32"
                                             alt="Avatar">
                                        <div>
                                            <div class="fw-semibold">{{ $enrollment->user->name ?? 'N/A' }}</div>
                                            <div class="small text-muted">{{ $enrollment->user->email ?? 'N/A' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset($enrollment->course->thumbnail ?? 'images/default-course.png') }}" 
                                             class="rounded" 
                                             width="40" 
                                             height="40" 
                                             alt="Course">
                                        {{ $enrollment->course->title ?? 'N/A' }}
                                    </div>
                                </td>
                                <td>{{ $enrollment->reference_number ?? '—' }}</td>
                                <td>LKR {{ number_format($enrollment->amount ?? 0, 2) }}</td>
                                <td>
                                    @php
                                        $status = strtolower($enrollment->status ?? 'pending');
                                        $statusClass = [
                                            'approved' => 'bg-success',
                                            'rejected' => 'bg-danger',
                                            'pending' => 'bg-warning text-dark'
                                        ][$status] ?? 'bg-secondary';
                                    @endphp
                                    <span class="badge {{ $statusClass }}">{{ ucfirst($status) }}</span>
                                </td>
                                <td>{{ $enrollment->created_at?->format('d M, Y') ?? '—' }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-end">
                                        <a href="{{ route('enrollments.show', $enrollment->id) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        
                                        @if(!empty($enrollment->payment_receipt))
                                            <a href="{{ asset($enrollment->payment_receipt) }}" 
                                               target="_blank" 
                                               class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-file-earmark-arrow-down"></i>
                                            </a>
                                        @endif

                                        <form action="{{ route('enroll.destroy', $enrollment->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this enrollment?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-3">
    
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-inbox display-4 text-muted"></i>
                <p class="mt-3 text-muted">No enrollments found</p>
                <a href="{{ route('enroll.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i> Add Enrollment
                </a>
            </div>
        @endif
    </div>
</div>
@endsection