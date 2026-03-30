<div class="banner-inner">
    <a class="mb-4 type-link text-white" href="{{ propertyStepRoute('three') }}"><i class="fa fa-arrow-left"></i> Back</a>
    @php
        $sessionFeatured = session('featured_image');
        $sessionImages = session('property_images', []);
    @endphp
    <div class="password-section ui-elements">
        <div class="row ui-buttons">
            <div class="col-md-12 form-elemts">
                <div class="d-inline-flex flex-wrap group-20">
                    <div class="single-add-property">
                        <div class="property-form-group">
                            <h5 class="sub-title mt-4">Upload property photos?</h5>
                            <form id="propertyForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group featured_image_block">
                                            <x-inputs.file-input 
                                                name="featured_image" 
                                                id="featured_image"
                                                accept="image/*" 
                                                label="{{ __('Featured Image') }}" 
                                                :existingAttachment="$sessionFeatured ? asset('storage/' . $sessionFeatured) : null"
                                                :existingAltText="isset($property) ? $property->title : ''" 
                                                :removeCheckboxLabel="__('Remove featured image')" 
                                                class="mt-1">
                                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">
                                                    {{ __('Select an image to represent this property') }}
                                                </p>
                                            </x-inputs.file-input>
                                            <div id="featured-image-preview" class="mt-2"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group property-images">
                                            <x-inputs.file-input 
                                                name="images[]" 
                                                id="images" 
                                                accept="image/*"
                                                label="{{ __('Property Images') }}" 
                                                :existingAttachment="$sessionImages" 
                                                :existingAltText="isset($property) ? $property->title : ''"
                                                :removeCheckboxLabel="__('Remove image')" 
                                                class="mt-1" 
                                                :multiple="true" 
                                                :removeCheckboxName="'remove_images'">
                                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">
                                                    {{ __('Select images to showcase this property. You can select multiple images.') }}
                                                </p>
                                            </x-inputs.file-input>
                                            <div id="image-previews" class="d-flex flex-wrap gap-2 mt-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <input type="submit" id="submitBtn" value="Save and Continue">
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function previewImages(input, previewContainer) 
    {
        $(previewContainer).html('');
        if (input.files) 
        {
            Array.from(input.files).forEach(file => {
                let reader = new FileReader();
                reader.onload = function(e) 
                {
                    $(previewContainer).append(
                        `<img src="${e.target.result}" alt="${file.name}" style="height:100px; width:auto; border:1px solid #ddd; padding:2px; border-radius:4px;">`
                    );
                }
                reader.readAsDataURL(file);
            });
        }
    }

    $('#featured_image').on('change', function() 
    {
        previewImages(this, '#featured-image-preview');
    });

    $('#images').on('change', function() 
    {
        previewImages(this, '#image-previews');
    });

    $("#submitBtn").on("click", function(e) 
    {
        e.preventDefault();
        showLoader();

        let form = $("#propertyForm")[0];
        let formData = new FormData(form);

        formData.append("submit_type", "post");
        formData.append("step", $("#step").val());
        formData.append("nextstep", $("#nextstep").val());

        $.ajax({
            url: "{{ route('save.post.property') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) 
            {
                hideLoader();
                if (res.status === 'success') 
                {
                    toastr.success(res.message);
                    if (res.redirect) window.location.href = res.redirect;
                } 
                else 
                {
                    toastr.error(res.message);
                }
            },
            error: function(xhr) 
            {
                hideLoader();
                if (xhr.responseJSON && xhr.responseJSON.errors) 
                {
                    $.each(xhr.responseJSON.errors, function(key, val) 
                    {
                        toastr.error(val[0]);
                    });
                } 
                else 
                {
                    toastr.error("Server error, please try again.");
                }
            }
        });
    });
</script>
@endpush