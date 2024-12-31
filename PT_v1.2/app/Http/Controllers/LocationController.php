<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;

class LocationController extends Controller
{
    //
    public function getStates() {
        $states = State::all(); // Fetch states from your database
        return response()->json($states);
    }
    
    public function getCities($state_id) {
        $cities = City::where('state_id', $state_id)->get(); // Fetch cities based on state_id
        return response()->json($cities);
    }
    
}
