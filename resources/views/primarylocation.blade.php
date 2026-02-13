@extends('layouts.main')

@section('content')
    <input type="hidden" id="step" name="step" value="{{ $step }}">
    <input type="hidden" id="nextstep" name="nextstep" value="three">
    <!-- STAR HEADER SEARCH -->
    <section id="hero-area" class="hero-section pb-0 parallax-searchs home17 overlay pt-2" data-stellar-background-ratio="0.5">
        <div class="hero-main">
            <div class="container" data-aos="zoom-in">
                <div class="banner-inner-wrap">
                    <div class="row post-property">
                        <div class="col-md-4 col-12">
                            @include('frontend.post.sidebar')
                        </div>
                        <div class="col-md-8 col-12 post-section">
                            @if(session()->has('post_id'))
                                <div class="banner-inner text-white mb-2">
                                    <h5 class="sub-title mb-0">Editing Property #{{ session('post_id') }}</h5>
                                </div>
                            @endif
                            @include('frontend.post.location')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HEADER SEARCH -->
@endsection


@push('styles')
    <link rel="stylesheet" href="{{ asset('v2/css/default.css') }}">
    <style>
        .single-add-property {
            background: unset;
            margin-bottom: 0px;
            padding: 0px;
        }
        .property-form-group{
            padding: 0;
        }
        .parallax-searchs .form-group{
            width: 100%;
        }
    </style>
@endpush
