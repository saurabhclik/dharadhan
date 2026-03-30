@extends('layouts.main')

@section('content')
    <!-- START SECTION CONTACT US -->
    <section class="contact-us">
        <div class="container">
            <div class="property-location mb-5">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form method="post" action="{{ route('store.submit.request') }}">
                            <h3 class="mb-4">Submit Request</h3>
                            <div class="row ui-elements">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ request()->ref }}">
                                <div class="col-md-6 col-12 mb-4">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text" required class="form-control input-custom input-full"
                                            name="name" placeholder="Enter Your Name"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control input-custom input-full" name="phone"
                                            placeholder="Enter Phone" required value="{{ old('phone') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mb-4">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" required class="form-control input-custom input-full"
                                            name="location" placeholder="Enter Location"
                                            value="{{ old('location') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mb-4">
                                    <div class="form-group">
                                        <label>Agent Unique ID</label>
                                        <input type="text" readonly class="form-control input-custom input-full"
                                            name="unique_id" placeholder="Unique ID"
                                            value="{{ old('unique_id', $unique_id) }}">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12 mb-4">
                                    <div class="form-group">
                                        <label>Your Message</label>
                                        <textarea class="form-control textarea-custom input-full" name="message" rows="8"
                                            placeholder="Enter Message" required>{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-2 form-elemts mx-auto">
                                    <input type="submit" value="Send Request">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION CONTACT US -->
@endsection
