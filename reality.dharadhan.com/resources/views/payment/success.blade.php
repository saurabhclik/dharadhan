@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
                    </div>
                    <h2 class="mb-3">Payment Successful!</h2>
                    <p class="text-muted mb-4">Thank you for your payment. Your transaction has been completed successfully.</p>
                    
                    <div class="payment-details bg-light p-4 rounded text-start mb-4">
                        <h5 class="mb-3">Payment Details</h5>
                        
                        <div class="row mb-2">
                            <div class="col-6 text-muted">Payment ID:</div>
                            <div class="col-6 fw-bold">#{{ $payment->id }}</div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-6 text-muted">Razorpay Payment ID:</div>
                            <div class="col-6 fw-bold">{{ $payment->razorpay_payment_id }}</div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-6 text-muted">Amount:</div>
                            <div class="col-6 fw-bold text-primary">{{ $payment->formatted_amount }}</div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-6 text-muted">Plan:</div>
                            <div class="col-6 fw-bold">{{ ucfirst($payment->plan_type) }} ({{ ucfirst($payment->plan_duration) }})</div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-6 text-muted">Date:</div>
                            <div class="col-6 fw-bold">{{ $payment->paid_at->format('d M Y, h:i A') }}</div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-6 text-muted">Status:</div>
                            <div class="col-6">
                                <span class="badge bg-success">Paid</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection