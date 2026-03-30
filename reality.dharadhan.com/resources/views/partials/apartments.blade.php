<!-- Popular Localities Section -->
 <style>
    /* 5 columns for large screens */
@media (min-width: 992px) {
    .col-lg-2_4 {
        flex: 0 0 20%;
        max-width: 20%;
    }
}

/* Small / compact cards */
.locality-card-small {
    padding: 0.5rem;       /* smaller padding */
    font-size: 0.85rem;    /* smaller text */
    min-height: 50px;      /* optional: make uniform */
}

.small-text {
    font-size: 0.85rem;
}

.smaller-text {
    font-size: 0.75rem;
}
 </style>
<section class="py-5 bg-light">
    <div class="container">
        <!-- Header Row -->
        <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <h2 class="display-6 fw-bold mb-2">Popular Localities</h2>
                <p class="text-secondary mb-0">Find properties in most demanded areas</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="{{ route('properties') }}" class="btn btn-primary px-4 py-2">Explore Buying</a>
            </div>
        </div>

        <!-- Apartment Section -->
        <div class="bg-white rounded-4 shadow-sm p-4">
            <div class="row align-items-center mb-4">
                <div class="col-md-8">
                    <h3 class="h4 fw-semibold mb-1">Apartment</h3>
                    <p class="text-secondary mb-0">Most searched localities for Flat/Apartment</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('properties') }}" class="text-decoration-none">
                        View All Localities 
                        <span class="ms-1">→</span>
                    </a>
                </div>
            </div>

            <!-- Localities Grid -->
            <div class="row g-2">
                @foreach($localities as $locality => $count)
                <div class="col-6 col-md-4 col-lg-2_4">
                    <a href="{{ route('properties', ['location' => Str::slug($locality, '_')]) }}" 
                    class="d-flex justify-content-between align-items-center p-2 border rounded-2 bg-white text-decoration-none text-dark locality-card-small">
                        
                        <span class="fw-medium small-text">{{ $locality }}</span>

                        <div class="text-end">
                            <span class="fw-bold text-primary small-text">{{ $count }}</span>
                            <span class="text-secondary ms-1 smaller-text">Properties</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>