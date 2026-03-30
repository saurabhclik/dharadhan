@extends('layouts.main')

@section('content')
    <!-- START SECTION CONTACT US -->
    <section class="contact-us">
        <div class="container">
            <div class="property-location mb-5">
                <h3>Our Location</h3>
                <div class="divider-fade"></div>
                <div class="@if(get_setting('company_map_location')) contact-map @else text-center @endif">
                    @if(get_setting('company_map_location'))
                        {!! get_setting('company_map_location') !!}
                    @else
                        <p class="text-center">Map location is not available.</p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <h3 class="mb-4">Contact Us</h3>
                    <form id="contactform" class="contact-form" name="contactform" method="post" novalidate>
                        <div id="success" class="successform">
                            <p class="alert alert-success font-weight-bold" role="alert">Your message was sent
                                successfully!</p>
                        </div>
                        <div id="error" class="errorform">
                            <p>Something went wrong, try refreshing and submitting the form again.</p>
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control input-custom input-full" name="name"
                                placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control input-custom input-full" name="lastname"
                                placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-custom input-full" name="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control textarea-custom input-full" id="ccomment" name="message" required rows="8"
                                placeholder="Message"></textarea>
                        </div>
                        <button type="submit" id="submit-contact" class="btn btn-primary btn-lg">Submit</button>
                    </form>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="call-info">
                        <h3>Get in Touch</h3>
                        <p class="mb-5">We are here to guide you with clarity and commitment.
                            Reach out to our team for property support, financial solutions, or expert consultancy.</p>
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p">{{ get_setting('company_address') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p">{{ get_setting('company_phone_number') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti">{{ get_setting('company_email') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="info cll">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <p class="in-p ti">
                                        Monday – Saturday<br>
                                        10:00 AM – 7:00 PM
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION CONTACT US -->
@endsection

@push('styles')
    <style>
        .contact-us .contact-map
        {
            height: auto;
        }
    </style>
@endpush
