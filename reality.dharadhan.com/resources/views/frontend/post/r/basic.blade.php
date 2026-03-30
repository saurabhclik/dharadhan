<div class="banner-inner">
    <a class="mb-4 type-link text-white" href="{{ propertyStepRoute('two') }}"><i class="fa fa-arrow-left"></i> Back</a>
    <div class="password-section ui-elements">
        <div class="row ui-buttons">
            <div class="col-md-12 form-elemts">
                <div class="group-20">
                    <h5 class="sub-title mt-4">Tell us about your property?</h5>
                    <div class="single-add-property">
                        <div class="property-form-group">
                            <div class="row">
                                @if (session('post_property.mainType') == 'flat_apartment')
                                    <div class="col-md-12">
                                        <h4 class="text-white heading1">Your apratment is</h4>
                                        <div class="d-inline-flex align-items-center flex-wrap group-20">
                                            @foreach (getBhks() as $key => $bhk)
                                                <button id="{{ $key }}bhks" type="button"
                                                    data-id="{{ $key }}bhks" data-value="{{ $key }}"
                                                    class="bhks btn btn-sm btn-primary @if ((isset($post['bhks']) && $post['bhks'] == $key) || (!isset($post['bhks']) && $loop->index == 0)) active @endif">{{ $bhk }}</button>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (in_array(session('post_property.mainType'), [
                                        'flat_apartment',
                                        'independent_house_villa',
                                        'independent_builder_floor',
                                    ]))
                                    <div class="col-md-12">
                                        <h4 class="text-white heading1">Add Room Details</h4>
                                        <h4 class="text-white heading1">Bedrooms</h4>
                                        <div class="d-inline-flex align-items-center flex-wrap group-20">
                                            @foreach (getBedBathRooms() as $key => $bedroom)
                                                <button id="{{ $key }}bedrooms" type="button"
                                                    data-value="{{ $key }}"
                                                    data-id="{{ $key }}bedrooms"
                                                    class="bedrooms btn btn-sm btn-primary @if ((isset($post['bedrooms']) && $post['bedrooms'] == $key) || (!isset($post['bedrooms']) && $loop->index == 0)) active @endif">{{ $bedroom }}</button>
                                            @endforeach

                                            <div class="col-6">
                                                <label class="text-white">Add Other</label>
                                                <input type="text" name="custombedrooms" id="custombedrooms"
                                                    placeholder="Bedrooms" required
                                                    value="{{ $post['bedrooms'] ?? '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <h4 class="text-white heading1">Bathrooms</h4>
                                        <div class="d-inline-flex align-items-center flex-wrap group-20">
                                            @foreach (getBedBathRooms() as $key => $bedroom)
                                                <button id="{{ $key }}bathrooms" type="button"
                                                    data-value="{{ $key }}"
                                                    data-id="{{ $key }}bathrooms"
                                                    class="bathrooms btn btn-sm btn-primary @if ((isset($post['bathrooms']) && $post['bathrooms'] == $key) || (!isset($post['bathrooms']) && $loop->index == 0)) active @endif">{{ $bedroom }}</button>
                                            @endforeach
                                            <div class="col-6">
                                                <label class="text-white">Add Other</label>
                                                <input type="text" name="custombathrooms" id="custombathrooms"
                                                    placeholder="Bathrooms" required
                                                    value="{{ $post['bathrooms'] ?? '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <h4 class="text-white heading1">Balconies</h4>
                                        <div class="d-inline-flex align-items-center flex-wrap group-20">
                                            @foreach (getBedBathRooms() as $key => $bedroom)
                                                <button id="{{ $key }}balconies" type="button"
                                                    data-value="{{ $key }}"
                                                    data-id="{{ $key }}balconies"
                                                    class="balconies btn btn-sm btn-primary @if ((isset($post['balconies']) && $post['balconies'] == $key) || (!isset($post['balconies']) && $loop->index == 0)) active @endif">{{ $bedroom }}</button>
                                            @endforeach
                                            <button id="4plusbalconies" type="button" data-value="4+"
                                                data-id="4plusbalconies"
                                                class="balconies btn btn-sm btn-primary @if (isset($post['balconies']) && $post['balconies'] == '4plusbalconies') active @endif">More
                                                Than 4</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="single-add-property">
                        <h5 class="sub-title">Add Area Details</h5>
                        <h4 class="text-white heading1">At least one area type mandatory</h4>
                        <div class="property-form-group">
                            <div class="row">
                                @if (in_array(session('post_property.mainType'), ['independent_house_villa', 'plot_land']))
                                    <div class="col-md-12">
                                        <label class="text-white">Plot Area</label>
                                        <input type="text" name="plot_area" id="plot_area"
                                            placeholder="Enter Plot Area" required
                                            value="{{ $post['plot_area'] ?? '' }}">
                                    </div>
                                @endif

                                @if (in_array(session('post_property.mainType'), [
                                        'flat_apartment',
                                        'independent_house_villa',
                                        'independent_builder_floor',
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

                    @if (in_array(session('post_property.mainType'), [
                            'flat_apartment',
                            'independent_house_villa',
                            'independent_builder_floor',
                        ]))
                        <div class="single-add-property">
                            <h5 class="sub-title">Floor Details</h5>
                            <h4 class="text-white heading1">Total no of floors and your floor details</h4>
                            <div class="property-form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="text-white">Total Floors</label>
                                        <input type="text" name="total_floors" id="total_floors"
                                            placeholder="Total Floors" required
                                            value="{{ $post['total_floors'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (in_array(session('post_property.mainType'), ['plot_land']))
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
                    @endif

                    @if (in_array(session('post_property.mainType'), ['plot_land']))
                        <div class="single-add-property">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="sub-title">
                                        Floors Allowed For Construction</h5>
                                    <div class="property-form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-white">Allowed Floors *</label>
                                                <input type="text" name="allowed_floors"
                                                    placeholder="Allowed Floors" id="allowed_floors"
                                                    value="{{ $post['allowed_floors'] ?? '' }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="sub-title">Is there a boundary wall around the property?</h5>
                                    <div class="property-form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-inline-flex align-items-center flex-wrap group-20">
                                                    @foreach (getAvailability() as $key => $bhk)
                                                        <button id="{{ $key }}boundary_wall" type="button"
                                                            data-id="{{ $key }}boundary_wall"
                                                            data-value="{{ $key }}"
                                                            class="boundary_wall btn btn-sm btn-primary @if (
                                                                (isset($post['boundary_wall']) && $post['boundary_wall'] == $key) ||
                                                                    (!isset($post['boundary_wall']) && $loop->index == 0)) active @endif">{{ $bhk }}</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                <div class="col-md-12">
                                    <h5 class="sub-title">Any construction done on this property?</h5>
                                    <div class="property-form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-inline-flex align-items-center flex-wrap group-20">
                                                    @foreach (getAvailability() as $key => $bhk)
                                                        <button id="{{ $key }}construction" type="button"
                                                            data-id="{{ $key }}construction"
                                                            data-value="{{ $key }}"
                                                            class="construction btn btn-sm btn-primary @if (
                                                                (isset($post['construction']) && $post['construction'] == $key) ||
                                                                    (!isset($post['construction']) && $loop->index == 0)) active @endif">{{ $bhk }}</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="sub-title">Possession By</h5>
                                    <div class="property-form-group">
                                        <div class="row">
                                            <div class="col-md-6 mt-3">
                                                <select name="possession_by">
                                                    <option value="">Select Possession Time</option>

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

                    @if (in_array(session('post_property.mainType'), [
                            'flat_apartment',
                            'independent_house_villa',
                            'independent_builder_floor',
                        ]))
                        <div class="single-add-property">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="sub-title">Availability Status</h5>
                                    <div class="property-form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-inline-flex align-items-center flex-wrap group-20">
                                                    @foreach (getAvailability() as $key => $bhk)
                                                        <button id="{{ $key }}" type="button"
                                                            data-id="{{ $key }}"
                                                            data-value="{{ $key }}"
                                                            class="availability_status btn btn-sm btn-primary @if (
                                                                (isset($post['availability_status']) && $post['availability_status'] == $key) ||
                                                                    (!isset($post['availability_status']) && $loop->index == 0)) active @endif">{{ $bhk }}</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <h5 class="sub-title">Ownership</h5>
                                    <div class="property-form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-inline-flex align-items-center flex-wrap group-20">
                                                    @foreach (getOwnership() as $key => $bhk)
                                                        <button id="{{ $key }}ownership" type="button"
                                                            data-id="{{ $key }}ownership"
                                                            data-value="{{ $key }}"
                                                            class="ownership btn btn-sm btn-primary @if ((isset($post['ownership']) && $post['ownership'] == $key) || (!isset($post['ownership']) && $loop->index == 0)) active @endif">{{ $bhk }}</button>
                                                    @endforeach
                                                </div>
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

                    @if (in_array(session('post_property.mainType'), ['plot_land']))
                        <div class="single-add-property mt-4">
                            <h5 class="sub-title">Additional Pricing Details (Optional)</h5>

                            <div class="property-form-group">
                                <div class="row">

                                    <!-- Maintenance -->
                                    <div class="col-md-6">
                                        <label class="text-white">Maintenance</label>
                                        <input type="text" name="maintenance_amount"
                                            placeholder="Enter maintenance amount"
                                            value="{{ $post['maintenance_amount'] ?? '' }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-white">Maintenance Type</label>
                                        <select name="maintenance_type">
                                            <option value="">Select Type</option>
                                            <option value="Monthly"
                                                {{ ($post['maintenance_type'] ?? '') == 'Monthly' ? 'selected' : '' }}>
                                                Monthly</option>
                                            <option value="Annually"
                                                {{ ($post['maintenance_type'] ?? '') == 'Annually' ? 'selected' : '' }}>
                                                Annually</option>
                                            <option value="One Time"
                                                {{ ($post['maintenance_type'] ?? '') == 'One Time' ? 'selected' : '' }}>
                                                One
                                                Time</option>
                                            <option value="Per Unit/Monthly"
                                                {{ ($post['maintenance_type'] ?? '') == 'Per Unit/Monthly' ? 'selected' : '' }}>
                                                Per Unit/Monthly</option>
                                        </select>
                                    </div>

                                    <!-- Expected Rental -->
                                    <div class="col-md-6 mt-3">
                                        <label class="text-white">Expected Rental</label>
                                        <input type="text" name="expected_rental"
                                            placeholder="Enter expected rental"
                                            value="{{ $post['expected_rental'] ?? '' }}">
                                    </div>

                                    <!-- Booking Amount -->
                                    <div class="col-md-6 mt-3">
                                        <label class="text-white">Booking Amount</label>
                                        <input type="text" name="booking_amount"
                                            placeholder="Enter booking amount"
                                            value="{{ $post['booking_amount'] ?? '' }}">
                                    </div>

                                    <!-- Annual Dues -->
                                    <div class="col-md-6 mt-3">
                                        <label class="text-white">Annual Dues Payable</label>
                                        <input type="text" name="annual_dues" placeholder="Enter annual dues"
                                            value="{{ $post['annual_dues'] ?? '' }}">
                                    </div>

                                    <!-- Membership Charge -->
                                    <div class="col-md-6 mt-3">
                                        <label class="text-white">Membership Charge</label>
                                        <input type="text" name="membership_charge"
                                            placeholder="Enter membership charge"
                                            value="{{ $post['membership_charge'] ?? '' }}">
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif

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
        function validatePropertyForm(mainType) {
            let errors = [];

            // Always required
            let requiredFields = [{
                    id: "title",
                    name: "Property title"
                },
                {
                    id: "description",
                    name: "Description"
                },
                {
                    id: "approved_by",
                    name: "Approved By Authorities"
                },
                {
                    id: "price",
                    name: "Price"
                }
            ];

            //----------------------------
            // ROOM DETAILS (NOT FOR plot_land)
            //----------------------------
            if (mainType !== "plot_land") {
                requiredFields.push({
                    id: "bedrooms",
                    name: "Bedrooms (select button)"
                }, {
                    id: "bathrooms",
                    name: "Bathrooms (select button)"
                }, {
                    id: "balconies",
                    name: "Balconies (select button)"
                }, {
                    id: "bhks",
                    name: "Apartment Type (BHK)"
                });
            }

            //----------------------------
            // AREA DETAILS
            //----------------------------

            // Independent house & plot_land -> PLOT AREA required
            if (["independent_house_villa", "plot_land"].includes(mainType)) {
                requiredFields.push({
                    id: "plot_area",
                    name: "Plot Area"
                });
            }

            // These 3 required for all except plot_land
            if (["flat_apartment", "independent_house_villa", "independent_builder_floor"].includes(mainType)) {

                let carpet = $("#carpet_area").val();
                let buildUp = $("#build_up_area").val();
                let superBuild = $("#super_build_up_area").val();

                if (!carpet && !buildUp && !superBuild) {
                    errors.push("At least one area field is required: Carpet Area, Build-up Area, or Super Build-up Area.");
                }
            }

            //----------------------------
            // FLOOR DETAILS (not for plot_land)
            //----------------------------
            if (["flat_apartment", "independent_house_villa", "independent_builder_floor"].includes(mainType)) {
                requiredFields.push({
                    id: "total_floors",
                    name: "Total Floors"
                });
            }

            //----------------------------
            // PLOT DIMENSION (Optional but input has required attr, so validate)
            //----------------------------
            if (mainType === "plot_land") {
                requiredFields.push({
                    id: "length",
                    name: "Plot Length"
                }, {
                    id: "breadth",
                    name: "Plot Breadth"
                }, {
                    id: "allowed_floors",
                    name: "Allowed Floors"
                });
            }

            //----------------------------
            // DROPDOWN: possession_by (required for plot_land)
            //----------------------------
            if (mainType === "plot_land") {
                requiredFields.push({
                    id: "possession_by",
                    name: "Possession Time"
                });
            }

            //----------------------------
            // BUTTON GROUP VALIDATIONS
            //----------------------------
            let buttonGroups = {
                bedrooms: "bedrooms",
                bathrooms: "bathrooms",
                balconies: "balconies",
                bhks: "bhks",
                availability_status: "Availability Status",
                ownership: "Ownership",
                price_negotiable: "Price Negotiable",
                boundary_wall: "Boundary Wall",
                open_sides: "Open Sides",
                construction: "Construction"
            };

            Object.keys(buttonGroups).forEach(group => {
                if ($("." + group).length) {
                    if (!$("." + group + ".active").length) {
                        errors.push(`${buttonGroups[group]} selection is required.`);
                    }
                }
            });

            //----------------------------
            // Validate Input Fields
            //----------------------------
            requiredFields.forEach(field => {
                let el = $("#" + field.id);
                if (el.length && !el.val()) {
                    errors.push(field.name + " is required.");
                }
            });

            //----------------------------
            // Show errors together
            //----------------------------
            if (errors.length > 0) {
                errors.forEach(msg => toastr.error(msg));
                return false;
            }

            return true;
        }

        function getActiveButtonValue(className) {
            let active = $("." + className + ".active");
            if (active.length) {
                return active.data("value") || active.data("id") || active.text().trim();
            }
            return "";
        }

        function collectFormData() {
            let data = {};

            // Collect all text inputs
            $("input[type=text], input[type=number]").each(function() {
                if ($(this).attr("name")) {
                    data[$(this).attr("name")] = $(this).val().trim();
                }
            });

            // Collect all textarea
            $("textarea").each(function() {
                if ($(this).attr("name")) {
                    data[$(this).attr("name")] = $(this).val().trim();
                }
            });

            // Collect all dropdown/select
            $("select").each(function() {
                if ($(this).attr("name")) {
                    data[$(this).attr("name")] = $(this).val();
                }
            });

            // Collect all ACTIVE button values
            const buttonGroups = [
                "bhks",
                "bedrooms",
                "bathrooms",
                "balconies",
                "availability_status",
                "ownership",
                "price_negotiable",
                "boundary_wall",
                "open_sides",
                "construction"
            ];

            buttonGroups.forEach(group => {
                let val = getActiveButtonValue(group);
                if (val !== undefined) {
                    data[group] = val;
                }
            });

            // Add hidden fields
            data['_token'] = "{{ csrf_token() }}";
            data['submit_type'] = "post";
            data['step'] = $("#step").val();
            data['nextstep'] = $("#nextstep").val();

            if ($("#custombathrooms").val()) {
                data['bathrooms'] = $("#custombathrooms").val();
            }

            if ($('#custombedrooms').val()) {
                data['bedrooms'] = $("#custombedrooms").val();
            }

            return data;
        }

        // Fix button click active state
        $(document).on("click", "button", function() {
            let classList = $(this).attr("class");
            if (!classList) return;

            // Detect which group the button belongs to
            let classes = classList.split(" ");
            let groups = [
                "bhks", "bedrooms", "bathrooms", "balconies",
                "availability_status", "ownership", "price_negotiable",
                "boundary_wall", "open_sides", "construction"
            ];

            for (let g of groups) {
                if (classes.includes(g)) {
                    $("." + g).removeClass("active");
                    $(this).addClass("active");
                    return;
                }
            }
        });

        function checkBasicData() {
            let mainType = "{{ $post['mainType'] ?? '' }}";

            // Existing validations
            if (!validatePropertyForm(mainType)) {
                return;
            }

            let data = collectFormData();
            console.log(data);
            // return false;

            @auth
            showLoader();

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
