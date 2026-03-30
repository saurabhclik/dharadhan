<div class="col-md-4 col-12">
    <div class="banner-inner">
        <h1 class="title">Sell or Rent Property online faster with
            {{ config('app.name') }}
        </h1>
        <h6 class="sub-title features">Advertise for FREE</h6>
        <h6 class="sub-title features">Get unlimited enquiries</h6>
        <h6 class="sub-title features">Get shortisted buyers and tenants</h6>
        <h6 class="sub-title features">Assistance in co-ordinating site visits</h6>
    </div>
</div>
<div class="col-md-8 col-12 post-section">
    @include('frontend.post.post-option')
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
        .banner-inner {
            background: unset;
        }
        .banner-inner .title {
            color: #FFFFFF
        }
    </style>
@endpush
