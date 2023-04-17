<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWard;
use App\Models\Region;
use App\Models\Township;
use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wards = Ward::all();
        return view('ward.index', compact('wards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        $townships = Township::all();
        return view('ward.create', compact('townships', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWard $request)
    {
        $ward = new Ward();
        $ward->township_id = $request->township_id;
        $ward->township_name = '';
        $ward->ward_no = $request->ward_no;
        $ward->save();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function ward_list_ajax(Request $request)
    {
        $townshipId = $request->townshipId;

        $ward_list = (new Ward())->newQuery();
        if ($townshipId) {
            $ward_list->where('township_id', $townshipId);
        }
        $ward_list_data = $ward_list->get();
        return json_encode($ward_list_data);
    }
}
