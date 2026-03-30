@extends('layouts.main')

@section('content')
<style>
    
    .properties-table {
        margin-bottom: 1.5rem;
    }
    
    .properties-table thead th {
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
    .properties-table tbody tr {
        transition: all 0.2s;
        border-bottom: 1px solid #ffffff;
    }
    
    .properties-table tbody tr:hover {
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
        color: #0e1a1f;
    }
    
    .property-info h2 a {
        color: #0e1a1f;
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
        font-size: 3rem;
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
        
        .properties-table thead {
            display: none;
        }
        
        .properties-table tbody tr {
            display: block;
            margin-bottom: 1rem;
            border: 1px solid #e9ecef;
            border-radius: 0.5rem;
            padding: 1rem;
        }
        
        .properties-table tbody td {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 0 !important;
            border: none;
        }
        
        .properties-table tbody td::before {
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
</style>

<div class="my-properties container hero-section">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom mt-3">
        <div>
            <h4 class="mb-0 fw-bold">
                <i class="fas fa-building me-2 text-danger"></i>My Properties
            </h4>
            <p class="text-light small mb-0 mt-1">
                Manage and edit your listed properties
            </p>
        </div>
        <!-- <div>
            <a href="{{ route('post.property.primarydetails') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus-circle me-1"></i>Add New Property
            </a>
        </div> -->
    </div>

    <!-- Properties Table -->
    <div class="table-responsive">
        <table class="table properties-table">
            <thead>
                <tr>
                    <th style="width: 100px">Property</th>
                    <th>Details</th>
                    <th style="width: 120px">Date Added</th>
                    <th style="width: 120px">Price</th>
                    <th style="width: 150px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($properties as $property)
                    <tr>
                        <td class="property-image" data-label="Image">
                            <a href="{{ route('property.details', $property->id) }}">
                                <img alt="{{ $property->title }}" 
                                     src="{{ asset('storage/' . $property->featured_image) }}"
                                     class="img-fluid" 
                                     onerror="this.src='{{ asset('images/feature-properties/fp-1.jpg') }}'">
                            </a>
                        </td>
                        <td class="property-info" data-label="Property">
                            <div class="inner">
                                <h2 class="text-light">
                                    <a href="{{ route('property.details', $property->id) }}" class="text-light">
                                        {{ Str::limit($property->title, 50) }}
                                    </a>
                                </h2>
                                <figure class="mb-0 text-light">
                                    <i class="fas fa-map-marker-alt text-light"></i> 
                                    {{ Str::limit($property->location, 60) }}
                                </figure>
                                @if($property->property_type)
                                    <small class="text-light">
                                        <i class="fas fa-tag me-1 text-light"></i>{{ ucfirst($property->property_type) }}
                                    </small>
                                @endif
                            </div>
                        </td>
                        <td class="property-date text-light" data-label="Date Added">
                            <i class="far fa-calendar-alt me-1 text-light"></i>
                            {{ $property->created_at->format('d M Y') }}
                            <br>
                            <small class="text-light">{{ $property->created_at->format('h:i A') }}</small>
                        </td>
                        <td class="property-price text-light" data-label="Price">
                            <i class="fas fa-rupee-sign me-1 text-light"></i>
                            {{ number_format($property->price ?? 0) }}
                            @if($property->price_type)
                                <br>
                                <small class="text-muted text-light">{{ ucfirst($property->price_type) }}</small>
                            @endif
                        </td>
                        <td class="actions" data-label="Actions">
                            <a href="{{ route('post.property.primarydetails', ['id' => $property->id]) }}" 
                               class="btn-edit" 
                               data-tooltip="Edit Property">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button 
                                class="btn-delete" 
                                onclick="confirmDelete('{{ route('post.property.delete', $property->id) }}')">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            
                            <!-- Hidden form for delete -->
                             <!-- route('property.destroy', $property->id) -->
                            <form id="delete-form-{{ $property->id }}" 
                                  action="" 
                                  method="POST" 
                                  style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            <div class="text-center py-5">
                                <i class="fas fa-home fa-3x text-muted mb-3"></i>
                                <h3 class="h5 text-muted">No properties found!</h3>
                                <p class="text-muted small mb-0">Start by adding your first property listing.</p>
                                <a href="{{ route('post.property.primarydetails') }}" class="btn btn-primary btn-sm mt-3" style="font-size:12px;">
                                    <i class="fas fa-plus-circle me-1"></i>Add New Property
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($properties->hasPages())
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4">
            <div class="text-muted small">
                Showing {{ $properties->firstItem() }} to {{ $properties->lastItem() }} 
                of {{ $properties->total() }} properties
            </div>
            <div>
                {{ $properties->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(action)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#CF5D3B',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) 
        {
            fetch(action, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(res => {
                if (res.status == 200) {
                    toastr.success(res.message)
                    location.reload();
                } else {
                    toastr.error(res.message)
                }
            })
            .catch(() => {
                toastr.error('Something went wrong')
            });
        }
    });
}
</script>
@endsection