<div class="banner-inner">
    <a class="mb-4 type-link text-white" href="{{ propertyStepRoute('one') }}"><i class="fa fa-arrow-left"></i> Back</a>
    <div class="password-section ui-elements">
        <div class="row ui-buttons">
            <div class="col-md-12 form-elemts">
                <div class="flex-wrap group-20">
                    <div class="single-add-property">
                        <div class="property-form-group mb-4">
                            <h5 class="sub-title mt-4">Where is your property located?</h5>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label class="text-white">Property Location *</label>
                                    @include('place_search', [
                                        'name' => 'location',
                                        'id' => 'location',
                                        'value' => $post['location'] ?? '',
                                        'required' => 'required',
                                        'placeholder' => __('Location'),
                                    ])
                                </div>
                            </div>
                        </div>
                        <input type="submit" onclick="checkLocationData();" value="Save and Continue">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function validatePropertyForm(mainType) {
            let errors = [];
            let requiredFields = [{
                id: "location",
                name: "Property location"
            }, ];

            // Validate
            requiredFields.forEach(field => {
                let value = $("#" + field.id).val().trim();

                if (!value) {
                    errors.push(field.name + " is required.");
                }
            });

            // Show all errors together
            if (errors.length > 0) {
                errors.forEach(msg => toastr.error(msg));
                return false;
            }

            return true;
        }

        function checkLocationData() {
            let mainType = "{{ $post['mainType'] ?? '' }}";

            if (!validatePropertyForm(mainType)) {
                return;
            }

            @auth
            showLoader();
            let data = {
                submit_type: "post",
                location: $("#location").val(),
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
