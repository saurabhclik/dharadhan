<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\Lead;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

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
            'user_id' => 'required|string',
            'email' => 'nullable|email',
        ]);

        try 
        {
            $user_id = decrypt($request->input('user_id'));
            $user = User::find($user_id);

            if (!$user) 
            {
                return redirect()->back()
                    ->with('error', 'User not found. Cannot submit request.')
                    ->withInput();
            }

            $apiPayload = [
                'phone' => $request->phone,
                'name' => $request->name,
                'email' => $request->email ?? null,
                'source' => 'website',        
                'campaign' => 'submit_request',
                'field3' => $request->location ?? null,
                'last_comment' => $request->message,
                'unique_id' => $user->unique_id
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer OXpROcBEl0JYqCO6XwW4'
            ])->post(url('https://crm.dharadhan.com/api/realestate/submit-lead'), $apiPayload);
            Lead::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'interest' => "other",
                'message' => $request->input('message'),
                'location' => $request->input('location'),
                'status' => 'NEW LEAD',
                'user_id' => decrypt($request->input('user_id')),
            ]);

            if ($response->successful()) 
            {
                return redirect()->route('index')
                    ->with('success', 'Your request has been submitted successfully!');
            } 
            else 
            {
                return redirect()->back()
                    ->with('error', 'Error submitting request to CRM: ' . $response->json('message'))
                    ->withInput();
            }

        } 
        catch (Exception $e) 
        {
            return redirect()->back()
                ->with('error', 'There was an error submitting your request: ' . $e->getMessage())
                ->withInput();
        }
    }
}

