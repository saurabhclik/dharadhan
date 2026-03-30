<!-- Footer -->
<footer class="footer pb-0">
    <div class="container pb-0">
        <div class="footer-content">
            <div class="footer-column">
                <h3>Dharadhan</h3>
                <ul>
                    <li><a href="https://reality.dharadhan.com/">Real estate</a></li>
                    <li><a href="http://finance.dharadhan.com/">Finance</a></li>
                    <li><a href="http://consultants.dharadhan.com/">Insurance</a></li>
                    <li><a href="https://dharadhan.com/">Solar Energy</a></li>
                    <li><a href="https://dharadhan.com/">Mutual Funds & Trading</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Company</h3>
                <ul>
                    <li><a href="{{ route('about') }}">About us</a></li>
                    <li><a href="{{ route('contact') }}">Contact us</a></li>
                    <li><a href="{{ route('career') }}">Career with us</a></li>
                    <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                    <li><a href="{{ route('refund.policy') }}">Refund & Cancellation</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Our Partners</h3>
                <ul>
                    <li>Shree Krishnam Associates</li>
                    <li>Andromeda</li>
                    <li>Bonanza</li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>RESOURCES</h3>
                <div class="contact-info">
                    <p><img src="{{ asset('v2/assets/mail.png') }}" width="20"> {{ get_setting('company_email') }}</p>
                    <p><img src="{{ asset('v2/assets/phone.png') }}" width="20"> {{ get_setting('company_phone_number') }}</p>
                </div>
                <div class="footer-qr">
                    {{ 
                        QrCode::size(150)
                        ->margin(2)
                        ->style('round')
                        ->eye('circle')
                        ->color(0, 0, 0)
                        ->backgroundColor(255, 255, 255)
                        ->generate(route('contact')) 
                    }}
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="mb-0">Copyright © {{ date('Y') }}. {{ config('app.name') }}</p>
            <div class="logo">
                <a href="{{ route('index') }}">
                    <img src="{{ config('settings.site_logo_lite') ?? asset('images/logo-footer.svg') }}" alt="Dharadhan">
                </a>
            </div>
            <div class="social-links">
                <a href="{{ get_setting('facebook_link') }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="{{ get_setting('twitter_link') }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="{{ get_setting('instagram_link') }}"><i class="fa fa-instagram"></i></a>
                <a href="{{ get_setting('youtube_link') }}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- LOGIN MODAL -->
<div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content auth-modal">

            <button type="button" class="auth-close" data-bs-dismiss="modal">
                &times;
            </button>

            <div class="row g-0">

                <!-- LEFT IMAGE -->
                <div class="col-lg-6 d-none d-lg-block auth-left">
                <div class="auth-logo">
                    <img src="{{ config('settings.site_logo_lite') ?? asset('images/logo-footer.svg') }}" alt="Dharadhan">
                </div>
                </div>

                <!-- RIGHT FORM -->

                <div class="col-lg-6 auth-right">

                    <!-- LOGIN -->
                    <div id="loginSection">
                        <h3>Login</h3>
                        <p>Please enter your credentials</p>

                        <form id="loginForm" novalidate>
                            <div class="mb-3">
                                <input type="text" class="form-control auth-input"
                                name="username" placeholder="Mobile No / Email" required>
                            </div>

                            <div class="mb-3 position-relative">
                                <input type="password" class="form-control auth-input"
                                id="loginPassword" name="password" placeholder="Password" required>
                                <i class="bi bi-eye auth-eye"
                                onclick="togglePassword('loginPassword', this)"></i>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <label class="auth-checkbox">
                                <input type="checkbox"> Remember me
                                </label>
                                <a href="{{ route('password.forgot') }}" class="auth-link">Forgot?</a>
                            </div>

                            <button type="submit" id="log-login-btn" class="btn auth-btn w-100">Login</button>

                            <p class="auth-footer">
                                New to Dharadhan?
                                <a href="#" onclick="showRegister()">Register Here</a>
                            </p>
                        </form>
                    </div>

                    <!-- REGISTER -->
                    <div id="registerSection" class="d-none">
                        <h3>Register</h3>
                        <p>Enter your mobile number</p>

                        <form id="registerForm" novalidate>
                            <div class="mb-3 mobile-input">
                                <span class="country-code">🇮🇳 +91</span>
                                <input type="tel"
                                class="form-control auth-input"
                                id="mobile_number"
                                placeholder="Enter Mobile Number"
                                maxlength="10"
                                pattern="[6-9][0-9]{9}" required>
                            </div>

                            <small class="text-danger d-none" id="mobileError">
                                Enter valid Indian mobile number
                            </small>

                            <button class="btn auth-btn w-100 mt-3 send-otp">
                                Create Account
                            </button>

                            <p class="auth-footer">
                                Already have an account?
                                <a href="#" onclick="showLogin()">Login</a>
                            </p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .footer-qr {
        text-align: center;
        max-width: 140px;
    }

    .footer-qr .qr-title {
        font-size: 13px;
        font-weight: 500;
        color: #777;
        margin-bottom: 8px;
    }

    .footer-qr .qr-image {
        width: 110px;
        height: 110px;
        object-fit: contain;
        border-radius: 12px;
        padding: 8px;
        background: #fff;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    }

    .auth-right {
    padding: 40px;
    }

    .mobile-input {
    position: relative;
    }

    .country-code {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    font-weight: 600;
    }

    .mobile-input input {
    padding-left: 80px;
    }

    .auth-input {
    height: 48px;
    border-radius: 6px;
    }

    .auth-btn {
    background: #f58220;
    color: #fff;
    height: 48px;
    border-radius: 6px;
    font-weight: 600;
    }

    .auth-btn:hover {
    background: #e06f0f;
    }

    .auth-footer {
    text-align: center;
    margin-top: 15px;
    }
</style>

<script>
    function showRegister() {
        document.getElementById('loginSection').classList.add('d-none');
        document.getElementById('registerSection').classList.remove('d-none');
    }

    function showLogin() {
        document.getElementById('registerSection').classList.add('d-none');
        document.getElementById('loginSection').classList.remove('d-none');
    }

    // Indian mobile validation
    document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const mobile = document.getElementById('mobile_number').value.trim();
    const error = document.getElementById('mobileError');
    const regex = /^[6-9]\d{9}$/;

    if (!regex.test(mobile)) {
        error.classList.remove('d-none');
        return false;
    }

    error.classList.add('d-none');
    });

    (function() {
        'use strict';
        const forms = document.querySelectorAll('#loginForm, #registerForm');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })
    ();
</script>

