
@extends('layouts.backend')

@section('content')
<style>
    .receipt-preview {
        max-height: 480px;
        object-fit: contain;
        border-radius: 8px;
        box-shadow: 0 8px 24px rgba(15,23,42,0.06);
        width: 100%;
    }
    .meta-row { gap: 1rem; display:flex; flex-wrap:wrap; align-items:center; }
    .meta-item { background:#f8fafc; padding:.6rem .85rem; border-radius:8px; color:#374151; font-weight:600; }
    .badge-status { padding:.4rem .7rem; border-radius:999px; font-weight:700; }
    .actions > form, .actions > a { display:inline-block; margin-right:.5rem; }
    .card-modern { border-radius:12px; box-shadow:0 10px 30px rgba(2,6,23,0.06); border:0; }
</style>

<div class="card card-modern mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
                <h4 class="mb-1">{{ $enrollment->course->title ?? 'Course' }}</h4>
                <div class="text-muted small">
                    Enrollment for: <strong>{{ $enrollment->user->name ?? $enrollment->student_name ?? 'Student' }}</strong>
                    &nbsp;•&nbsp;
                    {{ optional($enrollment->created_at)->format('d M, Y H:i') ?? '-' }}
                </div>
            </div>

            @php
                $status = strtolower($enrollment->status ?? 'pending');
                $statusClass = $status === 'approved' ? 'bg-success text-white' : ($status === 'rejected' ? 'bg-danger text-white' : 'bg-warning text-dark');
            @endphp
            <div class="text-end">
                <span class="badge-status {{ $statusClass }}">{{ ucfirst($status) }}</span>
                <div class="text-muted small mt-2">Ref: <strong>{{ $enrollment->reference_number ?? '—' }}</strong></div>
            </div>
        </div>

        <div class="row gy-3">
            <div class="col-md-6">
                <div class="mb-3">
                    <h6 class="mb-1">Payment / Enrollment Details</h6>
                    <div class="meta-row mt-2">
                        <div class="meta-item">Amount: LKR {{ number_format($enrollment->amount ?? ($enrollment->course->price ?? 0), 2) }}</div>
                        <div class="meta-item">Course ID: {{ $enrollment->course->id ?? '-' }}</div>
                        <div class="meta-item">Enrollment ID: {{ $enrollment->id }}</div>
                    </div>

                    <div class="mt-3">
                        <p class="mb-1 text-muted">Notes</p>
                        <div class="p-3 bg-light rounded">
                            {{ $enrollment->notes ?? 'No additional notes.' }}
                        </div>
                    </div>
                </div>

                <div class="mt-3 actions">
                    @if($status !== 'approved')
                    <form action="{{ route('enroll.update', $enrollment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="approved">
                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Approve this enrollment and grant course access?');">
                            <i class="bi bi-check2-circle me-1"></i> Approve & Grant Access
                        </button>
                    </form>
                    @endif

                    @if($status !== 'rejected')
                    <form action="{{ route('enroll.update', $enrollment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Reject this enrollment?');">
                            <i class="bi bi-x-circle me-1"></i> Reject
                        </button>
                    </form>
                    @endif

                    @if(!empty($enrollment->payments->first()->receipt))
                   <a href="{{ asset('storage/' . $enrollment->payments->first()->receipt) }}" target="_blank" class="btn btn-outline-secondary btn-sm">
    <i class="bi bi-download me-1"></i> Download Receipt
</a>

                    @endif

                    @if($status === 'approved')
                    <a href="{{ route('courses.show', $enrollment->course->id) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-arrow-right-circle me-1"></i> View Course (student)
                    </a>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <h6 class="mb-2">Payment Receipt</h6>

              @if($enrollment->payments->isNotEmpty())
    @php
        $receiptPath = 'public/' . $enrollment->payments->first()->receipt;
        $ext = strtolower(pathinfo($receiptPath, PATHINFO_EXTENSION));
        $imgExt = in_array($ext, ['jpg','jpeg','png','gif','webp']);
    @endphp

    @if($imgExt)
        <a href="{{ asset($receiptPath) }}" target="_blank">
            <img src="{{ asset($receiptPath) }}" alt="Receipt" class="receipt-preview mb-2">
        </a>
        <div class="small text-muted">Click image to open full size in a new tab.</div>
    @elseif($ext === 'pdf')
        <iframe src="{{ asset($receiptPath) }}" class="receipt-preview" frameborder="0"></iframe>
    @else
        <div class="p-3 bg-light rounded">
            <p class="mb-1">Receipt file:</p>
            <a href="{{ asset($receiptPath) }}" target="_blank" class="fw-bold">{{ basename($receiptPath) }}</a>
        </div>
    @endif
@else
    <div class="p-3 bg-light rounded text-center text-muted">No payment receipt uploaded.</div>
@endif

            </div>
        </div>
    </div>
</div>
@endsection