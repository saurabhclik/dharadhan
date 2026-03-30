@extends('layouts.main')

@section('content')
    <section class="career-hero">
        <div class="container">
            <h1>Careers With Dharadhan Real Estate</h1>
            <p>
                Join a team that builds trust, value, and long-term growth across Jaipur’s real estate landscape.
            </p>
        </div>
    </section>

    <section class="career-content">
        <div class="container">

            <!-- WHY WORK WITH US -->
            <div class="career-card">
                <h2>Why Work With Us?</h2>
                <ul class="career-points">
                    <li>Established & trusted real estate brand</li>
                    <li>Career growth & learning opportunities</li>
                    <li>Supportive and professional work culture</li>
                    <li>Exposure to Real Estate, Finance & Consultancy</li>
                </ul>
            </div>

            <!-- SEND RESUME -->
            <div class="career-card">
                <h2>Send Your Resume</h2>
                <p class="career-note">
                    Fill in your details and upload your resume. Our HR team will contact you shortly.
                </p>

                <form action="{{ route('career.apply') }}" method="POST" enctype="multipart/form-data" class="career-form">
                    @csrf

                    <div class="form-row">
                        <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                        <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-row">
                        <input type="text" name="phone" placeholder="Mobile Number" value="{{ old('phone') }}" required>
                        <input type="text" name="position" placeholder="Position Applied For" value="{{ old('position') }}" required>
                    </div>

                    <div class="form-row">
                        <input type="file" name="resume" required>
                    </div>

                    <textarea name="message" placeholder="Message / Cover Note (optional)">{{ old('message') }}</textarea>

                    <button type="submit" class="career-btn">
                        Submit Resume
                    </button>
                </form>

                <p class="career-email">
                    Or email us directly at  
                    <a href="mailto:{{ get_setting('company_email') }}">{{ get_setting('company_email') }}</a>
                </p>
            </div>

        </div>
    </section>

@endsection

@push('styles')
    <style>
        /* HERO */
        .career-hero {
            background: #f8f9fa; /* same dark green tone */
            padding-top: 40px;
        }

        .career-hero h1 {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .career-hero p {
            font-size: 16px;
            opacity: 0.9;
            max-width: 700px;
        }

        /* CONTENT */
        .career-content {
            padding: 20px 20px;
            background: #f8f9fa;
        }

        .career-card {
            background: #fff;
            border-radius: 14px;
            padding: 35px;
            margin-bottom: 40px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        .career-card h2 {
            font-size: 26px;
            margin-bottom: 20px;
            color: #0f3d3e;
        }

        /* LIST */
        .career-points {
            list-style: none;
            padding: 0;
        }

        .career-points li {
            padding-left: 26px;
            margin-bottom: 12px;
            position: relative;
        }

        .career-points li::before {
            content: "✔";
            position: absolute;
            left: 0;
            color: #f97316;
            font-weight: bold;
        }

        /* FORM */
        .career-form {
            margin-top: 20px;
        }

        .form-row {
            display: flex;
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-row input,
        textarea {
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        textarea {
            height: 110px;
            resize: none;
            margin-bottom: 20px;
        }

        .career-btn {
            background: #f97316;
            color: #fff;
            padding: 14px 30px;
            border-radius: 10px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .career-btn:hover {
            background: #ea580c;
        }

        /* EMAIL */
        .career-email {
            margin-top: 18px;
            font-size: 14px;
        }

        .career-email a {
            color: #f97316;
            font-weight: 500;
            text-decoration: none;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }

            .career-hero h1 {
                font-size: 32px;
            }
        }

    </style>

@endpush