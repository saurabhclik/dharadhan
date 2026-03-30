<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PropertyReaction;

class PropertyReactionController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'type' => 'required|in:like,dislike,favourite',
        ]);

        if(auth()->guest()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userId = auth()->id();
        $propertyId = $request->property_id;
        $type = $request->type;

        if ($type === 'favourite') {
            // Favourite: toggle using update/create
            $reaction = PropertyReaction::where([
                'user_id' => $userId,
                'property_id' => $propertyId,
                'type' => 'favourite'
            ])->first();

            if ($reaction) {
                $reaction->delete();
            } else {
                PropertyReaction::create([
                    'user_id' => $userId,
                    'property_id' => $propertyId,
                    'type' => 'favourite',
                ]);
            }
        } else {
            // Like / Dislike (update instead of delete + insert)
            $reaction = PropertyReaction::where([
                'user_id' => $userId,
                'property_id' => $propertyId,
            ])->whereIn('type', ['like', 'dislike'])->first();

            if ($reaction) {
                // If same reaction clicked → do nothing
                if ($reaction->type !== $type) {
                    $reaction->update(['type' => $type]);
                }
            } else {
                PropertyReaction::create([
                    'user_id' => $userId,
                    'property_id' => $propertyId,
                    'type' => $type,
                ]);
            }
        }

        // Fresh counts from DB (SOURCE OF TRUTH)
        return response()->json([
            'likes' => PropertyReaction::where('property_id', $propertyId)->where('type', 'like')->count(),
            'dislikes' => PropertyReaction::where('property_id', $propertyId)->where('type', 'dislike')->count(),
            'favourites' => PropertyReaction::where('property_id', $propertyId)->where('type', 'favourite')->count(),
            'user_reaction' => PropertyReaction::where('property_id', $propertyId)
                ->where('user_id', $userId)
                ->pluck('type')
        ]);
    }
}
