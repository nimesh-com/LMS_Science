@extends('layouts.frontend')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Important Notice -->
            <div class="alert alert-warning border-start border-4 border-primary" role="alert">
                <h5 class="fw-bold text-danger mb-2">Important Notice</h5>
                <p class="mb-1">Before submitting your payment details, please make the payment to the following bank account:</p>
                <ul class="mb-2">
                    <li><strong>Account Name:</strong> Nimesh Jayawickrama</li>
                    <li><strong>Bank:</strong> Bank of Ceylon (BOC)</li>
                    <li><strong>Account Number:</strong> 0083490823</li>
                </ul>
                <p class="mb-0">
                    You can make the payment through <strong>online banking</strong> or any <strong>deposit machine</strong>.
                    After payment, please enter your <strong>Payment Reference Number</strong> and upload your <strong>receipt slip</strong>.
                </p>
            </div>

            <!-- Course Summary Card -->
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h5 class="mb-0">Course Summary</h5>
                </div>
                <div class="card-body">
                    <p class="fs-5 mb-2"><strong>Course Title:</strong> {{ $course->title }}</p>
                    <p class="fs-5 mb-0"><strong>Price:</strong> LKR {{ number_format($course->price, 2) }}</p>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0 text-white">Submit Your Payment Details</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('enroll.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                        <!-- Payment Reference Number -->
                        <div class="mb-3">
                            <label for="referenceNumber" class="form-label">Payment Reference Number</label>
                            <input
                                type="text"
                                class="form-control"
                                id="referenceNumber"
                                name="reference_number"
                                placeholder="Enter your payment reference number"
                            >
                            <small class="form-text text-muted">
                                💡 <strong>Hint:</strong> You can find the payment reference number on your bank slip or online banking transaction receipt.
                                Make sure to copy it exactly as shown (e.g., “TXN123456” or “BOC123456789”).
                            </small>
                        </div>

                        <!-- Upload Payment Receipt -->
                        <div class="mb-3">
                            <label for="paymentReceipt" class="form-label">Upload Payment Receipt</label>
                            <input
                                type="file"
                                class="form-control"
                                id="paymentReceipt"
                                name="payment_receipt"
                                accept=".jpg,.jpeg,.png,.pdf"
                                required>
                            <small class="form-text text-muted">
                                📎 Accepted formats: JPG, JPEG, PNG, or PDF (Max size: 5MB)
                            </small>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit Payment</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection