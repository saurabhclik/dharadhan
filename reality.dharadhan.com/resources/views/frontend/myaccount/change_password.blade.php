@extends('layouts.main')

@section('content')
<style>
    
    .lead-table {
        margin-bottom: 1.5rem;
    }
    
    .lead-table thead th {
        background: #0e1a1f;
        border-bottom: 2px solid #dee2e6;
        /* padding: 1rem; */
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #ffffff;
    }
    tbody
    {
        --bs-table-bg:#0e1a1f !important;
    }
    .lead-table tbody tr {
        transition: all 0.2s;
        border-bottom: 1px solid #ffffff;
    }
    
    .lead-table tbody tr:hover {
        background-color: #ffffff;
        transform: translateX(5px);
    }
    
    .property-image {
        width: 100px;
        height:auto !important;
        /* padding: 0.75rem !important; */
    }
    
    .property-image img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        /* border-radius: 0.5rem; */
        box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
        transition: transform 0.2s;
    }
    
    .property-image img:hover {
        transform: scale(1.05);
    }
    
    .property-info {
        padding: 0.75rem !important;
        vertical-align: middle;
    }
    
    .property-info h2 {
        font-size: 1rem;
        font-weight: 600;
        margin: 0 0 0.5rem 0;
        color: #ffffff;
    }
    
    .property-info h2 a {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.2s;
    }
    
    .property-info h2 a:hover {
        color: #CF5D3B;
    }
    
    .property-info figure {
        margin: 0;
        font-size: 0.875rem;
        color: #ffffff;
    }
    
    .property-info figure i {
        margin-right: 0.5rem;
        color: #CF5D3B;
    }
    
    .property-date, .property-price {
        padding: 0.75rem !important;
        vertical-align: middle;
        font-size: 0.875rem;
        color: #ffffff;
        font-weight: 500;
    }
    
    .property-price {
        font-weight: 600;
        color: #198754;
    }
    
    .actions {
        padding: 0.75rem !important;
        vertical-align: middle;
        white-space: nowrap;
    }
    
    .actions .btn-edit, .actions .btn-delete {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 0.375rem;
        text-decoration: none;
        transition: all 0.2s;
        margin: 0 0.25rem;
    }
    
    .actions .btn-edit {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }
    
    .actions .btn-edit:hover {
        background: #ffeeba;
        transform: translateY(-2px);
    }
    
    .actions .btn-delete {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .actions .btn-delete:hover {
        background: #f5c6cb;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 3rem;
    }
    
    .empty-state i {
        font-size: 4rem;
        color: #dee2e6;
        margin-bottom: 1rem;
    }
    
    .empty-state h3 {
        font-size: 1.25rem;
        color: #6c757d;
        margin: 0;
    }
    
    /* Custom Pagination */
    .pagination-custom {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid #e9ecef;
    }
    
    .pagination-custom .page-item {
        list-style: none;
    }
    
    .pagination-custom .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 2.5rem;
        height: 2.5rem;
        padding: 0.375rem 0.75rem;
        border-radius: 0.375rem;
        background: #fff;
        border: 1px solid #dee2e6;
        color: #CF5D3B;
        text-decoration: none;
        transition: all 0.2s;
    }
    
    .pagination-custom .page-link:hover {
        background: #CF5D3B;
        color: #fff;
        border-color: #CF5D3B;
    }
    
    .pagination-custom .active .page-link {
        background: #CF5D3B;
        color: #fff;
        border-color: #CF5D3B;
    }
    
    .pagination-custom .disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background: #e9ecef;
    }
    
    /* Responsive Table */
    @media (max-width: 768px) {
        .my-properties {
            padding: 1rem;
        }
        
        .lead-table thead {
            display: none;
        }
        
        .lead-table tbody tr {
            display: block;
            margin-bottom: 1rem;
            border: 1px solid #e9ecef;
            border-radius: 0.5rem;
            padding: 1rem;
        }
        
        .lead-table tbody td {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 0 !important;
            border: none;
        }
        
        .lead-table tbody td::before {
            content: attr(data-label);
            font-weight: 600;
            color: #495057;
            margin-right: 1rem;
        }
        
        .property-image {
            justify-content: center;
        }
        
        .property-image img {
            width: 100px;
            height: 100px;
        }
        
        .actions {
            justify-content: flex-end;
        }
    }
    
    /* Tooltip styles */
    [data-tooltip] {
        position: relative;
        cursor: pointer;
    }
    
    [data-tooltip]:before {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        padding: 0.25rem 0.5rem;
        background: #0e1a1f;
        color: #fff;
        font-size: 0.75rem;
        border-radius: 0.25rem;
        white-space: nowrap;
        display: none;
        z-index: 1000;
    }
    
    [data-tooltip]:hover:before {
        display: block;
    }
    .property-image {
        height: 238.88px;
        background: #e5e7eb;
        overflow: hidden;
        position: relative;
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
    }
    .btn
    {
        font-size:12px;
    }
</style>
    <!-- START SECTION USER PROFILE -->
    <section class="container hero-section user-page pt-5">
        <!-- <div class="container-fluid"> -->
            <div class="row bg-dark p-4">
                <div class="col-lg-12 col-md-6 col-xs-6 widget-boxed">
                    <div class="my-address">
                        <h5 class="heading pt-0">Change Password</h5>
                        <form action="{{ route('myaccount.save.password') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group name">
                                        <label for="form-label" class="pt-1 pb-1">Current Password</label>
                                        <input type="password" name="current_password" class="form-control"
                                            placeholder="Current Password" value="{{ old('current_password') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group email">
                                        <label for="form-label" class="pt-1 pb-1">New Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="New Password" value="{{ old('password') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group subject">
                                        <label for="form-label" class="pt-1 pb-1">Confirm New Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Confirm New Password" value="{{ old('password_confirmation') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="send-btn mt-2">
                                        <button type="submit" class="btn btn-common text-light" style="background: rgb(16 60 59);">Send Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </section>
    <!-- END SECTION USER PROFILE -->
@endsection
