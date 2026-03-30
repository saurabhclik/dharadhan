
@php
    use App\Models\Logo;
    $logos = Logo::where('is_active', true)->ordered()->get();
    $hasLogos = $logos->count() > 0;
@endphp

@if($hasLogos)
<section class="logo-slider-section py-4" style="background: #f8f9fa; overflow: hidden;">
    <div class="container-fluid">
        <div class="logo-slider-container" style="overflow: hidden; position: relative;">
            <div class="logo-slider d-flex gap-3" style="animation: slide 30s linear infinite; width: fit-content;">
                @foreach($logos as $logo)
                    <div class="logo-box position-relative" style="height: 150px; width: 200px; border-radius: 10px; overflow: hidden; flex-shrink: 0; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        @if($logo->badge_text)
                            <span class="position-absolute top-0 start-0 text-white px-3 py-1 small fw-bold rounded-bottom-end shadow"
                                  style="background-color: {{ $logo->badge_color }}; clip-path: polygon(0 0, 100% 0, 85% 100%, 0 100%); z-index: 2;">
                                {{ $logo->badge_text }}
                            </span>
                        @endif
                        
                        <a href="{{ $logo->link_url }}" class="d-block w-100 h-100" style="{{ $logo->link_url == '#' ? 'cursor: default;' : '' }}" 
                           {{ $logo->link_url != '#' ? 'target=' . ($logo->link_type == 'url' ? '_blank' : '_self') : '' }}>
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center p-3">
                                <img src="{{ $logo->image_url }}" 
                                     alt="{{ $logo->title ?? 'Logo' }}" 
                                     class="img-fluid" 
                                     style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        @keyframes slide 
        {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .logo-slider 
        {
            display: flex;
            gap: 15px;
            width: fit-content;
        }

        .logo-box 
        {
            transition: transform 0.3s ease;
        }

        .logo-box:hover 
        {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15) !important;
        }
        @media (prefers-color-scheme: dark) 
        {
            .logo-slider-section 
            {
                background: #1a1a2e !important;
            }
            .logo-box 
            {
                background: #2d2d44 !important;
            }
        }
    </style>
</section>
@endif