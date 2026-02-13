@extends('layouts.myaccount')

@section('content')
    <div class="my-properties">
        <table class="table-responsive">
            <thead>
                <tr>
                    <th class="pl-2">My Properties</th>
                    <th class="p-0"></th>
                    <th>Date Added</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($properties as $property)
                    <tr>
                        <td class="image myelist">
                            <a href="{{ route('property.details', $property->id) }}">
                                <img alt="{{ $property->title }}" src="{{ asset('storage/' . $property->featured_image) }}"
                                    class="img-fluid" onerror="this.src='{{ asset('images/feature-properties/fp-1.jpg') }}'">
                            </a>
                        </td>
                        <td>
                            <div class="inner">
                                <a href="{{ route('property.details', $property->id) }}">
                                    <h2>{{ $property->title }}</h2>
                                </a>
                                <figure><i class="lni-map-marker"></i> {{ $property->location }}</figure>
                            </div>
                        </td>
                        <td>{{ $property->created_at->format('d.m.Y') }}</td>
                        <td>{{ $property->price ?? 0 }}</td>
                        <td class="actions">
                            <a href="{{ route('post.property.primarydetails', ['id' => $property->id]) }}" class="edit"><i
                                    class="lni-pencil"></i>Edit</a>
                            <a href="#"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            <h3>No Properties found!</h3>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $properties->links() }}
        {{-- <div class="pagination-container">
            <nav>
                <ul class="pagination">
                    <li class="page-item"><a class="btn btn-common" href="#"><i class="lni-chevron-left"></i>
                            Previous </a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="btn btn-common" href="#">Next <i
                                class="lni-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div> --}}
    </div>
@endsection
