<?php

namespace App\Http\Controllers;

use App\Models\HouseShowing;
use Illuminate\Http\Request;

class HouseShowingManagementController extends Controller
{
    public function showing_property(Request $request)
    {
        $house_showing_id = $request->house_showing_id;
        $house_showing = HouseShowing::findOrFail($house_showing_id);
        return view('showing_property.index', compact('house_showing'));
    }
}
