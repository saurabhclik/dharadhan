<div class="banner-inner">
    <a class="mb-4 type-link text-white" href="{{ propertyStepRoute('two') }}"><i class="fa fa-arrow-left"></i> Back</a>
    <div class="password-section ui-elements">
        <div class="row ui-buttons">
            <div class="col-md-12 form-elemts">
                <div class="group-20">
                    <h5 class="sub-title mt-4">Tell us about your property?</h5>


                    <div class="single-add-property">
                        <h5 class="sub-title">Add Area Details</h5>
                        <h4 class="text-white heading1">At least one area type mandatory</h4>
                        <div class="property-form-group">
                            <div class="row">
                                @if (in_array(session('post_property.subType'), ['co_working_office_space']) ||
                                    in_array(session('post_property.mainType'), ['plot_land_commercial'])
                                )
                                    <div class="col-md-12">
                                        <label class="text-white">Plot Area</label>
                                        <input type="text" name="plot_area" id="plot_area"
                                            placeholder="Enter Plot Area" required
                                            value="{{ $post['plot_area'] ?? '' }}">
                                    </div>
                                @endif

                                @if (in_array(session('post_property.mainType'), [
                                        'office',
                                        'retail',
                                    ]))
                                    <div class="col-md-6">
                                        <label class="text-white">Carpet Area</label>
                                        <input type="text" name="carpet_area" id="carpet_area"
                                            placeholder="Enter Carpet Area" required
                                            value="{{ $post['carpet_area'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-white">Build-up Area</label>
                                        <input type="text" name="build_up_area" id="build_up_area"
                                            placeholder="Enter Build-up Area" required
                                            value="{{ $post['build_up_area'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-white">Super Build-up Area</label>
                                        <input type="text" name="super_build_up_area" id="super_build_up_area"
                                            placeholder="Enter Super Build-up Area" required
                                            value="{{ $post['super_build_up_area'] ?? '' }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- ===================== AVAILABILITY STATUS (COMMON) ===================== --}}
                    <div class="single-add-property">
                        <h5 class="sub-title">Availability Status</h5>
                        <div class="property-form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="text-white">Availability</label>
                                    <select name="availability_status" required>
                                        <option value="ready_to_move"
                                            {{ ($post['availability_status'] ?? '') == 'ready_to_move' ? 'selected' : '' }}>
                                            Ready to Move
                                        </option>
                                        <option value="under_construction"
                                            {{ ($post['availability_status'] ?? '') == 'under_construction' ? 'selected' : '' }}>
                                            Under Construction
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ===================== OFFICE : READY TO MOVE ===================== --}}
                    @if (session('post_property.mainType') == 'office' &&
                        session('post_property.subType') == 'ready_to_move_space')

                    <div class="single-add-property">
                        <h5 class="sub-title">Office Setup Details</h5>

                        <div class="property-form-group">
                            <div class="row">

                                <div class="col-md-4">
                                    <label class="text-white">Min No. of Seats</label>
                                    <input type="number" name="min_seats"
                                        value="{{ $post['min_seats'] ?? '' }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="text-white">Max No. of Seats (Optional)</label>
                                    <input type="number" name="max_seats"
                                        value="{{ $post['max_seats'] ?? '' }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="text-white">No. of Cabins</label>
                                    <input type="number" name="cabins"
                                        value="{{ $post['cabins'] ?? '' }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="text-white">Meeting Rooms</label>
                                    <input type="number" name="meeting_rooms"
                                        value="{{ $post['meeting_rooms'] ?? '' }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="text-white">Washrooms</label>
                                    <select name="washrooms_status">
                                        <option value="available" {{ ($post['washrooms'] ?? '') == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="not_available" {{ ($post['washrooms'] ?? '') == 'not_available' ? 'selected' : '' }}>Not Available</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="text-white">Conference Room</label>
                                    <select name="conference_room">
                                        <option value="available" {{ ($post['conference_room'] ?? '') == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="not_available" {{ ($post['conference_room'] ?? '') == 'not_available' ? 'selected' : '' }}>Not Available</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="text-white">Pantry Type</label>
                                    <select name="pantry_type">
                                        <option value="private">Private</option>
                                        <option value="shared">Shared</option>
                                        <option value="not_available">Not Available</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif


                    {{-- ===================== OFFICE : BARE SHELL ===================== --}}
                    @if (session('post_property.mainType') == 'office' &&
                        session('post_property.subType') == 'bare_shell_office_space')

                    <div class="single-add-property">
                        <h5 class="sub-title">Bare Shell Details</h5>

                        <div class="property-form-group">
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="text-white">Wall Construction Status</label>
                                    <select name="wall_status">
                                        <option>No Walls</option>
                                        <option>Brick Walls</option>
                                        <option>Cemented Walls</option>
                                        <option>Plastered Walls</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="text-white">Flooring Type</label>
                                    <select name="flooring_type">
                                        <option>Marble</option>
                                        <option>Concrete</option>
                                        <option>Polished Concrete</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif


                    {{-- ===================== OFFICE : CO-WORKING ===================== --}}
                    @if (session('post_property.subType') == 'co_working_office_space')

                    <div class="single-add-property">
                        <h5 class="sub-title">Co-working Details</h5>

                        <div class="property-form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="text-white">Washrooms</label>
                                    <select name="washrooms">
                                        <option>None</option>
                                        <option>Shared</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4+</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                    {{-- ===================== FACILITIES (OFFICE) ===================== --}}
                    @if (session('post_property.mainType') == 'office')

                    <div class="single-add-property">
                        <h5 class="sub-title">Facilities Available</h5>

                        <div class="property-form-group">
                            <div class="row">

                                @foreach ([
                                    'furnishing' => 'Furnishing',
                                    'central_ac' => 'Central Air Conditioning',
                                    'oxygen_duct' => 'Oxygen Duct',
                                    'ups' => 'UPS'
                                ] as $key => $label)

                                <div class="col-md-6">
                                    <label class="text-white">{{ $label }}</label>
                                    <select name="{{ $key }}">
                                        <option value="available" {{ ($post[$key] ?? '') == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="not_available" {{ ($post[$key] ?? '') == 'not_available' ? 'selected' : '' }}>Not Available</option>
                                    </select>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                    @endif


                    {{-- ===================== FIRE SAFETY (OFFICE + RETAIL) ===================== --}}
                    @if (in_array(session('post_property.mainType'), ['office','retail']))

                    <div class="single-add-property">
                        <h5 class="sub-title">Fire Safety Measures</h5>

                        <div class="property-form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="text-white">Select Measures</label>
                                    <select name="fire_safety[]" multiple>
                                        @foreach (['Fire Extinguisher','Sensors','Sprinklers','Fire Hose'] as $item)
                                            <option value="{{ $item }}"
                                                {{ in_array($item, $post['fire_safety'] ?? []) ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                    {{-- ===================== RETAIL DETAILS ===================== --}}
                    @if (session('post_property.mainType') == 'retail')

                    <div class="single-add-property">
                        <h5 class="sub-title">Retail / Shop Details</h5>

                        <div class="property-form-group">
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="text-white">Washroom Type</label>
                                    <select name="washroom_type">
                                        <option value="private">Private</option>
                                        <option value="public">Public</option>
                                        <option value="not_available">Not Available</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="text-white">Suitable for Business</label>
                                    <select name="business_type[]" multiple>
                                        <option>ATM</option>
                                        <option>Bakery</option>
                                        <option>Clinic</option>
                                        <option>Clothing</option>
                                        <option>Coffee Shop</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif

                    @if (in_array(session('post_property.mainType'), ['plot_land_commercial']))
                        <div class="single-add-property">
                            <h5 class="sub-title">Property Dimenstion (Optional)</h5>
                            <div class="property-form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-white">Length of Plot</label>
                                        <input type="text" name="length" id="length"
                                            placeholder="Length of Plot" required
                                            value="{{ $post['length'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-white">Breadth of Plot</label>
                                        <input type="text" name="breadth" id="breadth"
                                            placeholder="Breadth of Plot" required
                                            value="{{ $post['breadth'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single-add-property">
                            <h5 class="sub-title">Width of facing road.</h5>
                            <div class="property-form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-white">Enter road width</label>
                                        <input type="text" name="road_width" id="road_width"
                                            placeholder="Enter road width" required
                                            value="{{ $post['road_width'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-white">Type</label>
                                        <select name="road_type" id="road_type">
                                            <option value="feet"
                                                {{ ($post['road_type'] ?? '') == 'feet' ? 'selected' : '' }}>
                                                Feet
                                            </option>

                                            <option value="meter"
                                                {{ ($post['road_type'] ?? '') == 'meter' ? 'selected' : '' }}>
                                                Meter
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (in_array(session('post_property.mainType'), ['plot_land_commercial']))
                        <div class="single-add-property">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="sub-title">No. of open sides</h5>
                                    <div class="property-form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-inline-flex align-items-center flex-wrap group-20">
                                                    @foreach (getBedBathRooms(3) as $key => $bedroom)
                                                        <button id="{{ $key }}open_sides" type="button"
                                                            data-value="{{ $key }}"
                                                            data-id="{{ $key }}open_sides"
                                                            data-value="{{ $key }}"
                                                            class="open_sides btn btn-sm btn-primary @if ((isset($post['open_sides']) && $post['open_sides'] == $key) || (!isset($post['open_sides']) && $loop->index == 0)) active @endif">{{ $bedroom }}</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="sub-title">Property Facing</h5>
                                    <div class="property-form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select name="property_facing">
                                                    <option value="North"
                                                        {{ ($post['property_facing'] ?? '') == 'North' ? 'selected' : '' }}>
                                                        North
                                                    </option>

                                                    <option value="East"
                                                        {{ ($post['property_facing'] ?? '') == 'East' ? 'selected' : '' }}>
                                                        East
                                                    </option>

                                                    <option value="West"
                                                        {{ ($post['property_facing'] ?? '') == 'West' ? 'selected' : '' }}>
                                                        West
                                                    </option>

                                                    <option value="Other Sides"
                                                        {{ ($post['property_facing'] ?? '') == 'Other Sides' ? 'selected' : '' }}>
                                                        Other Sides
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h5 class="sub-title">Possession By</h5>
                                    <div class="property-form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select name="possession_by">
                                                    <option value="Immediate"
                                                        {{ ($post['possession_by'] ?? '') == 'Immediate' ? 'selected' : '' }}>
                                                        Immediate
                                                    </option>

                                                    <option value="Within 3 Months"
                                                        {{ ($post['possession_by'] ?? '') == 'Within 3 Months' ? 'selected' : '' }}>
                                                        Within 3 Months
                                                    </option>

                                                    <option value="Within 6 Months"
                                                        {{ ($post['possession_by'] ?? '') == 'Within 6 Months' ? 'selected' : '' }}>
                                                        Within 6 Months
                                                    </option>

                                                    <option value="Next Year"
                                                        {{ ($post['possession_by'] ?? '') == 'Next Year' ? 'selected' : '' }}>
                                                        Next Year
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="single-add-property">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="sub-title">Price Details</h5>
                                <div class="property-form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="text-white">Price *</label>
                                            <input type="text" name="price"
                                                placeholder="Price in {{ env('DEFAULT_CURRENCY', 'INR') }}"
                                                id="price" value="{{ $post['price'] ?? '' }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5 class="sub-title">Price Negotiable</h5>
                                <div class="property-form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-inline-flex align-items-center flex-wrap group-20">
                                                @foreach (getAvailability() as $key => $bhk)
                                                    <button id="{{ $key }}price_negotiable" type="button"
                                                        data-id="{{ $key }}price_negotiable"
                                                        data-value="{{ $key }}"
                                                        class="price_negotiable btn btn-sm btn-primary @if (
                                                            (isset($post['price_negotiable']) && $post['price_negotiable'] == $key) ||
                                                                (!isset($post['price_negotiable']) && $loop->index == 0)) active @endif">{{ $bhk }}</button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-add-property">
                        <h5 class="sub-title">Basic Details</h5>
                        <div class="property-form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="text-white">Title *</label>
                                    <input type="text" name="title" id="title"
                                        placeholder="Enter your property title" value="{{ $post['title'] ?? '' }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="text-white">Description *</label>
                                    <textarea id="description" name="description" placeholder="Describe about your property">{!! $post['description'] ?? '' !!}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="text-white">Approved By Authorities</label>
                                    <select id="approved_by" name="approved_by">
                                        @foreach (get_approval_authorities() as $item)
                                            <option value="{{ $item }}"
                                                {{ ($item == ($post['approved_by'] ?? "")) ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" onclick="checkBasicData();" value="Save and Continue">
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.PROPERTY_CONTEXT = {
            mainType: "{{ session('post_property.mainType') }}",
            subType: "{{ session('post_property.subType') }}"
        };

        /* ---------------------------------------------------
        VALIDATION RULE DEFINITIONS
        --------------------------------------------------- */

        const validationRules = [

            /* ---------------- COMMON (ALWAYS REQUIRED) ---------------- */
            { field: "title", label: "Title", when: () => true },
            { field: "price", label: "Price", when: () => true },

            /* ---------------- AREA (CUSTOM RULE) ---------------- */
            { custom: "area_required", when: () => true },

            /* ---------------- OFFICE → READY TO MOVE ---------------- */
            {
                field: "min_seats",
                label: "Minimum Seats",
                when: ctx =>
                    ctx.mainType === "office" &&
                    ctx.subType === "ready_to_move_space"
            },
            {
                field: "washrooms",
                label: "Washrooms",
                when: ctx =>
                    ctx.mainType === "office" &&
                    ctx.subType === "ready_to_move_space"
            },

            /* ---------------- OFFICE → BARE SHELL ---------------- */
            {
                field: "flooring_type",
                label: "Flooring Type",
                when: ctx =>
                    ctx.mainType === "office" &&
                    ctx.subType === "bare_shell_office_space"
            },
            {
                field: "wall_status",
                label: "Wall Construction Status",
                when: ctx =>
                    ctx.mainType === "office" &&
                    ctx.subType === "bare_shell_office_space"
            },

            /* ---------------- RETAIL ---------------- */
            {
                field: "washroom_type",
                label: "Washroom Type",
                when: ctx => ctx.mainType === "retail"
            }
        ];


        /* ---------------------------------------------------
        BUTTON GROUP RULES
        --------------------------------------------------- */

        const buttonGroupRules = [
            { name: "price_negotiable", label: "Price Negotiable", when: () => true },
            {
                name: "availability_status",
                label: "Availability Status",
                when: () => true
            }
        ];


        /* ---------------------------------------------------
        VALIDATION FUNCTION
        --------------------------------------------------- */

        function validatePropertyForm() {
            let errors = [];
            const ctx = window.PROPERTY_CONTEXT;

            validationRules.forEach(rule => {

                // Skip if condition does not match
                if (!rule.when(ctx)) return;

                /* ---- Custom rule: Area ---- */
                if (rule.custom === "area_required") {
                    let areaFields = [
                        "#plot_area",
                        "#carpet_area",
                        "#build_up_area",
                        "#super_build_up_area"
                    ];

                    let hasArea = areaFields.some(id =>
                        $(id).length && $(id).val()
                    );

                    if (!hasArea) {
                        errors.push("At least one area field is required.");
                    }
                    return;
                }

                /* ---- Normal field validation ---- */
                let el = $(`[name="${rule.field}"]`);
                if (el.length && !el.val()) {
                    errors.push(rule.label + " is required.");
                }
            });

            /* ---- Button groups ---- */
            buttonGroupRules.forEach(group => {
                if (!group.when(ctx)) return;

                if ($("." + group.name).length && !$("." + group.name + ".active").length) {
                    errors.push(group.label + " selection is required.");
                }
            });

            let desc = $("#description").val().replace(/<[^>]*>/g, '').trim();
            if (desc.length === 0) {
                errors.push("Description is required.");
            }

            /* ---- Display errors ---- */
            if (errors.length) {
                errors.forEach(msg => toastr.error(msg));
                return false;
            }

            return true;
        }


        /* ---------------------------------------------------
        COLLECT FORM DATA
        --------------------------------------------------- */

        function collectFormData() {
            let data = {};

            $("input, textarea, select").each(function () {
                let name = $(this).attr("name");
                if (!name) return;

                if ($(this).is("select[multiple]")) {
                    data[name] = $(this).val() || [];
                } else {
                    data[name] = $(this).val();
                }
            });

            // Button groups
            buttonGroupRules.forEach(group => {
                let btn = $("." + group.name + ".active");
                if (btn.length) {
                    data[group.name] = btn.data("value") || btn.text().trim();
                }
            });

            data._token = "{{ csrf_token() }}";
            data.step = $("#step").val();
            data.nextstep = $("#nextstep").val();

            return data;
        }


        /* ---------------------------------------------------
        BUTTON ACTIVE TOGGLE
        --------------------------------------------------- */

        $(document).on("click", "button", function () {
            let classes = $(this).attr("class");
            if (!classes) return;

            buttonGroupRules.forEach(group => {
                if ($(this).hasClass(group.name)) {
                    $("." + group.name).removeClass("active");
                    $(this).addClass("active");
                }
            });
        });


        /* ---------------------------------------------------
        FINAL SUBMIT HANDLER
        --------------------------------------------------- */

        function checkBasicData() {
            if (!validatePropertyForm()) return;

            let data = collectFormData();
            showLoader();

            $.post("{{ route('save.post.property') }}", data)
                .done(function (res) {
                    hideLoader();

                    if (res.status === "success") {
                        toastr.success(res.message);
                        if (res.redirect) window.location.href = res.redirect;
                    } else {
                        toastr.error(res.message || "Something went wrong.");
                    }
                })
                .fail(function (xhr) {
                    hideLoader();

                    if (xhr.responseJSON?.errors) {
                        Object.values(xhr.responseJSON.errors).forEach(err =>
                            toastr.error(err[0])
                        );
                    } else {
                        toastr.error("Server error. Please try again.");
                    }
                });
        }
    </script>
@endpush

