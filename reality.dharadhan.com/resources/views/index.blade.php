@extends('layouts.main')

@section('content')
    @if (session()->has('completeprofile') && session('completeprofile') == 'pending' && request()->has('profile'))
        {{-- skipping for now --}}
    @else
        @php
            request()->session()->forget('completeprofile');
        @endphp

        @include('partials.search')

        @include('partials.partners')

        @include('partials.recommended')

        @include('partials.categories')

        @include('partials.move_next')

        @include('partials.brand')

        @include('partials.types')

        @include('partials.pgsection')

        @include('partials.apartments')

        @include('partials.benefits')

        @include('partials.rating')

        @include('partials.testimonials')

        @include('partials.location')

        @include('partials.agent')
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if($("#play-btn").length){
                document.getElementById('play-btn').addEventListener('click', function () {
                    const videoId = this.getAttribute('data-video-id');
                    const videoCard = document.getElementById('videoCard');
                    videoCard.innerHTML = `
                        <iframe class="video-card"
                            width="100%"
                            height="100%"
                            src="https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0"
                            title="YouTube video player"
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen>
                        </iframe>
                    `;
                });
            }
        });
    </script>

    @if(request()->has('type'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var element = document.querySelector(".properties-section");
                if (element) {
                    element.scrollIntoView({ behavior: "smooth" });
                }
            });
        </script>
    @endif

@endpush
