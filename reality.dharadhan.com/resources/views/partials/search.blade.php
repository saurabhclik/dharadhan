<!-- Search Section -->
<section class="search-section">
    <div class="container">
        <div class="search-tabs">
            <button class="tab-btn active" data-value="r" id="tab-btn">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M9 1.5C4.85 1.5 1.5 4.85 1.5 9C1.5 13.15 4.85 16.5 9 16.5C13.15 16.5 16.5 13.15 16.5 9C16.5 4.85 13.15 1.5 9 1.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 5.25V9L11.25 10.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Residential</span>
            </button>
            <button class="tab-btn" data-value="c" id="tab-btn-com">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M2 4.5H16M2 9H16M2 13.5H16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Commercial</span>
            </button>
            <button class="tab-btn" data-value="c" id="tab-btn-com">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M2 4.5H16M2 9H16M2 13.5H16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>PG</span>
            </button>
        </div>

        <div class="search-box">
            <form id="searchForm" action="{{ route('properties') }}" method="GET">
                <div class="search-fields">
                    <div class="search-field">
                        <input type="hidden" name="type" id="mode" value="r">
                        <label>Type</label>
                        <select name="property_type" id="property_type">
                            <option value="all">All Type</option>
                            @foreach ($types as $key => $type)
                                <option value="{{ $key }}">
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search-field">
                        <label>Keyword</label>
                        <input type="text" name="keyword" placeholder="Enter Keyword">
                    </div>
                </div>
            </form>
            <button class="search-btn" onclick="$('#searchForm').submit()">Search</button>
        </div>

        <div class="popular-searches">
            <span class="popular-label">Popular Search</span>
            <a href="{{ route('properties') }}?keyword=land" class="search-link">Land</a>
            <a href="{{ route('properties') }}?keyword=ploat" class="search-link">Plots</a>
            <a href="{{ route('properties') }}?keyword=house" class="search-link">House</a>
        </div>
    </div>
</section>
