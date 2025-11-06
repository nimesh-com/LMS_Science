@extends('layouts.frontend')

@section('content')
<style>
    .custom-card {
        border-radius: 15px;
        transition: transform 0.2s;
    }
    .custom-card:hover {
        transform: translateY(-5px);
    }
    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }
    .payment-steps {
        position: relative;
        padding: 20px;
        background: linear-gradient(145deg, #f8f9fa, #ffffff);
        border-radius: 15px;
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- flash & validation messages --}}
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                <strong>There were some problems with your submission:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{-- /flash & validation messages --}}

            <!-- Course Title Header -->
            <div class="text-center mb-4">
                <h2 class="fw-bold text-primary">Course Enrollment</h2>
                <p class="text-muted">Complete your enrollment for {{ $course->title }}</p>
            </div>

            <!-- Payment Steps -->
            <div class="payment-steps mb-4">
                <div class="row g-4">
                    <div class="col-md-4 text-center">
                        <div class="icon-circle bg-primary-subtle mx-auto">
                            <i class="fas fa-money-bill-wave text-primary fs-4"></i>
                        </div>
                        <h6 class="fw-bold">1. Make Payment</h6>
                        <small class="text-muted">Transfer the course fee</small>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="icon-circle bg-success-subtle mx-auto">
                            <i class="fas fa-receipt text-success fs-4"></i>
                        </div>
                        <h6 class="fw-bold">2. Save Reference</h6>
                        <small class="text-muted">Note payment reference</small>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="icon-circle bg-info-subtle mx-auto">
                            <i class="fas fa-check-circle text-info fs-4"></i>
                        </div>
                        <h6 class="fw-bold">3. Submit Details</h6>
                        <small class="text-muted">Complete enrollment</small>
                    </div>
                </div>
            </div>

            <!-- Payment Information -->
            <div class="card custom-card shadow-sm mb-4 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-circle bg-warning-subtle me-3">
                            <i class="fas fa-info-circle text-warning fs-4"></i>
                        </div>
                        <h5 class="mb-0">Payment Information</h5>
                    </div>
                    <div class="bg-light p-3 rounded-3">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <p class="mb-1"><strong>Account Name</strong></p>
                                <p class="text-muted">Nimesh Jayawickrama</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-1"><strong>Bank</strong></p>
                                <p class="text-muted">Bank of Ceylon (BOC)</p>
                            </div>
                            <div class="col-12">
                                <p class="mb-1"><strong>Account Number</strong></p>
                                <p class="text-muted mb-0">0083490823</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Summary -->
            <div class="card custom-card shadow-sm mb-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Course Details</h5>
                        <span class="badge bg-success rounded-pill">LKR {{ number_format($course->price, 2) }}</span>
                    </div>
                    <hr>
                    <h6>{{ $course->title }}</h6>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="card custom-card shadow border-0">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Submit Payment Details</h5>
                    <form action="{{route('enroll.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                        <div class="mb-4">
                            <label for="referenceNumber" class="form-label">Payment Reference Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                <input type="text" class="form-control @error('reference_number') is-invalid @enderror" id="referenceNumber" name="reference_number" 
                                    placeholder="Enter reference number" value="{{ old('reference_number') }}">
                            </div>
                            @error('reference_number')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @else
                                <div class="form-text">
                                    <i class="fas fa-info-circle"></i> Find this on your bank slip or transaction receipt
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="paymentReceipt" class="form-label">Upload Payment Receipt</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                <input type="file" class="form-control @error('payment_receipt') is-invalid @enderror" id="paymentReceipt" name="payment_receipt" 
                                    accept=".jpg,.jpeg,.png,.pdf" required>
                            </div>
                            @error('payment_receipt')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @else
                                <div class="form-text">
                                    <i class="fas fa-paperclip"></i> JPG, JPEG, PNG, or PDF (Max: 5MB)
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-check-circle me-2"></i>Complete Enrollment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection