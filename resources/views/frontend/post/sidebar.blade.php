<!-- SIDEBAR STEPPER -->
<div class="sidebar-steps mb-4">

    <div class="step-item @if ($step == 'one') active @endif">
        <div class="step-circle">1</div>
        <div class="step-content">
            <h4><a href="{{ propertyStepRoute('one') }}">Basic Details</a></h4>
            <p>Step 1</p>
        </div>
    </div>

    <div class="step-item @if ($step == 'two') active @endif">
        <div class="step-circle">2</div>
        <div class="step-content">
            <h4><a href="{{ session()->has('locationData') ? propertyStepRoute('two') : 'javscript:;void(0)' }}">Location
                    Details</a></h4>
            <p>Step 2</p>
        </div>
    </div>

    <div class="step-item @if ($step == 'three') active @endif">
        <div class="step-circle">3</div>
        <div class="step-content">
            <h4><a href="{{ session()->has('basicData') ? propertyStepRoute('three') : 'javscript:;void(0)' }}">Property
                    Profile</a></h4>
            <p>Step 3</p>
        </div>
    </div>

    <div class="step-item @if ($step == 'four') active @endif">
        <div class="step-circle">4</div>
        <div class="step-content">
            <h4><a
                    href="{{ session()->has('basicData') ? propertyStepRoute('four') : 'javscript:;void(0)' }}">Photos</a>
            </h4>
            <p>Step 4</p>
        </div>
    </div>

    <div class="step-item @if ($step == 'five') active @endif">
        <div class="step-circle">5</div>
        <div class="step-content">
            <h4><a
                    href="{{ session()->has('featureData') ? propertyStepRoute('five') : 'javscript:;void(0)' }}">Amenities</a>
            </h4>
            <p>Step 5</p>
        </div>
    </div>
</div>

@push('styles')
    <style>
        .btn,
        .homepage-3 .btn:active,
        .btn.sApp-btn:before,
        .bg-overlay::after,
        .benifits-item:after {
            background: linear-gradient(-47deg, #0e1a1f 0%, #0e1a1f 100%);
        }

        .ui-elements .ui-buttons .btn-primary:hover {
            color: #fff !important;
            border-color: #ef7f1a !important;
            background-color: #ef7f1a !important;
        }

        .btn-primary:not(:disabled):not(.disabled).active:focus,
        .btn-primary:not(:disabled):not(.disabled):active:focus,
        .show>.btn-primary.dropdown-toggle:focus {
            box-shadow: unset !important;
        }

        .ui-elements .ui-buttons .btn-primary {
            color: #fff !important;
            border-color: #ef7f1a !important;
            background-color: #ef7f1a !important;
        }

        #propertyForm label,
        #propertyForm p {
            color: #FFFFFF !important;
        }

        /* Sidebar styling */
        .sidebar-steps {
            background: #0e1a1f;
            padding: 30px 20px;
            border-radius: 10px;
            color: #ffffff;
            position: relative;
        }

        /* Single step item */
        .step-item {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            position: relative;
        }

        .step-item:last-child {
            margin-bottom: 0;
        }

        /* Lines between steps */
        .step-item::after {
            content: "";
            width: 2px;
            height: 30px;
            background: rgba(255, 255, 255, 0.2);
            position: absolute;
            left: 15px;
            top: 45px;
        }

        .step-item:last-child::after {
            display: none;
        }

        /* Step circle */
        .step-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #555;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-weight: bold;
            font-size: 15px;
            color: #fff;
            transition: 0.3s;
        }

        /* Active step */
        .step-item.active .step-circle {
            background: #EF7F1A;
            /* Gold */
            box-shadow: 0 0 10px #EF7F1A;
        }

        .step-item.active a {
            color: #EF7F1A !important;
        }

        .step-item a {
            color: #FFFFFF !important;
        }

        .step-item.active h4 {
            color: #EF7F1A !important;
        }

        /* Step text */
        .step-content h4 {
            font-size: 16px;
            font-weight: 600;
            margin: 0;
            padding: 0;
            color: #ffffff;
        }

        .step-content p {
            font-size: 13px;
            opacity: 0.6;
            margin: 0;
        }

        .parallax-searchs.home17 {
            height: auto !important;
        }

        .post-property .ui-elements .ui-buttons .btn-sm,
        .post-property .ui-elements .ui-buttons .btn-group-sm>.btn {
            padding: 0rem 1rem !important;
            font-size: 13px !important;
            line-height: 1.47 !important;
            border-radius: 24px !important;
            height: 38px !important;
            width: auto !important;
        }

        .post-property {
            padding: 50px 0;
        }

        .post-property .post-section .banner-inner {
            box-shadow: 0 8px 12px rgba(31, 92, 163, .2);
            border-radius: 8px;
            padding: 24px;
            background: #0e1a1f;
        }

        .post-property .features {
            font-size: 14px;
        }

        .post-property .heading1 {
            font-size: 14px;
        }

        .btn-primary:not(:disabled):not(.disabled).active,
        .btn-primary:not(:disabled):not(.disabled):active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff;
            border-color: #FFFFFF;
            background: #ef7f1a !important;
        }

        .mobile-verify .banner-inner {
            box-shadow: unset !important;
            border: unset !important;
            border-radius: unset !important;
            padding: unset !important;
            margin-bottom: 10px;
        }

        .banner-inner-wrap {
            height: auto !important;
            display: grid !important;
        }
    </style>
@endpush
