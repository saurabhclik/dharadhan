@extends('layouts.myaccount')

@section('content')
    <div class="my-properties">
        <table class="table-responsive">
            <thead>
                <tr>
                    <th class="pl-2">Name</th>
                    <th>Location</th>
                    <th>Message</th>
                    <th>Created Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $request)
                    <tr>
                        <td>
                            <h2>{{ $request->name }}</h2>
                        </td>
                        <td>{{ $request->location }}</td>
                        <td>{{ $request->message }}</td>
                        <td>{{ $request->created_at->format('d.m.Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            <h3>No Requests found!</h3>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $requests->links() }}
    </div>
@endsection
