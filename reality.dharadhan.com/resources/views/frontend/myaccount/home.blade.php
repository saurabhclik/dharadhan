@extends('layouts.myaccount')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
        <div class="dashborad-box stat bg-white">
            <h4 class="title">Manage Dashboard</h4>
            <div class="section-body">
                <div class="row mx-0">
                    <div class="col-lg-3 col-md-6 col-xs-12 dar pro mr-3" onclick="window.location.href='{{ route('myaccount.properties') }}'">
                        <div class="item">
                            <div class="icon">
                                <i class="fa fa-list" aria-hidden="true"></i>
                            </div>
                            <div class="info">
                                <h6 class="number">{{ $user->properties->count() }}</h6>
                                <p class="type ml-1">Published Property</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-12 dar rev mr-3" onclick="window.location.href='{{ route('myaccount.leads') }}'">
                        <div class="item">
                            <div class="icon">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="info">
                                <h6 class="number">{{ $user->leads->count() + $user->transferredLeads->count() }}</h6>
                                <p class="type ml-1">Total Leads</p>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-3 col-md-6 dar com mr-3" onclick="window.location.href='{{ route('myaccount.transferred.leads') }}'">
                        <div class="item mb-0">
                            <div class="icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <div class="info">
                                <h6 class="number">{{ $user->transferredLeads->count() }}</h6>
                                <p class="type ml-1">Transferred Leads</p>
                            </div>
                        </div>
                    </div> -->
                    

                     {{--
                    <div class="col-lg-3 col-md-6 dar booked">
                        <div class="item mb-0">
                            <div class="icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="info">
                                <h6 class="number">432</h6>
                                <p class="type ml-1">Times Bookmarked</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .dar {
            cursor: pointer;
        }
    </style>
@endpush