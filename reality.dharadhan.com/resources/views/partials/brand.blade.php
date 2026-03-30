@php
    use App\Models\Video;
    $centerVideos = Video::where('is_active', true)->where('position', 'center')->ordered()->get();
    $leftVideos = Video::where('is_active', true)->where('position', 'left')->ordered()->get();
    $rightVideos = Video::where('is_active', true)->where('position', 'right')->ordered()->get();
    $allVideos = $centerVideos->merge($leftVideos)->merge($rightVideos);
    $hasVideos = $allVideos->count() > 0;
    $chunkSize = 3;
@endphp

@if($hasVideos)
<section class="py-5">
    <div class="container-fluid">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold">Video Gallery</h2>
            <p class="text-secondary">Watch our latest videos and highlights</p>
            <div class="bg-primary mx-auto" style="width: 60px; height: 3px;"></div>
        </div>
        <div class="row justify-content-center px-5">
            <div class="col-lg-12">
                <div id="videoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    @if($allVideos->count() > 3)
                    <div class="carousel-indicators">
                        @foreach($allVideos->chunk(3) as $index => $chunk)
                            <button type="button" 
                                    data-bs-target="#videoCarousel" 
                                    data-bs-slide-to="{{ $index }}" 
                                    class="{{ $index === 0 ? 'active' : '' }}"
                                    aria-label="Slide {{ $index + 1 }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}">
                            </button>
                        @endforeach
                    </div>
                    @endif
                    <div class="carousel-inner">
                        @foreach($allVideos->chunk(3) as $slideIndex => $videoChunk)
                            <div class="carousel-item {{ $slideIndex === 0 ? 'active' : '' }}">
                                <div class="row g-4">
                                    @foreach($videoChunk as $video)
                                        <div class="col-md-4">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="ratio ratio-16x9 bg-dark">
                                                    <iframe 
                                                        src="{{ $video->embed_url }}" 
                                                        title="{{ $video->title }}"
                                                        allow="autoplay; fullscreen"
                                                        class="rounded-top">
                                                    </iframe>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title text-truncate">{{ $video->title }}</h5>
                                                    <p class="card-text small text-secondary">
                                                        {{ $video->created_at->format('M d, Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($allVideos->count() > 3)
                        <button class="carousel-control-prev" type="button" data-bs-target="#videoCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#videoCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endif