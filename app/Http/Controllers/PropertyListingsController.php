<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use App\Models\Region;
use Illuminate\Http\Request;

class PropertyListingsController extends Controller
{
    public function index()
    {
        return view('property_listings.index');
    }

    public function create()
    {
        $property_types = PropertyType::all();
        $regions = Region::all();
        return view('property_listings.create', compact('property_types', 'regions'));
    }






    public function already_live_filter_search(Request $request)
    {


        return json_encode([]);
    }
}
