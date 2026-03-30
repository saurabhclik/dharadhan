@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="fas fa-times-circle text-danger" style="font-size: 5rem;"></i>
                    </div>
                    <h2 class="mb-3">Payment Failed!</h2>
                    <p class="text-muted mb-4">We couldn't process your payment. Please try again or contact support.</p>
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        No amount has been deducted from your account.
                    </div>
                    
                    <div class="mt-4">
                        <button class="btn btn-primary btn-lg px-5" onclick="history.back()">
                            <i class="fas fa-redo me-2"></i>Try Again
                        </button>
                        <a href="{{ route('contact') }}" class="btn btn-outline-secondary btn-lg px-5 ms-2">
                            <i class="fas fa-headset me-2"></i>Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection