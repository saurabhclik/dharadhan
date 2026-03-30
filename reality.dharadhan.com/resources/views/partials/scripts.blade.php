<script src="{{ asset('js/script.js') }}"></script>
@auth
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="redirectTo" value="home">
    </form>
@endauth

<!-- Toastr CSS & JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    function initDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        const toggle = dropdown.querySelector('.nav-dropdown-toggle');

        let isOpen = false;

        // OPEN
        const openDropdown = () => {
            document.querySelectorAll('.nav-dropdown').forEach(d => {
                if (d !== dropdown) d.classList.remove('open');
            });
            dropdown.classList.add('open');
            isOpen = true;
        };

        // CLOSE
        const closeDropdown = () => {
            dropdown.classList.remove('open');
            isOpen = false;
        };

        /* CLICK TO TOGGLE */
        toggle.addEventListener('click', (e) => {
            e.stopPropagation();
            isOpen ? closeDropdown() : openDropdown();
        });

        /* HOVER TO OPEN */
        dropdown.addEventListener('mouseenter', openDropdown);

        /* LEAVE TO CLOSE */
        dropdown.addEventListener('mouseleave', closeDropdown);

        /* CLICK OUTSIDE TO CLOSE */
        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                closeDropdown();
            }
        });
    }

    $(document).ready(function() {
        @auth
            initDropdown('userDropdown');
        @endauth
        initDropdown('cityDropdown');

        // CSRF Token setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        @guest()
            // Login
            $("#loginForm").on("submit", function(e) {
                showLoader();
                e.preventDefault();
                $.post("{{ route('ajax.login') }}", $(this).serialize())
                    .done(function(res) {
                        if (res.status === 'success') {
                            toastr.success(res.message);
                            setTimeout(() => location.reload(), 1500);
                        } else {
                            hideLoader();
                            toastr.error(res.message);
                        }
                    })
                    .fail(function() {
                        hideLoader();
                        toastr.error("Server error, please try again.");
                    });
            });

            $("#log-login-btn").on("click", function(e) {
                let form = $("#loginForm");
                let password = form.find("input[name='password']").val().trim();
                let username = form.find("input[name='username']").val().trim();

                // Detect if input is email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                // Detect if input is phone number (10 digits, Indian)
                let phone = username.replace(/^\+91/, "");
                const phoneRegex = /^[6-9]\d{9}$/;

                console.log(phone);
                // Check empty
                if (username === "") {
                    toastr.error("Phone number or Email is required");
                    return false;
                }

                // If input contains '@' → treat as email
                if (username.includes("@")) {

                    if (!emailRegex.test(username)) {
                        toastr.error("Enter a valid email address");
                        return false;
                    }

                } else {
                    // Treat as phone
                    if (!phoneRegex.test(phone)) {
                        toastr.error("Enter a valid 10-digit Indian phone number");
                        return false;
                    }
                }

                if (password === "") {
                    toastr.error("Password is required");
                    return false;
                }

                // Update field with cleaned phone
                $("input[name='username']").val(phone);
            });

            $(".send-otp").click(function() {
                let mobile_number = $("#mobile_number").val().trim();
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
                $("#mobileNumber").text(mobile_number);
                $("#phone").val(mobile_number);

                $.post("{{ route('ajax.send.otp') }}", {
                        phone: mobile_number,
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(res) {
                        hideLoader();
                        if (res.status === 'success') {
                            toastr.success(res.message);
                            if (res.redirect) {
                                window.location.href = res.redirect;
                                return false;
                            }
                            $('#authModal').modal('hide');
                            $('#otpModal').modal('show');

                            setTimeout(() => {
                                $('#otpModal .otp-input:first').focus();
                            }, 300);
                        } else {
                            toastr.error(res.message);
                        }
                    })
                    .fail(function() {
                        hideLoader();
                        toastr.error("Failed to send OTP. Try again.");
                    });
            })

            $("#resend-otp").click(function() {
                showLoader();
                let phone = $("#phone").val();
                $.post("{{ route('ajax.send.otp') }}", {
                        phone: phone,
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(res) {
                        hideLoader();
                        if (res.status === 'success') {
                            toastr.success("OTP sent successfully!");
                        } else {
                            toastr.error(res.message);
                        }
                    })
                    .fail(function() {
                        hideLoader();
                        toastr.error("Failed to send OTP. Try again.");
                    });
            })

            $("#verify-otp").click(function(e) {
                e.preventDefault();
                let otp = finalOtp.value;
                let phone = $("#phone").val();

                if (otp.length < 6) {
                    return toastr.error("Please enter the OTP.");
                    return false
                }

                showLoader();
                $.post("{{ route('ajax.verify.otp') }}", {
                        otp: otp,
                        phone: phone,
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(res) {
                        hideLoader();
                        if (res.status === 'success') {
                            toastr.success(res.message);
                            if (res.redirect) {
                                window.location.href = res.redirect;
                            }
                        } else {
                            toastr.error(res.message);
                        }
                    })
                    .fail(function(xhr) {
                        hideLoader();
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, val) {
                                toastr.error(val[0]);
                            });
                        } else {
                            toastr.error("Server error, please try again.");
                        }
                    });
            });

            $("#saveRoleForm").on("submit", function(e) {
                // Prevent form from submitting first
                e.preventDefault();
                e.stopPropagation();

                let form = $(this);

                let role = form.find("select[name='role']").val();
                let checkedPlan = form.find("select[name='plan_type']").val();
                // No errors → submit form
                showLoader();
                $.post("{{ route('save.signup') }}", {
                        role: role,
                        plan_type: checkedPlan,
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(res) {
                        hideLoader();
                        if (res.status === 'success') {
                            toastr.success(res.message);
                            if (res.redirect) {
                                window.location.href = res.redirect;
                            }
                        } else {
                            toastr.error(res.message);
                        }
                    })
                    .fail(function(xhr) {
                        hideLoader();
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, val) {
                                toastr.error(val[0]);
                            });
                        } else {
                            toastr.error("Server error, please try again.");
                        }
                    });
            });

            $("#saveTermForm").on("submit", function(e) {
                // Prevent form from submitting first
                e.preventDefault();
                e.stopPropagation();

                let form = $(this);
                // No errors → submit form
                showLoader();
                $.post("{{ route('save.signup') }}", {
                        terms: form.find("input[name='terms']:checked").val(),
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(res) {
                        hideLoader();
                        if (res.status === 'success') {
                            toastr.success(res.message);
                            if (res.redirect) {
                                window.location.href = res.redirect;
                            }
                        } else {
                            toastr.error(res.message);
                        }
                    })
                    .fail(function(xhr) {
                        hideLoader();
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, val) {
                                toastr.error(val[0]);
                            });
                        } else {
                            toastr.error("Server error, please try again.");
                        }
                    });
            });

            $("#savePolicyForm").on("submit", function(e) {
                // Prevent form from submitting first
                e.preventDefault();
                e.stopPropagation();

                let form = $(this);
                // No errors → submit form
                showLoader();
                $.post("{{ route('save.signup') }}", {
                        policy: form.find("input[name='policy']:checked").val(),
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(res) {
                        hideLoader();
                        if (res.status === 'success') {
                            toastr.success(res.message);
                            if (res.redirect) {
                                window.location.href = res.redirect;
                            }
                        } else {
                            toastr.error(res.message);
                        }
                    })
                    .fail(function(xhr) {
                        hideLoader();
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, val) {
                                toastr.error(val[0]);
                            });
                        } else {
                            toastr.error("Server error, please try again.");
                        }
                    });
            });

            $("#saveAddressForm").on("submit", function(e) {
                // Prevent form from submitting first
                e.preventDefault();
                e.stopPropagation();

                let form = $(this);

                let address = form.find("input[name='address']").val();
                let country = 1;
                let state = form.find("select[name='state']").val();
                let city = form.find("select[name='city']").val();
                let postal_code = form.find("input[name='postal_code']").val().trim();
                let hasError = false;
                if (address === "") {
                    toastr.error("Address is required");
                    hasError = true;
                }

                if (country === "") {
                    toastr.error("country is required");
                    hasError = true;
                }

                if (state === "") {
                    toastr.error("State is required");
                    hasError = true;
                }

                if (city === "") {
                    toastr.error("City is required");
                    hasError = true;
                }

                if (postal_code === "") {
                    toastr.error("Postal code is required");
                    hasError = true;
                } else if (!/^\d{4,10}$/.test(postal_code)) {
                    toastr.error("Postal code must be a valid number");
                    hasError = true;
                }

                // Stop submit if any error
                if (hasError) {
                    return false;
                }

                let role = form.find("select[name='role']").val();
                let checkedPlan = $('input[name="plan_type"]:checked').val();
                // No errors → submit form
                showLoader();
                $.post("{{ route('save.signup') }}", {
                        address: address,
                        country: country,
                        state: state,
                        city: city,
                        postal_code: postal_code,
                        role: role,
                        plan_type: checkedPlan,
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(res) {
                        hideLoader();
                        if (res.status === 'success') {
                            toastr.success(res.message);
                            if (res.redirect) {
                                window.location.href = res.redirect;
                            }
                        } else {
                            toastr.error(res.message);
                        }
                    })
                    .fail(function(xhr) {
                        hideLoader();
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, val) {
                                toastr.error(val[0]);
                            });
                        } else {
                            toastr.error("Server error, please try again.");
                        }
                    });
            });

            $("#saveUserForm").on("submit", function(e) {
                // Prevent form from submitting first
                e.preventDefault();
                e.stopPropagation();

                let form = $(this);

                let name = form.find("input[name='name']").val();
                let email = form.find("input[name='email']").val();
                let utr_number = form.find("input[name='utr_number']").val();
                let password = form.find("input[name='password']").val();
                let password_confirmation = form.find("input[name='password_confirmation']").val();
                let hasError = false;

                if (name === "") {
                    toastr.error("Name is required");
                    hasError = true;
                }

                if (utr_number === "") {
                    toastr.error("UTR Number is required");
                    hasError = true;
                }

                if (email === "") {
                    toastr.error("Email is required");
                    hasError = true;
                }

                if (password === "") {
                    toastr.error("Password is required");
                    hasError = true;
                }

                if (password !== password_confirmation) {
                    toastr.error("Passwords do not match");
                    hasError = true;
                }

                // Stop submit if any error
                if (hasError) {
                    return false;
                }

                // No errors → submit form
                showLoader();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('save.signup') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },

                    success: function (res) {
                        hideLoader();

                        if (res.status === 'success') {
                            toastr.success(res.message);

                            if (res.redirect) {
                                window.location.href = res.redirect;
                            }
                        } else {
                            toastr.error(res.message);
                        }
                    },

                    error: function (xhr) {
                        hideLoader();

                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function (key, val) {
                                toastr.error(val[0]);
                            });
                        } else {
                            toastr.error("Server error, please try again.");
                        }
                    }
                });
            });
        @endguest
    });
</script>

<script>
    $(document).ready(function() {
        if($('#country').length) $('#country').niceSelect('destroy');
        if($('#state').length) $('#state').niceSelect('destroy');
        if($('#city').length) $('#city').niceSelect('destroy');

        $.get('/countries', function(data) {

            let $country = $('#country');

            $country.empty(); // clear old options

            $.each(data, function(i, country) {
                $country.append('<option value="' + country.id + '">' + country.country_name +
                    '</option>');
            });

            // ---- Auto select first option ----
            if (data.length > 0) {
                $country.val(data[0].id); // select first country
                $country.trigger('change'); // fire change event to update states/cities
            }
        });

        $(".tab-btn").click(function(){
            $(".tab-btn").removeClass('active');
            $(this).addClass('active');
            $(this).data('value', 'c');
        });
    });

    $('#country').on('change', function() {
        let countryId = $(this).val();
        $('#state').html('<option value="">Loading...</option>');
        $('#city').html('<option value="">Select City</option>');

        $.get('/states/' + countryId, function(data) {
            $('#state').html('<option value="">Select State</option>');
            $.each(data, function(i, state) {
                $('#state').append('<option value="' + state.id + '">' + state.state +
                    '</option>');
            });

        });
    });

    $('#state').on('change', function() {
        let stateId = $(this).val();

        $('#city').html('<option value="">Loading...</option>');

        $.get('/cities/' + stateId, function(data) {
            $('#city').html('<option value="">Select City</option>');
            $.each(data, function(i, city) {
                $('#city').append('<option value="' + city.id + '">' + city.city + '</option>');
            });
        });
    });
</script>
