@extends('layouts.main')

@section('content')
    <!-- START SECTION AGENTS DETAILS -->
    <section class="blog blog-section portfolio single-proper details mb-0 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="section-header recommended-header">
                        <div class="header-content">
                            <h2>Listing By {{ $user->name }}</h2>
                        </div>
                    </div>

                    <section class="properties-section p-0" id="properties-section">
                        <div class="property-grid">
                            @forelse ($user->properties as $property)
                                <!-- Property Card 1 -->
                                <div class="property-card mb-5">
                                    @include('partials.property-card', ['property' => $property])
                                </div>
                            @empty
                                <p>No properties found.</p>
                            @endforelse
                        </div>
                    </section>
                </div>
                <aside class="col-lg-4 col-md-12 car">
                    <div class="single widget">
                        <!-- End: Schedule a Tour -->
                        <!-- end author-verified-badge -->
                        <div class="sidebar">
                            <div class="main-search-field-2">
                                @include('frontend.qr-profile', ['user' => $user])
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- END SECTION AGENTS DETAILS -->
@endsection

@push('styles')
    <style>
        .properties-section .property-grid{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap:20px;
        }

        .properties-section{
            background: #f9fafb;
        }

        .properties-section .nav-btn{
            border: 1.5px solid #ddd;
        }

        @media (max-width: 768px) {
            .property-card {
                overflow: unset;
            }
            .properties-section .property-grid{
                display: grid;
                grid-template-columns: 1fr;
            }
            .properties-section .container{
                padding: 0 10px;
            }
            .properties-section .approval-badge{
                right: -9px;
            }
        }
    </style>
@endpush
