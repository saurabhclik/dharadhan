@extends('layouts.myaccount')

@section('content')
    <!-- START SECTION USER PROFILE -->
    <section class="user-page pt-5">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-xs-6 widget-boxed">
                    <div class="widget-boxed-header">
                        <h4>Profile Details</h4>
                    </div>
                    <div class="sidebar-widget author-widget2">
                        <form action="{{ route('myaccount.profile') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <h4 class="author__title">{{ auth()->user()->name }}</h4>
                            <p class="author__meta">{{ auth()->user()->email }}</p>
                            <div class="author-box clearfix row justify-content-between align-items-center">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <x-user-photo name="photo" photo="{{ getUserPhoto(auth()->user()) }}" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 mt-3">
                                    @php
                                        $refUrl = route('submit.request', ['ref' => Crypt::encrypt(auth()->id())]);
                                    @endphp

                                    {{-- QR Code --}}
                                    <div class="my-3" id="qrWrapper">
                                        {!! QrCode::size(150)->generate($refUrl) !!}
                                    </div>

                                    <div class="d-flex gap-2 mb-2">
                                        <button type="button" class="btn btn-ornage btn-sm" onclick="downloadQr()">
                                            <i class="fa fa-download"></i> Download QR
                                        </button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" id="refLink" class="form-control"
                                            value="{{ $refUrl }}" readonly>
                                        <button type="button" class="btn btn-ornage btn-sm"
                                            onclick="copyReferral()">Copy</button>
                                    </div>
                                </div>
                            </div>
                            <div class="author-box clearfix agent-contact-form-sidebar">
                                <div class="section-inforamation">
                                    <h4 class="heading pt-0">Personal Information</h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Fullname Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter your Fullname" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="Ex: example@domain.com" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="Ex: 8007700000" value="{{ $user->phone }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>DOB</label>
                                                <input type="date" name="dob" class="form-control"
                                                    placeholder="Enter DOB"
                                                    value="{{ $user->dob ? $user->dob->format('Y-m-d') : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Whatsapp Number</label>
                                                <input type="text" name="whatsapp" class="form-control"
                                                    placeholder="Enter your whatsapp" value="{{ $user->whatsapp }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="password-section">
                                        <h4 class="heading pt-0">Addaress Information</h4>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="address" class="form-control"
                                                        placeholder="Enter address" value="{{ $user->address }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select id="country" name="country" class="form-control">
                                                        <option value="">Select Country</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <select id="state" name="state" class="form-control">
                                                        <option value="">Select State</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <select id="city" name="city" class="form-control">
                                                        <option value="">Select City</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input type="text" name="postal_code" class="form-control"
                                                        placeholder="EnterPostal Code" value="{{ $user->postal_code }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg mt-2">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION USER PROFILE -->
@endsection


@push('scripts')
    <script>
        function downloadQr() {
            const svg = document.querySelector('#qrWrapper svg');
            const serializer = new XMLSerializer();
            const svgStr = serializer.serializeToString(svg);

            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            const img = new Image();
            const svgBlob = new Blob([svgStr], {
                type: 'image/svg+xml;charset=utf-8'
            });
            const url = URL.createObjectURL(svgBlob);

            img.onload = function() {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);
                URL.revokeObjectURL(url);

                const pngUrl = canvas.toDataURL('image/png');
                const downloadLink = document.createElement('a');
                downloadLink.href = pngUrl;
                downloadLink.download = 'referral-qr.png';
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            };

            img.src = url;
        }


        function copyReferral() {
            var copyText = document.getElementById("refLink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            alert("Referral URL Copied!");
        }
    </script>
@endpush
