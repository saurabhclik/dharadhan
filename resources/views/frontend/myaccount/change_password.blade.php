@extends('layouts.myaccount')

@section('content')
    <!-- START SECTION USER PROFILE -->
    <section class="user-page pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-xs-6 widget-boxed">
                    <div class="my-address">
                        <h3 class="heading pt-0">Change Password</h3>
                        <form action="{{ route('myaccount.save.password') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group name">
                                        <label>Current Password</label>
                                        <input type="password" name="current_password" class="form-control"
                                            placeholder="Current Password" value="{{ old('current_password') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group email">
                                        <label>New Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="New Password" value="{{ old('password') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="form-group subject">
                                        <label>Confirm New Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Confirm New Password" value="{{ old('password_confirmation') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="send-btn mt-2">
                                        <button type="submit" class="btn btn-common">Send Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION USER PROFILE -->
@endsection
