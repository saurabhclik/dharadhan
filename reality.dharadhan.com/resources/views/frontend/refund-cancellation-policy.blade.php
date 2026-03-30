@extends('layouts.main')

@section('content')
    <!-- Refund & Cancellation Hero -->
    <section class="policy-hero">
        <div class="container">
            <h1>Refund & Cancellation Policy</h1>
            <p>
                Transparency and trust are at the core of Dharadhan Ventures Pvt. Ltd.
            </p>
        </div>
    </section>

    <!-- Policy Content -->
    <section class="policy-content">
        <div class="container">

            <div class="policy-card">
                <h2>Cancellation Policy</h2>
                <p>
                    At <strong>Dharadhan Ventures Pvt. Ltd.</strong>, cancellations are subject to the terms agreed upon at the
                    time of booking or service confirmation.
                </p>
                <ul>
                    <li>Cancellations must be requested in writing via email or official communication channels.</li>
                    <li>Once a property booking or service is confirmed, cancellation charges may apply.</li>
                    <li>Certain services such as site visits, consultancy, and documentation may be non-refundable.</li>
                    <li>Cancellations after agreement execution may not be permitted.</li>
                </ul>
            </div>

            <div class="policy-card">
                <h2>Refund Policy</h2>
                <p>
                    Refunds, if applicable, will be processed strictly as per the agreed terms and conditions.
                </p>
                <ul>
                    <li>Refund eligibility depends on the nature of the service or booking.</li>
                    <li>Any approved refund will be processed within <strong>7–14 working days</strong>.</li>
                    <li>Refunds will be made through the original mode of payment only.</li>
                    <li>Administrative and processing charges may be deducted.</li>
                </ul>
            </div>

            <div class="policy-card">
                <h2>Non-Refundable Services</h2>
                <ul>
                    <li>Consultancy and advisory services</li>
                    <li>Legal and documentation assistance</li>
                    <li>Site visit charges (if applicable)</li>
                    <li>Third-party service fees</li>
                </ul>
            </div>

            <div class="policy-card">
                <h2>Contact Us</h2>
                <p>
                    For any refund or cancellation related queries, please contact us:
                </p>
                <p class="policy-contact">
                    📧 <a href="mailto:{{ get_setting('company_email') }}">{{ get_setting('company_email') }}</a><br>
                    📞 {{ get_setting('company_phone_number') }}
                </p>
            </div>

        </div>
    </section>

@endsection

@push('styles')
    <style>
        /* HERO */
        .policy-hero {
            background: #f8f9fa;
            padding-top: 20px;
        }

        .policy-hero h1 {
            font-size: 38px;
            margin-bottom: 8px;
        }

        .policy-hero p {
            max-width: 700px;
            opacity: 0.9;
            font-size: 15px;
        }

        /* CONTENT */
        .policy-content {
            background: #f8f9fa;
            padding-top: 20px;
        }

        .policy-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 35px;
            margin-bottom: 35px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        .policy-card h2 {
            color: #0f3d3e;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .policy-card p {
            color: #444;
            font-size: 14.5px;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        /* LIST */
        .policy-card ul {
            padding-left: 20px;
        }

        .policy-card ul li {
            margin-bottom: 10px;
            font-size: 14.5px;
            color: #333;
        }

        /* CONTACT */
        .policy-contact a {
            color: #f97316;
            text-decoration: none;
            font-weight: 500;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .policy-hero h1 {
                font-size: 30px;
            }

            .policy-card {
                padding: 25px;
            }
        }
        @media (max-width: 480px) {
            .policy-hero h1 {
                font-size: 24px;
            }

            .policy-card {
                padding: 20px;
            }
        }
    </style>
@endpush