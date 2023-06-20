<?php
namespace App\Http\Repositories;

use App\Models\Place;
use App\Models\User;

class PlaceRepository
{

    public function findPlaces()
    {
        return Place::all();
    }

    public function findWishlist($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return $user->places;
    }
}
