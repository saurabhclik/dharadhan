@guest
<style>
    .otp-input {
        width: 45px;
        height: 50px;
        text-align: center;
        font-size: 20px;
        border: 1px solid #ddd;
        border-radius: 6px;
    }

    .otp-wrapper {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 20px 0;
    }
</style>

<div class="modal fade" id="otpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content auth-modal">

            <button type="button" class="auth-close" data-bs-dismiss="modal">
                &times;
            </button>

            <div class="row g-0">

                <!-- LEFT IMAGE -->
                <div class="col-lg-6 d-none d-lg-block auth-left">
                    <div class="auth-logo">
                        <img src="{{ config('settings.site_logo_lite') ?? asset('images/logo-footer.svg') }}" alt="Logo">
                    </div>
                </div>

                <!-- RIGHT FORM -->
                <div class="col-lg-6 auth-right text-center">
                    <h3>OTP Verification</h3>
                    <p>Enter the OTP sent to <strong>+91 <span id="mobileNumber"></span></strong></p>

                    <form id="otpForm" novalidate>
                        <input type="hidden" id="phone" name="phone">
                        <input type="hidden" id="opt" name="opt">

                        <div class="otp-wrapper">
                            <input type="text" maxlength="1" class="otp-input" />
                            <input type="text" maxlength="1" class="otp-input" />
                            <input type="text" maxlength="1" class="otp-input" />
                            <input type="text" maxlength="1" class="otp-input" />
                            <input type="text" maxlength="1" class="otp-input" />
                            <input type="text" maxlength="1" class="otp-input" />
                        </div>

                        <button type="button" id="verify-otp" class="btn auth-btn w-100">
                            Continue
                        </button>
                    </form>

                    <div class="lost_password mt-3">
                        <span>Didn’t receive OTP?</span>
                        <a href="javascript:void(0);" id="resend-otp">Resend</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endguest

@push('scripts')
    <script>
        const inputs = document.querySelectorAll("#otpModal .otp-input");
        const finalOtp = document.getElementById("opt");

        inputs.forEach((input, index) => {

            input.addEventListener("input", () => {
                input.value = input.value.replace(/[^0-9]/g, "");

                if (input.value && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }

                updateOTP();
            });

            input.addEventListener("keydown", (e) => {
                if (e.key === "Backspace" && !input.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });

        function updateOTP() {
            let otp = "";
            inputs.forEach(i => otp += i.value);
            finalOtp.value = otp;
        }

    </script>
@endpush

