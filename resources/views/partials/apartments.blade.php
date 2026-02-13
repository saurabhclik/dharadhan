<!-- Apartment Types -->
<section class="apartment-types-section">
    <div class="container">
        <div class="section-content">
            <div class="apartment-left">
                <h2>Popular Localities</h2>
                <p>Find properties in most demanded areas</p>
                <a href="{{ route('properties') }}" class="btn btn-primary type-link">Explore Buying</a>
            </div>
            <div class="apartment-right">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <h3>Apartment</h3>
                        <p class="section-subtitle">Most searched localities for Flat/Apartment</p>
                    </div>

                    <div class="col-md-4 col-12">
                        <a href="{{ route('properties') }}" class="type-link"><p class="view-all-localities">View All Localities <img width="12" src="{{ asset('v2/assets/arrow.png')}}" alt="View All Localities"></p></a>
                    </div>
                </div>

                <div class="locality-list">
                    @foreach($localities as $locality => $count)
                        <div class="locality-item">
                            <span class="title">{{ $locality }}</span>
                            <div class="property-count">
                                <strong>{{ $count }}</strong>
                                <span>Properties</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
