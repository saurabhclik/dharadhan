@extends('layouts.main')

@section('content')
    <!-- START SECTION PROPERTIES LISTING -->
    <section class="single-proper blog details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 blog-pots">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="headings-2 pt-0">
                                <div class="pro-wrapper">
                                    <div class="detail-wrapper-body">
                                        <div class="listing-title-bar">
                                            <h3>{{ $property->title }}</h3>
                                            <div class="mt-0">
                                                <a href="javascript:void(0);;" class="listing-address">
                                                    <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>
                                                    {{ $property->location }}
                                                </a>
                                            </div>
                                            <span class="mrg-l-5 category-tag">For Sale</span>                                            
                                            @include('partials.reactions')
                                        </div>
                                    </div>
                                    <div class="single detail-wrapper mr-2">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h4>{{ formatPrice($property->price) }}</h4>
                                                <div class="mt-0">
                                                    <a href="javascript:void(0);;" class="listing-address">
                                                        <p>{{ formatPrice($property->getPricePerSqft()) }} / sq ft</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            @if ($property->images->where('type', 'property') && $property->images->where('type', 'property')->count())
                                <!-- main slider carousel items -->
                                <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                    <h5 class="mb-4">Gallery</h5>
                                    <div class="carousel-inner">

                                        @foreach ($property->images->where('type', 'property') as $index => $image)
                                            <div class="item carousel-item @if ($index == 0) active @endif"
                                                data-slide-number="{{ $index }}">
                                                <img src="{{ asset('storage/' . $image->path) }}" class="img-fluid"
                                                    alt="slider-listing">
                                            </div>
                                        @endforeach

                                        <a class="carousel-control left" href="#listingDetailsSlider" data-slide="prev"><i
                                                class="fa fa-angle-left"></i></a>
                                        <a class="carousel-control right" href="#listingDetailsSlider" data-slide="next"><i
                                                class="fa fa-angle-right"></i></a>

                                    </div>
                                    <!-- main slider carousel nav controls -->
                                    <ul class="carousel-indicators smail-listing list-inline">
                                        @foreach ($property->images->where('type', 'property') as $index => $image)
                                            <li class="list-inline-item active">
                                                <a id="carousel-selector-0"
                                                    @if ($index == 0) class="selected" @endif
                                                    data-slide-to="{{ $index }}" data-target="#listingDetailsSlider">
                                                    <img src="{{ asset('storage/' . $image->path) }}" class="img-fluid"
                                                        alt="listing-small">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!-- main slider carousel items -->
                                </div>
                            @endif

                            <div class="blog-info details mb-30">
                                <h5 class="mb-4">Description</h5>
                                {!! $property->description !!}
                            </div>
                        </div>
                    </div>

                    <div class="single homes-content details mb-30">
                        <!-- title -->
                        <h5 class="mb-4">Property Details</h5>
                        <ul class="homes-list clearfix">
                            <li>
                                <span class="font-weight-bold mr-1">Property ID:</span>
                                <span class="det">{{ $property->id }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Property Type:</span>
                                <span class="det">{{ ucfirst($property->property_type) }}</span>
                            </li>
                            <li>
                                <span class="font-weight-bold mr-1">Property For :</span>
                                <span class="det">{{ ucfirst($property->mode) }}</span>
                            </li>

                            @if($property->bedrooms)
                                <li>
                                    <span class="font-weight-bold mr-1">Rooms:</span>
                                    <span class="det">{{ $property->bedrooms }}</span>
                                </li>
                            @endif
                            @if ($property->bathrooms)
                                <li>
                                    <span class="font-weight-bold mr-1">Bedrooms:</span>
                                    <span class="det">{{ $property->bathrooms }}</span>
                                </li>
                            @endif
                            @if ($property->kitchens)
                                <li>
                                    <span class="font-weight-bold mr-1">Kitchens:</span>
                                    <span class="det">{{ $property->kitchens }}</span>
                                </li>
                            @endif
                            @if($property->year)
                                <li>
                                    <span class="font-weight-bold mr-1">Year Built:</span>
                                    <span class="det">{{ $property->year }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>

                    @if ($property->images->where('type', 'site_plan') && $property->images->where('type', 'site_plan')->count())
                        <div class="floor-plan property wprt-image-video w50 pro">
                            <h5>Site Plans</h5>
                            @foreach ($property->images->where('type', 'site_plan') as $image)
                                <img width="100%" alt="image" src="{{ asset('storage/' . $image->path) }}">
                                <br><br>
                            @endforeach
                        </div>
                    @endif

                    <div class="property-location map">
                        <h5>Location</h5>
                        <div class="divider-fade"></div>
                        <div style="width:100%; height:400px;">
                            <iframe width="100%" height="100%" frameborder="0" style="border:0"
                                src="https://www.google.com/maps?q={{ $property->location }}&output=embed" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 col-md-12 car">
                    <div class="single widget">
                        @include('frontend.qr-profile')
                        <div class="sidebar">
                            <div class="main-search-field-2">
                                <div class="widget-boxed mt-5">
                                    <div class="widget-boxed-header">
                                        <h4>Recent Properties</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="recent-post">
                                            @foreach ($recentProperties as $rproperty)
                                                <div class="recent-main mb-4">
                                                    <div class="recent-img">
                                                        <a href="{{ route('property.details', $rproperty->id) }}"><img
                                                                src="{{ asset('storage/' . $rproperty->featured_image) }}"
                                                                alt="{{ $rproperty->title }}"></a>
                                                    </div>
                                                    <div class="info-img">
                                                        <a href="{{ route('property.details', $rproperty->id) }}">
                                                            <h6>{{ $rproperty->title }}</h6>
                                                        </a>
                                                        <p>{{ formatPRice($rproperty->price) }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--@if($featuredProperties && $featuredProperties->count())-->
                                <!--    <div class="widget-boxed mt-5">-->
                                <!--        <div class="widget-boxed-header mb-5">-->
                                <!--            <h4>Feature Properties</h4>-->
                                <!--        </div>-->
                                <!--        <div class="widget-boxed-body">-->
                                <!--            <div class="slick-lancers">-->
                                <!--                @foreach ($featuredProperties as $fproperty)-->
                                <!--                    <div class="agents-grid mr-0">-->
                                <!--                        <div class="listing-item compact">-->
                                <!--                            <a href="{{ route('property.details', $fproperty->id) }}"-->
                                <!--                                class="listing-img-container">-->
                                <!--                                <div class="listing-badges">-->
                                <!--                                    <span-->
                                <!--                                        class="featured">{{ formatPrice($fproperty->price) }}</span>-->
                                <!--                                    <span>For {{ ucfirst($fproperty->mode) }}</span>-->
                                <!--                                </div>-->
                                <!--                                <div class="listing-img-content">-->
                                <!--                                    <span-->
                                <!--                                        class="listing-compact-title">{{ $fproperty->title }}-->
                                <!--                                        <i>{{ $fproperty->location }}</i></span>-->
                                <!--                                    <ul class="listing-hidden-content">-->
                                <!--                                        <li>Area <span>{{ $fproperty->size }} sq ft</span></li>-->
                                <!--                                        <li>Rooms <span>{{ $fproperty->bedrooms }}</span>-->
                                <!--                                        </li>-->
                                <!--                                        <li>Baths <span>{{ $fproperty->bathrooms }}</span>-->
                                <!--                                        </li>-->
                                <!--                                    </ul>-->
                                <!--                                </div>-->
                                <!--                                <img src="{{ asset('storage/' . $fproperty->featured_image) }}"-->
                                <!--                                    alt="{{ $fproperty->title }}">-->
                                <!--                            </a>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--                @endforeach-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--@endif-->
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- END SECTION PROPERTIES LISTING -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('v2/css/default.css') }}">
    <style>
        .pro-wrapper {
            display: grid;
            grid-template-columns : 1fr 1fr;
        }

        section.headings-2 {
            padding: 60px 0 55px 0;
            background: unset;
        }
        .homes-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .blog .homes-content .homes-list li{
            margin-bottom: 10px;
            width: 100%;
            font-size: 15px;
        }
        @media (max-width: 768px) {
            .pro-wrapper {
                grid-template-columns : 1fr !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        $('.slick-carousel').each(function() {
            var slider = $(this);
            $(this).slick({
                infinite: true,
                dots: false,
                arrows: false,
                centerMode: true,
                centerPadding: '0'
            });

            $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function() {
                slider.slick('slickPrev');
            });
            $(this).closest('.slick-slider-area').find('.slick-next').on("click", function() {
                slider.slick('slickNext');
            });
        });
    </script>
@endpush
