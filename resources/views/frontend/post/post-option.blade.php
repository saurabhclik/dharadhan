<div class="banner-inner">
    <h5 class="sub-title">Start posting your property, it’s free</h5>
    <div class="password-section ui-elements">
        <div class="row ui-buttons">
            <div class="col-md-12">
                <h4 class="text-white heading1">Add Basic Details</h4>
                <h4 class="text-white heading1">You are </h4>
                <div class="d-inline-flex justify-content-center align-items-center flex-wrap group-20">
                    <button id="owner" type="button" data-id="owner"
                        class="userTypes btn btn-sm btn-primary @if ((isset($post['userType']) && $post['userType'] == 'owner') || !isset($post['userType'])) active @endif">Owner</button>
                    <button id="builder" type="button" data-id="builder"
                        class="userTypes btn btn-sm btn-primary @if (isset($post['userType']) && $post['userType'] == 'builder') active @endif">Builder</button>
                    <button id="agent" type="button" data-id="agent"
                        class="userTypes btn btn-sm btn-primary @if (isset($post['userType']) && $post['userType'] == 'agent') active @endif">Agent</button>
                </div>
            </div>

            <div class="col-md-12">
                <h5 class="text-white heading1">You are Looing to...</h5>
                <div class="d-inline-flex justify-content-center align-items-center flex-wrap group-20">
                    <button id="sell" type="button" data-id="sell"
                        class="modes btn btn-sm btn-primary @if ((isset($post['mode']) && $post['mode'] == 'sell') || !isset($post['mode'])) active @endif">Sell</button>
                    <button id="rent" type="button" data-id="rent"
                        class="modes btn btn-sm btn-primary @if (isset($post['mode']) && $post['mode'] == 'rent') active @endif">Rent/Lease</button>
                    {{-- <button id="pg" type="button" data-id="pg"
                        class="modes btn btn-sm btn-primary @if (isset($post['mode']) && $post['mode'] == 'pg') active @endif">PG</button> --}}
                </div>
            </div>

            <div class="col-md-12">
                <h4 class="text-white heading1">And it's a...</h4>
                <div class="col-md-12 d-inline-flex justify-content-left align-items-left flex-wrap group-20">
                    <div class="the-check-list">
                        <div id="RType" onclick="showTypes(this)"
                            class="radio-option @if ((isset($post['type']) && $post['type'] == 'R') || !isset($post['type'])) checked @endif mr-2">
                            <div class="inner"></div>
                            <input type="radio" name="radio" @if ((isset($post['type']) && $post['type'] == 'R') || !isset($post['type'])) checked @endif
                                value="R">
                        </div>
                        <span class="mt-1">&nbsp;Residential</span>
                    </div>
                    <div class="the-check-list">
                        <div id="CType" onclick="showTypes(this)"
                            class="radio-option @if (isset($post['type']) && $post['type'] == 'C') checked @endif mr-2">
                            <div class="inner"></div>
                            <input type="radio" name="radio" @if ((isset($post['type']) && $post['type'] == 'C') || !isset($post['type'])) checked @endif
                                value="C">
                        </div>
                        <span class="mt-1">&nbsp;Commercial</span>
                    </div>
                </div>

                <div class="col-md-12 d-inline-flex flex-wrap group-20 main_types">
                    <button type="button" data-id="flat_apartment"
                        class="ptype btn btn-sm btn-primary">Flat/Apartment</button>
                    <button type="button" data-id="independent_house_villa"
                        class="ptype btn btn-sm btn-primary">Independent House /
                        Villa</button>
                    <button type="button" data-id="independent_builder_floor"
                        class="ptype btn btn-sm btn-primary">Independent / Builder
                        Floor</button>
                    <button type="button" data-id="plot_land" class="ptype btn btn-sm btn-primary">Plot /
                        Land</button>
                    {{-- <button type="button" data-id="1_rk_studio_apartment" class="ptype btn btn-sm btn-primary">1
                        RK/ Studio
                        Apartment</button>
                    <button type="button" data-id="serviced_apartment" class="ptype btn btn-sm btn-primary">Serviced
                        Apartment</button>
                    <button type="button" data-id="farmhouse" class="ptype btn btn-sm btn-primary">Farmhouse</button>
                    <button type="button" data-id="other_residential"
                        class="ptype btn btn-sm btn-primary">Other</button> --}}

                    <!-- Hidden commercial items -->
                    <button type="button" data-id="office" class="ptype btn btn-sm btn-primary d-none">Office</button>
                    <button type="button" data-id="retail" class="ptype btn btn-sm btn-primary d-none">Retail</button>
                    <button type="button" data-id="plot_land_commercial" class="ptype btn btn-sm btn-primary d-none">Plot / Land</button>
                    {{-- <button type="button" data-id="storage"
                        class="ptype btn btn-sm btn-primary d-none">Storage</button>
                    <button type="button" data-id="industry"
                        class="ptype btn btn-sm btn-primary d-none">Industry</button>
                    <button type="button" data-id="hospitality"
                        class="ptype btn btn-sm btn-primary d-none">Hospitality</button>
                    <button type="button" data-id="other_commercial"
                        class="ptype btn btn-sm btn-primary d-none">Other</button> --}}
                </div>
            </div>

            <div class="col-md-12 d-none" id="officeBlock">
                <h4 class="text-white heading1">Your office type is ...</h4>
                <div class="d-inline-flex flex-wrap group-20">

                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="ready_to_move_office_space">
                        Ready to move office space
                    </button>

                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="bare_shell_office_space">
                        Bare shell office space
                    </button>

                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="co_working_office_space">
                        Co-working office space
                    </button>

                </div>
            </div>

            <div class="col-md-12 d-none" id="retailBlock">
                <h4 class="text-white heading1">Your retail space type is...</h4>
                <div class="d-inline-flex flex-wrap group-20">
                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="commercial_shops">Commercial Shops</button>
                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="commercial_showrooms">Commercial Showrooms</button>
                </div>
            </div>

            <div class="col-md-12 d-none" id="plotLandBlock">
                <h4 class="text-white heading1">Your plot / land type is...</h4>
                <div class="d-inline-flex flex-wrap group-20">
                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="commercial_land_inst_land">Commercial Land/Inst.
                        Land</button>
                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="agricultural_farm_land">Agricultural/Farm
                        Land</button>
                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="industrial_lands_plots">Industrial
                        Lands/Plots</button>
                </div>
            </div>

            {{-- <div class="col-md-12 d-none" id="storageBlock">
                <h4 class="text-white heading1">Your storage type is...</h4>
                <div class="d-inline-flex flex-wrap group-20">
                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="whare_house">Whare
                        House</button>
                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="cold_storage">Cold
                        Storage</button>
                </div>
            </div>

            <div class="col-md-12 d-none" id="industryBlock">
                <h4 class="text-white heading1">Your industry type is...</h4>
                <div class="d-inline-flex flex-wrap group-20">
                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="factory">Factory</button>
                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="manufacturing">Manufacturing</button>
                </div>
            </div>

            <div class="col-md-12 d-none" id="hospitalityBlock">
                <h4 class="text-white heading1">Your hospitality type is...</h4>
                <div class="d-inline-flex flex-wrap group-20">
                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="hotel_resorts">Hotel/Resorts</button>
                    <button type="button" class="btn btn-sm btn-primary blockType blockSubType"
                        data-id="guest_house_banquet_halls">Guest-House/Banquet-Halls</button>
                </div>
            </div> --}}

            <div class="col-md-12 d-none" id="shopLocatedBlock">
                <h4 class="text-white heading1">Your shop is located inside.</h4>
                <div class="d-inline-flex flex-wrap group-20">

                    <button type="button" class="btn btn-sm btn-primary blockType blockSubItemType" data-id="mall"
                        data-type="subItem">
                        Mall
                    </button>

                    <button type="button" class="btn btn-sm btn-primary blockType blockSubItemType"
                        data-id="commercial_project" data-type="subItem">
                        Commercial Project
                    </button>

                    <button type="button" class="btn btn-sm btn-primary blockType blockSubItemType"
                        data-id="residential_project" data-type="subItem">
                        Residential Project
                    </button>

                    <button type="button" class="btn btn-sm btn-primary blockType blockSubItemType"
                        data-id="retail_complex_building" data-type="subItem">
                        Retail Complex/Building
                    </button>

                    <button type="button" class="btn btn-sm btn-primary blockType blockSubItemType"
                        data-id="market_high_street" data-type="subItem">
                        Market / High Street
                    </button>
                    {{-- <button type="button" class="btn btn-sm btn-primary blockType blockSubItemType"
                        data-id="other_retail_shop" data-type="subItem">
                        Others
                    </button> --}}
                </div>
                <!-- Hidden input box -->
                {{-- <div id="otherRetailInput" class="mt-3 d-none">
                    <input type="text" class="form-control" id="otherRetailText"
                        placeholder="Let us know what you mean by other">
                </div> --}}
            </div>

            @guest()
                <div class="co-md-12 col-12 mobile-verify">
                    <div class="banner-inner">
                        <h5 class="text-white heading1">Your contact details for the buyer to reach you</h5>
                        <div class="ml-0">
                            <div class="rld-single-input" style="display: flex;align-items: center;gap: 20px;">
                                <span class="color111 fw500">
                                    <span>+91</span>
                                </span>
                                <input type="phone" class="input fw500"
                                    placeholder="Enter Mobile No" id="mobile_number2">
                            </div>
                        </div>
                    </div>
                </div>
            @endguest

            <div class="col-sm-12 form-elemts">
                <input type="submit" onclick="checkData();" value="Save and Continue">
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        let mode = "sell";
        let type = "R";
        let userType = "owner";
        let mainType = "";
        let subType = "";
        let subTypeItem = "";
        let otherText = "";

        $(document).ready(function() {
            @if (session()->has('post_property'))
                let sessionData = @json(session('post_property'));
                mode = sessionData.mode ?? mode;
                type = sessionData.type ?? type;
                userType = sessionData.userType ?? userType;
                console.log(sessionData);
                $("#" + type + "Type").trigger('click');
                mainType = sessionData.mainType ?? mainType;
                $(`.ptype[data-id="` + mainType + `"]`).trigger("click");

                subType = sessionData.subType ?? subType;
                $(`.blockSubType[data-id="` + subType + `"]`).trigger("click");

                if(type == "C" && mainType == "retail"){
                    subTypeItem = sessionData.subTypeItem ?? subTypeItem;
                    $(`.blockSubItemType[data-id="` + subTypeItem + `"]`).trigger("click");
                }

                // otherText = sessionData.otherText ?? otherText;
                // $("#otherRetailText").val(otherText);
            @endif
        });

        const residential = [
            "flat_apartment",
            "independent_house_villa",
            "independent_builder_floor",
            "plot_land",
            // "1_rk_studio_apartment",
            // "serviced_apartment",
            // "farmhouse",
            // "other_residential"
        ];

        const commercial = [
            "office",
            "retail",
            "plot_land_commercial",
            // "storage",
            // "industry",
            // "hospitality",
            // "other_commercial"
        ];

        const rentHide = ["plot_land"];
        const pgHide = [
            "plot_land",
            // "farmhouse",
            // "other_residential"
        ];

        const commercialBlocks = {
            office: "officeBlock",
            retail: "retailBlock",
            plot_land_commercial: "plotLandBlock",
            // storage: "storageBlock",
            // industry: "industryBlock",
            // hospitality: "hospitalityBlock"
        };

        $(".userTypes").click(function() {
            userType = "";
            $(".userTypes").removeClass("active");
            $(this).addClass("active");
            userType = $(this).data("id");
        })

        // MODE SWITCH
        $(".modes").on("click", function() {
            mode = "";
            $(".modes").removeClass("active");
            $(this).addClass("active");
            mode = $(this).data("id");
            updatePropertyTypes();
        });

        // PROPERTY TYPE SWITCH (R / C)
        function showTypes(obj) {
            type = "";
            type = $(obj).find("input").val();
            $("#pg").toggleClass("d-none", type === "C");
            if (type === "C") $("#sell").trigger("click");
            $(".ptype").removeClass('active');
            mainType = "";
            updatePropertyTypes();
        }

        // UPDATE LIST OF BUTTONS
        function updatePropertyTypes() {
            document.querySelectorAll(".main_types .ptype").forEach(btn => {
                const id = btn.dataset.id;
                btn.classList.remove("d-none");

                // RESIDENTIAL
                if (type === "R") {
                    if (commercial.includes(id)) return btn.classList.add("d-none");

                    if (mode === "sell" && !residential.includes(id)) btn.classList.add("d-none");
                    if (mode === "rent" && rentHide.includes(id)) btn.classList.add("d-none");
                    // if (mode === "pg" && pgHide.includes(id)) btn.classList.add("d-none");
                }

                // COMMERCIAL
                if (type === "C") {
                    if (residential.includes(id)) return btn.classList.add("d-none");
                }
            });

            initCommercialEvents();
        }

        // INIT COMMERCIAL EVENTS
        function initCommercialEvents() {
            hideAllCommercialBlocks();

            if (type !== "C") return;

            $(".ptype").off("click.commercial").on("click.commercial", function() {
                const id = $(this).data("id");
                hideAllCommercialBlocks();

                if (commercialBlocks[id] && id !== "other_commercial") {
                    $("#" + commercialBlocks[id]).removeClass("d-none");
                }
            });
        }

        // HIDE ALL BLOCKS
        function hideAllCommercialBlocks() {
            Object.values(commercialBlocks).forEach(b => $("#" + b).addClass("d-none"));
            $("#shopLocatedBlock").addClass("d-none");
        }

        // ACTIVE CLASS HANDLERS
        $(document).on("click", ".ptype", function() {
            $(".blockType").removeClass("active");
            mainType = "";
            subType = "";
            subTypeItem = "";
            $(".ptype").removeClass("active");
            $(this).addClass("active");
            mainType = $(this).data('id');
        });

        $(document).on("click", ".blockType", function() {
            $(".blockType").removeClass("active");
            $(this).addClass("active");
            if ($(this).data('type') != undefined) {
                $("[data-id='" + subType + "']").addClass('active');
                subTypeItem = "";
                subTypeItem = $(this).data('id');
            } else {
                subType = "";
                subTypeItem = "";
                subType = $(this).data('id')
            }
        });

        // RETAIL → SHOW SHOP LOCATION BLOCK
        $("#retailBlock .blockType").on("click", function() {
            $("#retailBlock .blockType").removeClass("active");
            $(this).addClass("active");
            $("#shopLocatedBlock").removeClass("d-none");
        });

        $(document).on('click', '.blockType', function() {
            const id = $(this).data('id');
            // if (id === 'other_retail_shop') {
            //     $("#otherRetailInput").removeClass("d-none");
            // } else {
            //     $("#otherRetailInput").addClass("d-none");
            //     $("#otherRetailText").val("");
            // }
        });

        function checkData() {
            // otherText = $("#otherRetailText").val();
            // if (subTypeItem == "other_retail_shop") {
            //     if (otherText == "") {
            //         toastr.error("Other Field is required.");
            //         return false;
            //     }
            // }

            if (mainType == "") {
                toastr.error("Please select the type of property you wish to advertise.");
                return false;
            }

            if (type.length && type == "C" && subType.length == "") {
                toastr.error("Please select the sub type of property you wish to advertise.");
                return false;
            }

            if (type.length && type == "C" && mainType == "retail" && subTypeItem.length == "") {
                toastr.error("Please select the sub type item of property you wish to advertise.");
                return false;
            }

            @guest
            let mobile_number = $("#mobile_number2").val().trim();
            mobile_number = mobile_number.replace(/^(\+91)/, "");
            const phoneRegex = /^[6-9]\d{9}$/;
            if (mobile_number === "") {
                toastr.error("Mobile No is required");
                return false;
            }

            if (!phoneRegex.test(mobile_number)) {
                toastr.error("Enter a valid 10-digit Indian Mobile No");
                return false;
            }
            showLoader();
            $("#mobileNumber").text(mobile_number);
            $("#phone").val(mobile_number);

            let data = {
                'submit_type': "post",
                "mode": mode,
                "type": type,
                "userType": userType,
                "mainType": mainType,
                "subType": subType,
                "subTypeItem": subTypeItem,
                // "otherText": otherText,
                phone: mobile_number,
                "step": $("#step").val(),
                "nextstep": $("#nextstep").val(),
                _token: "{{ csrf_token() }}"
            };
            $.post("{{ route('ajax.send.otp') }}", data)
                .done(function(res) {
                    hideLoader();
                    if (res.status === 'success') {
                        toastr.success(res.message);
                        if (res.redirect) {
                            window.location.href = res.redirect;
                            return false;
                        }
                        $('#otpModal').modal('show');
                    } else {
                        toastr.error(res.message);
                    }
                })
                .fail(function() {
                    hideLoader();
                    toastr.error("Failed to send OTP. Try again.");
                });
        @endguest

        @auth
        showLoader();
        let data = {
            submit_type: "post",
            mode: mode,
            type: type,
            userType: userType,
            mainType: mainType,
            subType: subType,
            subTypeItem: subTypeItem,
            // "otherText: otherText,
            step: $("#step").val(),
            nextstep: $("#nextstep").val(),
            _token: "{{ csrf_token() }}"
        };
        $.post("{{ route('post.property.add.post') }}", data)
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
