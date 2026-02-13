@extends('layouts.main')

@section('content')
    <!-- START SECTION ABOUT -->
    <section class="about-us fh">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 who-1 mb-4">
                    <div>
                        <h2 class="text-left mb-4">About <span>{{ config('app.name') }} Ventures Pvt. Ltd.</span></h2>
                    </div>
                    <div class="pftext">
                        <p>Established on a foundation of ethics and experience, **DharaDhan Ventures Pvt. Ltd.** is a
                            leading organisation offering services in **Real Estate, Finance, and Consultancy**.
                            From our early beginnings in 2000 as a consultancy firm, we expanded into real estate in 2011
                            and finance in 2016 — creating a complete ecosystem for individuals and businesses to grow with
                            guidance they can trust.</p>

                        <p>We bring together **ground-level knowledge, professional expertise & strong networks** to deliver
                            solutions that are practical, transparent, and aligned with your long-term goals.</p>
                    </div>
                </div>

                <div class="how-it-works">
                    <div class="row service-1 p-3">
                        <div class="col-lg-12 col-md-12 col-xs-12 who-1 mb-4 serv" data-aos="fade-up">
                            <div class="serv-flex arrow" style="text-align: left">
                                <div>
                                    <h4 class="text-left mb-4">Real Estate <span>Division (Since 2011)</span></h4>
                                </div>
                                <div class="pftext">
                                    <p>
                                        Our real estate arm is known for reliability, due diligence and honest guidance.
                                        We offer:</p>
                                    <p>
                                    <ul class="star-list">
                                        <li>Residential Plot Development</li>
                                        <li>Investment Consultancy</li>
                                        <li>Agricultural Land</li>
                                        <li>Real Estate Investments</li>
                                        <li>Project Marketing</li>
                                        <li>Villas & Flat Deals</li>
                                        <li>Resale & Channel Partner Network</li>
                                    </ul>
                                    </p>
                                    <p>
                                        With extensive knowledge of Jaipur’s expansion zones, we help clients invest smartly
                                        with confidence.

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-xs-12 who-1 mb-4 serv" data-aos="fade-up">
                            <div class="serv-flex arrow" style="text-align: left">
                                <div>
                                    <h4 class="text-left mb-4">Finance <span>Division (Since 2016)</span></h4>
                                </div>
                                <div class="pftext">
                                    <p>We assist clients with complete loan support through:</p>
                                    <ul class="star-list">
                                        <li>National Banks</li>
                                        <li>NBFCs</li>
                                        <li>Local finance institutions</li>
                                    </ul>
                                    <p>
                                        Our experts analyse the client’s exact needs and recommend the most profitable and
                                        safe financial solution.
                                        We ensure fast processing, clear documentation assistance, and personalised
                                        guidance.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-xs-12 who-1 mb-4 serv" data-aos="fade-up">
                            <div class="serv-flex arrow" style="text-align: left">
                                <div>
                                    <h4 class="text-left mb-4">Consultancy <span>Division (Serving Since 2000)</span></h4>
                                </div>
                                <div class="pftext">
                                    <p>
                                        Our consultancy division offers professional advice across life and business sectors
                                        through a panel of:
                                    </p>

                                    <ul class="star-list">
                                        <li>Advocates</li>
                                        <li>Chartered Accountants</li>
                                        <li>Company Secretaries</li>
                                        <li>Retired Government Officers</li>
                                        <li>Banking & Finance Consultants</li>
                                        <li>Astrology & Life Advisors</li>
                                    </ul>

                                    <p>
                                        We assist with:

                                    </p>
                                    <ul class="star-list">
                                        <li>Taxation</li>
                                        <li>Legal Documentation</li>
                                        <li>Government Registrations</li>
                                        <li>Investment</li>
                                        <li>Banking Work</li>
                                        <li>Business Establishment</li>
                                        <li>Project Management</li>
                                        <li>Personal Guidance</li>
                                    </ul>
                                    <p>
                                        Our aim is to support people at every major step of their personal and professional
                                        growth.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-xs-12 who-1 mb-4 serv" data-aos="fade-up">
                            <div class="serv-flex arrow" style="text-align: left">
                                <div>
                                    <h4 class="text-left mb-4">DharaDhan <span>Ventures – Your Growth Partner</span></h4>
                                </div>
                                <div class="pftext">
                                    <p>
                                        Commitment, clarity, and credibility are the pillars of our organisation. Whether it
                                        is
                                        property, finance, or professional guidance — we stand beside our clients as
                                        *partners
                                        in
                                        progress*, delivering solutions that create long-term prosperity.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION ABOUT -->

    @include('partials.mission')

    <!-- START SECTION WHY CHOOSE US -->
    <section class="how-it-works bg-white-2">
        <div class="container">
            <div class="sec-title">
                <h2><span>Why </span>Choose Us</h2>
                <p>We provide full service at every step.</p>
            </div>
            <div class="row service-1">
                <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
                    <div class="serv-flex">
                        <div class="art-1 img-13">
                            <img src="images/icons/icon-4.svg" alt="">
                            <h3>Legal & Finance Experts</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">
                                Backed by a strong team of CA, CS, Advocates, and Retired Government Officers, we deliver a
                                unique blend of legal precision and financial expertise. we offer reliable support to all,
                                providing confidence and clarity in every decision.
                            </p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
                    <div class="serv-flex">
                        <div class="art-1 img-14">
                            <img src="images/icons/icon-5.svg" alt="">
                            <h3>Trusted by thousands</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">Thousands of customers choose us because we deliver consistent quality,
                                transparent communication, and dependable results. Our focus on honesty and customer
                                satisfaction has earned us long-term trust and repeat clients across the region.</p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pt" data-aos="fade-up">
                    <div class="serv-flex arrow">
                        <div class="art-1 img-15">
                            <img src="images/icons/icon-6.svg" alt="">
                            <h3>Financing made easy</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">We make the financing process smooth and stress-free by connecting you
                                with trusted lenders and providing clear guidance at every step. Whether you're a first-time
                                buyer or upgrading, we ensure you get the best options without confusion or delays.</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <!-- END SECTION WHY CHOOSE US -->

    <!-- START SECTION AGENTS -->
    <section class="team">
        <div class="container">
            <div class="sec-title">
                <h2><span>Our </span>Team</h2>
                <p>We provide full service at every step.</p>
            </div>
            <div class="row team-all">
                <div class="col-lg-4 col-md-6 team-pro">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="images/team/t-2.jpg" alt="" />
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Mr. Vikas Goyal</h3>
                                <p>Director</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 team-pro">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="images/team/t-2.jpg" alt="" />
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Arling Tracy</h3>
                                <p>Acountant</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 team-pro pb-none">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="images/team/t-2.jpg" alt="" />
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Mark Web</h3>
                                <p>Founder &amp; CEO</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION AGENTS -->
@endsection
