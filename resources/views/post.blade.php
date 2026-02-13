@extends('layouts.main')

@section('content')
    <input type="hidden" id="step" name="step" value="{{ $step }}">
    <input type="hidden" id="nextstep" name="nextstep" value="two">
    <!-- STAR HEADER SEARCH -->
    <section id="hero-area" class="hero-section parallax-searchs home17 overlay pb-0 pt-2" data-stellar-background-ratio="0.5">
        <div class="hero-main">
            <div class="container" data-aos="zoom-in">
                <div class="banner-inner-wrap">
                    <div class="row post-property">
                        @include('frontend.post.post')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HEADER SEARCH -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('v2/css/default.css') }}">
@endpush
