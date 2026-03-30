<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Get all countries
    public function getCountries()
    {
        return response()->json(Country::orderBy('country_name')->get());
    }

    // Get states by country_id
    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)
                       ->where('is_active', 1)
                       ->orderBy('state')
                       ->get();

        return response()->json($states);
    }

    // Get cities by state_id
    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)
                      ->where('is_active', 1)
                      ->orderBy('city')
                      ->get();

        return response()->json($cities);
    }
}
