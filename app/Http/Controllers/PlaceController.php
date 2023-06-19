<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlaceController extends Controller
{

    public function getPlaces()
    {
        $places = Place::all();

        return response()->json($places);
    }

    public function addToWishlist(Request $request, $userId)
    {
        $validator = Validator::make($request->all(), [
            'place_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        if ($user->places()->count() >= 3) {
            return response()->json(['error' => 'User cannot have more than 3 places in the wishlist'], 400);
        }

        $placeId = $request->input('place_id');
        $place = Place::find($placeId);
        if (!$place) {
            return response()->json(['error' => 'Place not found'], 404);
        }

        $user->places()->attach($placeId);

        return response()->json(['message' => 'Place added to the wishlist successfully']);
    }

    public function getWishlist($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $wishlist = $user->places;

        return response()->json($wishlist);
    }
}
