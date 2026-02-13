@extends('layouts.main')

@section('content')
    <section class="about-us fh p-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 who-1 mb-4">
                    <div class="banner-inner">
                        <div class="password-section ui-elements">
                            <div class="row ui-buttons">
                                @if (session()->has('otp_verified') == false)
                                    <div class="col-md-6 form-elemts mx-auto" id="mobileBox">
                                        <div class="flex-wrap">
                                            <h2 class="text-left mb-4">Forgot Password</h2>
                                            <input type="text" id="mobile"
                                                @if (session()->has('phone')) value="{{ session()->get('phone') }}" @endif
                                                placeholder="Enter Mobile" autocomplete="new-password">
                                            <input type="submit" class="mt-4" id="send_otp_text" onclick="sendOtp()"
                                                value="@if (session()->has('otpsession_id')) Resend OTP @else Send OTP @endif"
                                                autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-elemts" id="otpBox"
                                        @if (session()->has('otpsession_id') == false) style="display:none;" @endif>
                                        <div class="flex-wrap">
                                            <div>
                                                <h2 class="text-left mb-4">Verify OTP</h2>
                                                <input type="text" id="otp" placeholder="Enter OTP">
                                                <input type="submit" class="mt-4" onclick="verifyOtp()" value="Verify OTP"
                                                    autocomplete="new-password">
                                                <div id="timer"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-6 mx-auto form-elemts" id="passwordBox"
                                    @if (session()->has('otp_verified') == false) style="display:none;" @endif>
                                    <div class="flex-wrap">
                                        <div>
                                            <h2 class="text-left mb-4">Reset Password</h2>
                                            <input type="password" id="password" placeholder="New Password"
                                                autocomplete="new-password">
                                            <input type="password" class="mt-4" id="password_confirmation" placeholder="Confirm Password"
                                                autocomplete="new-password">
                                            <input type="submit" class="mt-4" onclick="resetPassword()" value="Reset Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        #otpBox {
            margin-top: 0;
        }

        @media (max-width: 768px) {
            #otpBox {
                margin-top: 20px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function sendOtp() {
            let mobile_number = $("#mobile").val().trim();
            mobile_number = mobile_number.replace(/^(\+91)/, "");
            const phoneRegex = /^[6-9]\d{9}$/;
            if (mobile_number === "") {
                toastr.error("Mobile No is required");
                return false;
            }

            if (!phoneRegex.test(mobile_number)) {
                toastr.error("Enter a valid 10-digit Indian Mobile No");
                return false;
            }

            showLoader();
            $.post("{{ route('password.sendOtp') }}", {
                mobile: mobile_number
            }, function(res) {
                hideLoader();
                if (res.status === 'success') {
                    toastr.success(res.message);
                    $('#otpBox').show();
                    $("#mobileBox").addClass("mx-auto");
                    $("#send_otp_text").val("Resend OTP");
                } else {
                    toastr.error(res.message);
                }
            }).fail(function() {
                hideLoader();
                toastr.error("Failed to send OTP. Try again.");
            });
        }

        function verifyOtp() {
            showLoader();
            $.post("{{ route('password.verifyOtp') }}", {
                otp: $('#otp').val()
            }, function(res) {
                hideLoader();
                if (res.status === 'success') {
                    $('#otpBox').hide()
                    $('#mobileBox').hide();
                    $('#passwordBox').show();
                    toastr.success("OTP verified successfully!");
                } else {
                    $('#otpBox').show()
                    $('#mobileBox').show();
                    $('#passwordBox').hide();
                    toastr.error(res.message);
                }
            }).fail(function() {
                hideLoader();
                toastr.error("Failed to verify OTP. Try again.");
            });
        }

        function resetPassword() {
            showLoader();
            $.post("{{ route('password.reset.mobile') }}", {
                password: $('#password').val(),
                password_confirmation: $('#password_confirmation').val()
            }, function(res) {
                if (res.status == "success") {
                    toastr.success(res.message);
                    window.location.href = res.redirect_url;
                } else {
                    toastr.error(res.message);
                }
            }).fail(function() {
                hideLoader();
                toastr.error("Failed to reset password. Try again.");
            });
        }
    </script>
@endpush
