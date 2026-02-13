<input type="text" id="locationInput" placeholder="{{ $placeholder ?? 'Enter Location...' }}" class="{{ $class ?? '' }}"
    value="{{ $value }}" required>

<ul id="placesList" class="autocomplete-list form-control"></ul>

<!-- Hidden fields to store selected place -->
<input type="hidden" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}">

<style>
    .autocomplete-list {
        list-style: none;
        display: none;
        margin: 0;
        padding: 0;
        background: white;
        border: 1px solid #ddd;
        position: absolute;
        width: 250px;
        max-height: 220px;
        height: auto;
        overflow-y: auto;
        z-index: 9999;
    }

    .autocomplete-list li {
        padding: 8px;
        cursor: pointer;
    }

    .autocomplete-list li:hover {
        background: #eee;
    }
</style>

<script>
    const apiKey = "{{ env('MAP_API_KEY') }}";
    const locationInput = document.getElementById("locationInput");
    const placesList = document.getElementById("placesList");

    // Render Autocomplete UI
    function showPlaces(results, formatterCallback) {
        placesList.innerHTML = "";

        if (!results.length) {
            placesList.style.display = "none";
            return;
        }

        placesList.style.display = "block";

        results.forEach(item => {
            let li = document.createElement("li");
            li.innerText = formatterCallback(item);

            li.addEventListener("click", () => {
                const value = formatterCallback(item);
                locationInput.value = value;
                document.getElementById("{{ $name }}").value = value;

                placesList.innerHTML = "";
                placesList.style.display = "none";
            });

            placesList.appendChild(li);
        });
    }

    document.addEventListener('click', (e) => {
        if (!placesList.contains(e.target) && e.target !== placesList) {
            placesList.style.display = 'none';
        }
    });


    // Input Listener (Shared)
    locationInput.addEventListener("input", function() {
        let q = this.value.trim();
        document.getElementById("{{ $name }}").value = q;
        if (q.length < 3) {
            placesList.innerHTML = "";
            placesList.style.display = "none";
            return;
        }

        @if (env('MAP_API_TYPE') == 'geoapify')
            fetch(
                    `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(q)}&apiKey=${apiKey}`
                )
                .then(r => r.json())
                .then(data => {
                    console.log(data.features)
                    showPlaces(data.features, f => f.properties.formatted);
                });
        @elseif (env('MAP_API_TYPE') == 'mapbox')
            fetch(
                    `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(q)}.json?access_token=${apiKey}&autocomplete=true`
                )
                .then(res => res.json())
                .then(data => {
                    showPlaces(data.features, p => p.place_name);
                });
        @endif
    });
</script>
