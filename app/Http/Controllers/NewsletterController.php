<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\Lead;
use App\Models\User;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if already subscribed
        $exists = Newsletter::where('email', $request->email)->exists();

        if ($exists) {
            return response()->json([
                'status' => 'exists',
                'message' => 'You are already subscribed!'
            ], 200);
        }

        Newsletter::create([
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'Subscribed successfully!'
        ], 201);
    }

    public function submitRequest(Request $request)
    {
        $user = User::find(decrypt($request->ref));
        return view('submit_request', ['unique_id' => $user->unique_id]);
    }

    public function storeSubmitRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try{
            Lead::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'interest' => "other",
                'message' => $request->input('message'),
                'location' => $request->input('location'),
                'status' => 'new',
                'user_id' => decrypt($request->input('user_id')),
            ]);
            return redirect()->to(route('index'))->with('success', 'Your request has been submitted successfully!');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error submitting your request. Please try again later.')->withInput();
        }
    }
}

