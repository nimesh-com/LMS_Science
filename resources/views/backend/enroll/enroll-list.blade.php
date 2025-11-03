
@extends('layouts.backend')

@section('content')
<style>
    .enroll-grid {
        display: grid;
        grid-template-columns: repeat( auto-fit, minmax(320px, 1fr) );
        gap: 1.25rem;
    }
    .enroll-card {
        background: #fff;
        border-radius: 12px;
        padding: 1rem;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        transition: transform .18s ease, box-shadow .18s ease;
        display: flex;
        align-items: stretch;
        gap: 1rem;
    }
    .enroll-card:hover { transform: translateY(-6px); box-shadow: 0 18px 40px rgba(15,23,42,0.08); }
    .enroll-thumb {
        width: 120px;
        height: 80px;
        border-radius: 8px;
        object-fit: cover;
        flex-shrink: 0;
        box-shadow: 0 6px 18px rgba(2,6,23,0.06);
    }
    .enroll-body { flex: 1; display: flex; flex-direction: column; gap: .5rem; }
    .enroll-title { font-weight: 700; color: #0f172a; margin: 0; }
    .enroll-meta { color: #6b7280; font-size: .92rem; }
    .enroll-actions { margin-top: auto; display: flex; gap: .5rem; }
    .badge-status {
        padding: .35rem .6rem;
        border-radius: 999px;
        font-weight: 600;
        font-size: .8rem;
    }
    .empty-state { text-align: center; padding: 3.5rem 1rem; color: #64748b; }
    @media (max-width: 576px) {
        .enroll-card { flex-direction: column; align-items: stretch; }
        .enroll-thumb { width: 100%; height: 160px; }
    }
</style>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-0">Enrollments</h5>
        <small class="text-muted">Recent student enrollments</small>
    </div>
    <a href="{{ route('enroll.create') }}" class="btn btn-primary btn-sm d-flex align-items-center">
        <i class="fas fa-plus me-2"></i> New Enrollment
    </a>
</div>

@if(isset($enrollments) && $enrollments->count() > 0)
<div class="enroll-grid">
    @foreach($enrollments as $enrollment)
    <div class="enroll-card">
        <img src="{{ asset($enrollment->course->thumbnail ?? 'https://via.placeholder.com/300x180') }}" alt="thumb" class="enroll-thumb">

        <div class="enroll-body">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6 class="enroll-title">{{ $enrollment->course->title ?? 'Course Title' }}</h6>
                    <div class="enroll-meta">
                        Student: {{ $enrollment->user->name ?? $enrollment->student_name ?? 'Student' }}
                        &nbsp;•&nbsp;
                        {{ optional($enrollment->created_at)->format('d M, Y') ?? '-' }}
                    </div>
                </div>

                <div class="text-end">
                    @php
                        $status = strtolower($enrollment->status ?? 'pending');
                        $statusClass = $status === 'approved' ? 'bg-success text-white' : ($status === 'rejected' ? 'bg-danger text-white' : 'bg-warning text-dark');
                    @endphp
                    <span class="badge-status {{ $statusClass }}">{{ ucfirst($status) }}</span>
                </div>
            </div>

            <div class="mt-1 text-muted small">
                Ref: <strong>{{ $enrollment->reference_number ?? '—' }}</strong>
                &nbsp;·&nbsp;
                Amount: <strong>LKR {{ number_format($enrollment->amount ?? ($enrollment->course->price ?? 0), 2) }}</strong>
            </div>

            <div class="enroll-actions">
                <a href="{{ route('enrollments.show', $enrollment->id) }}" class="btn btn-outline-primary btn-sm d-flex align-items-center">
                    <i class="bi bi-eye me-2"></i> View
                </a>

                @if(!empty($enrollment->payment_receipt))
                <a href="{{ asset($enrollment->payment_receipt) }}" target="_blank" class="btn btn-outline-secondary btn-sm d-flex align-items-center">
                    <i class="bi bi-file-earmark-arrow-down me-2"></i> Receipt
                </a>
                @endif

                <form action="{{ route('enroll.destroy', $enrollment->id) }}" method="POST" onsubmit="return confirm('Delete this enrollment?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                        <i class="bi bi-trash me-2"></i> Remove
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-4">

</div>

@else
<div class="card">
    <div class="card-body">
        <div class="empty-state">
            <i class="bi bi-inbox display-4"></i>
            <p class="mt-3 mb-0">No enrollments yet.</p>
        </div>
    </div>
</div>
@endif

@endsection