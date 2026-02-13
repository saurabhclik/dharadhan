<div class="banner-inner">
    <a class="mb-4 type-link text-white" href="{{ propertyStepRoute('three') }}"><i class="fa fa-arrow-left"></i> Back</a>
    <div class="password-section ui-elements">
        <div class="row ui-buttons">
            <div class="col-md-12 form-elemts">
                <div class="single-add-property mb-4">
                    <div class="property-form-group">
                        <h5 class="sub-title mt-4">Add amenities/unique features</h5>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                @php
                                    $selectedAmenities = $post['smart_home_features'] ?? []; // from session or DB
                                @endphp

                                @foreach (allAmenities() as $group => $items)
                                    <h4 class="mt-3 text-white">{{ $group }}</h4>
                                    <div class="row">
                                        @foreach ($items as $key => $label)
                                            <div class="col-md-4">
                                                <label class="text-white d-flex align-items-center gap-2">
                                                    <input type="checkbox" name="smart_home_features[]"
                                                        value="{{ $key }}"
                                                        {{ in_array($key, $selectedAmenities) ? 'checked' : '' }}>
                                                    {{ $label }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" onclick="checkBasicData();" value="Save and Finish">
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function checkBasicData() {
            let selectedAmenities = $("input[name='smart_home_features[]']:checked")
                .map(function() {
                    return $(this).val();
                })
                .get();

            if (selectedAmenities.length == 0) {
                toastr.error('Property Amenities is requried.');
                return false;
            }
            @auth
            showLoader();
            let data = {
                submit_type: "post",
                smart_home_features: selectedAmenities,
                step: $("#step").val(),
                nextstep: $("#nextstep").val(),
                _token: "{{ csrf_token() }}"
            };
            $.post("{{ route('save.post.property') }}", data)
                .done(function(res) {
                    hideLoader();
                    if (res.status === 'success') {
                        toastr.success(res.message);
                        if (res.redirect) {
                            window.location.href = res.redirect;
                        }
                    } else {
                        toastr.error(res.message);
                    }
                })
                .fail(function(xhr) {
                    hideLoader();
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, val) {
                            toastr.error(val[0]);
                        });
                    } else {
                        toastr.error("Server error, please try again.");
                    }
                });
        @endauth
        }
    </script>
@endpush
