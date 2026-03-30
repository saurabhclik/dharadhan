@extends('layouts.main')

@section('content')
    <!-- START SECTION AGENTS -->
    <section class="team blog py-5">
        <div class="container">
            <div class="section-header recommended-header">
                <div class="header-content">
                    <h2 class="recommended-title">Our Agents</h2>
                </div>
            </div>
            <div class="row">
                @forelse ($agents as $agent)
                    <div class="col-lg-3 agent-mb">
                        <div class="agent agent-row shadow-hover">
                            <a href="{{ route('agent.details', ['id' => $agent->id]) }}" class="agent-img">
                                <div class="img-fade"></div>
                                @if ($agent->properties->count())
                                    <div class="button alt agent-tag">{{ $agent->properties->count() }} Properties</div>
                                @endif
                                <img src="@if ($agent->photo) {{ asset('uploads/users/' . $agent->photo) }}@else{{ asset('images/team/t-1.png') }} @endif"
                                    alt="{{ $agent->name }} Agent Photo" />
                            </a>
                            <div class="row py-0 px-4">
                                <div class="col-sm-12 agent-details p-4">
                                    <h3><a class="type-link" href="{{ route('agent.details', ['id' => $agent->id]) }}">{{ $agent->name }}</a></h3>
                                </div>
                                <div class="col-sm-12 text-center">
                                    @php
                                        $refUrl = route('submit.request', ['ref' => Crypt::encrypt($agent->id)]);
                                    @endphp
                                    <div class="text-center" id="qrWrapper">
                                        {!! QrCode::size(160)->generate($refUrl) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>
                @empty
                    <p>No agents found.</p>
                @endforelse
            </div>
            {{ $agents->links('vendor.pagination.default') }}
        </div>
    </section>
    <!-- END SECTION AGENTS -->
@endsection


@push('styles')
    <style>
        .agent-row .agent-img {
            min-height: 160px !important;
        }

        .agent-img img {
            height: 160px !important;
            background-position: center !important;
            background-size: cover !important;
        }

        .agent-details {
            border-bottom: unset !important;
        }

        #qrWrapper {
            padding: 10px;
        }
    </style>
@endpush
