<div class="modal fade" id="razorpayModal" tabindex="-1" aria-labelledby="razorpayModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #B54F32, #B54F32); color: white;">
                <h5 class="modal-title" id="razorpayModalLabel">
                    <i class="fas fa-credit-card me-2"></i>Complete Payment
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div id="paymentLoader" class="text-center py-4" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Processing payment...</p>
                </div>
                
                <div id="paymentForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body text-center p-4">
                                    <h6 class="text-muted mb-3">Payment Amount</h6>
                                    <!-- <h2 class="text-primary mb-0" id="modalAmount">₹0</h2> -->
                                    <p class="text-muted small mt-2" id="modalPlanType"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body p-4">
                                    <h6 class="text-muted mb-3">Payment Summary</h6>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Subtotal:</span>
                                        <span id="modalSubtotal">₹0</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Tax:</span>
                                        <span id="modalTax">₹0</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between fw-bold">
                                        <span>Total:</span>
                                        <span class="text-primary" id="modalTotal">₹0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-lg" id="payNowBtn" 
                            style="background: linear-gradient(135deg, #B54F32, #B54F32); color: white; border: none; padding: 12px 40px; border-radius: 50px; font-weight: 600;">
                            <i class="fas fa-lock me-2"></i>Pay Now
                        </button>
                        <button type="button" class="btn btn-lg btn-outline-secondary ms-2" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </div>

                <div id="paymentSuccess" style="display: none;">
                    <div class="text-center py-4">
                        <div class="success-animation">
                            <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
                        </div>
                        <h3 class="mt-4">Payment Successful!</h3>
                        <p class="text-muted">Your payment has been processed successfully.</p>
                        <div class="payment-details bg-light p-3 rounded mt-3">
                            <p class="mb-1"><strong>Payment ID:</strong> <span id="successPaymentId"></span></p>
                            <!-- <p class="mb-1"><strong>Amount:</strong> <span id="successAmount"></span></p> -->
                            <p class="mb-0"><strong>Date:</strong> <span id="successDate"></span></p>
                        </div>
                        <button type="button" class="btn btn-primary mt-4" onclick="window.location.reload()">
                            <i class="fas fa-check me-2"></i>Continue
                        </button>
                    </div>
                </div>

                <div id="paymentFailed" style="display: none;">
                    <div class="text-center py-4">
                        <div class="failed-animation">
                            <i class="fas fa-times-circle text-danger" style="font-size: 5rem;"></i>
                        </div>
                        <h3 class="mt-4">Payment Failed!</h3>
                        <p class="text-muted" id="failureMessage">Something went wrong. Please try again.</p>
                        <button type="button" class="btn btn-primary mt-4" onclick="retryPayment()">
                            <i class="fas fa-redo me-2"></i>Try Again
                        </button>
                        <button type="button" class="btn btn-outline-secondary mt-4 ms-2" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    let currentOrderId = null;
    let currentPaymentId = null;

    function initializePayment(amount, planType, planDuration) 
    {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '{{ route("payment.create.order") }}',
                type: 'POST',
                data: {
                    amount: amount,
                    plan_type: planType,
                    plan_duration: planDuration,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) 
                {
                    if (response.status === 200) 
                    {
                        currentOrderId = response.data.order_id;
                        currentPaymentId = response.data.payment_id;
                        $('#modalPlanType').text(planType + ' Plan (' + planDuration + ')');
                        $('#modalSubtotal').text('₹' + amount);
                        $('#modalTax').text('₹0');
                        $('#modalTotal').text('₹' + amount);
                        $('#razorpayModal').data('payment-info', {
                            key: response.data.key,
                            amount: response.data.amount,
                            currency: response.data.currency,
                            name: response.data.name || '{{ Auth::user()?->name ?? "Guest" }}',
                            description: response.data.description,
                            order_id: response.data.order_id,
                            email: response.data.email || '{{ Auth::user()?->email ?? "" }}',
                            contact: response.data.contact || '{{ Auth::user()?->phone ?? "" }}'
                        });
                        
                        resolve(response);
                    } 
                    else 
                    {
                        toastr.error(response.message || 'Failed to create order');
                        reject(response);
                    }
                },
                error: function(xhr) 
                {
                    let errorMessage = 'Failed to create payment order. Please try again.';
                    if (xhr.status === 401) 
                    {
                        errorMessage = 'Please login to continue with payment.';
                        $('#authModal').modal('show');
                    } 
                    else if (xhr.responseJSON && xhr.responseJSON.message) 
                    {
                        errorMessage = xhr.responseJSON.message;
                    }
                    
                    toastr.error(errorMessage);
                    reject(xhr);
                }
            });
        });
    }

    function openRazorpayCheckout() 
    {
        const paymentInfo = $('#razorpayModal').data('payment-info');
        if (!paymentInfo) 
        {
            toastr.error('Payment information not found');
            return;
        }

        var options = {
            key: paymentInfo.key,
            amount: paymentInfo.amount,
            currency: paymentInfo.currency,
            name: '{{ config("app.name") }}',
            description: paymentInfo.description,
            order_id: paymentInfo.order_id,
            handler: function(response) {
                verifyPayment(response);
            },
            prefill: {
                name: paymentInfo.name,
                email: paymentInfo.email,
                contact: paymentInfo.contact
            },
            notes: {
                address: 'Razorpay Corporate Office'
            },
            theme: {
                color: '#B54F32'
            },
            modal: {
                ondismiss: function() 
                {
                    $('#paymentForm').show();
                    $('#paymentLoader').hide();
                }
            }
        };

        var rzp = new Razorpay(options);
        
        rzp.on('payment.failed', function(response) 
        {
            handlePaymentFailure(response.error);
        });

        $('#paymentForm').hide();
        $('#paymentLoader').show();
        
        rzp.open();
    }

    function verifyPayment(response) 
    {
        $.ajax({
            url: '{{ route("payment.verify") }}',
            type: 'POST',
            data: {
                razorpay_payment_id: response.razorpay_payment_id,
                razorpay_order_id: response.razorpay_order_id,
                razorpay_signature: response.razorpay_signature,
                _token: '{{ csrf_token() }}'
            },
            success: function(result) 
            {
                $('#paymentLoader').hide();
                if (result.status === 200) 
                {
                    $('#paymentForm').hide();
                    $('#paymentFailed').hide();
                    $('#successPaymentId').text(result.data.payment_id);
                    $('#successAmount').text('₹' + result.data.amount || paymentInfo.data.amount/100);
                    $('#successDate').text(new Date().toLocaleDateString());
                    $('#paymentSuccess').show();
                    
                    toastr.success(result.message);
                    
                    if (result.redirect) 
                    {
                        setTimeout(function() 
                        {
                            window.location.href = result.redirect;
                        }, 2000);
                    }
                } 
                else 
                {
                    handlePaymentFailure({ description: result.message });
                }
            },
            error: function() 
            {
                $('#paymentLoader').hide();
                handlePaymentFailure({ description: 'Payment verification failed' });
            }
        });
    }

    function handlePaymentFailure(error) 
    {
        $('#paymentLoader').hide();
        $('#paymentForm').hide();
        $('#paymentSuccess').hide();
        $('#failureMessage').text(error.description || 'Payment failed. Please try again.');
        $('#paymentFailed').show();
    }

    function retryPayment() 
    {
        $('#paymentFailed').hide();
        $('#paymentForm').show();
        $('#paymentLoader').hide();
    }

    $('#razorpayModal').on('show.bs.modal', function() 
    {
        $('#paymentForm').show();
        $('#paymentSuccess').hide();
        $('#paymentFailed').hide();
        $('#paymentLoader').hide();
    });

    $('#payNowBtn').on('click', function() 
    {
        openRazorpayCheckout();
    });
</script>
@endpush