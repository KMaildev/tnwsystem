<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHouseShowing;
use App\Models\HouseShowing;
use App\Models\Region;
use App\Models\SaleTeam;
use Illuminate\Http\Request;

class HouseShowingController extends Controller
{

    public function index()
    {
        return view('house_showing.index');
    }


    public function create()
    {
        $sale_teams = SaleTeam::all();
        $regions = Region::all();
        return view('house_showing.create', compact('sale_teams', 'regions'));
    }


    public function store(StoreHouseShowing $request)
    {
        $house_showing = new HouseShowing();
        $house_showing->sale_team_id = $request->sale_team_id;
        $house_showing->name = $request->name;
        $house_showing->phone = $request->phone;
        $house_showing->address = $request->address;
        $house_showing->region_id = $request->region_id;
        $house_showing->showing_date = $request->showing_date;
        $house_showing->user_id = auth()->user()->id ?? 0;
        $house_showing->save();
        $house_showing_id = $house_showing->id;

        $button_type = $request->button_type;
        if ($button_type == 'show_now') {
            return redirect(route('showing_property', ['house_showing_id' => $house_showing_id]));
        } else {
            return redirect()->back()->with('success', 'Your processing has been completed.');
        }
    }
}
