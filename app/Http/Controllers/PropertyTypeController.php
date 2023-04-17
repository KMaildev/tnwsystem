<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyTypes;
use App\Http\Requests\UpdatePropertyTypes;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property_types = PropertyType::all();
        return view('property_type.index', compact('property_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('property_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyTypes $request)
    {
        $property_type = new PropertyType();
        $property_type->property_type = $request->property_type;
        $property_type->property_type_mm = $request->property_type_mm;
        $property_type->status = '';
        $property_type->save();
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
        $property_type = PropertyType::findOrFail($id);
        return view('property_type.edit', compact('property_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyTypes $request, $id)
    {
        $property_type = PropertyType::findOrFail($id);
        $property_type->property_type = $request->property_type;
        $property_type->property_type_mm = $request->property_type_mm;
        $property_type->status = '';
        $property_type->update();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = PropertyType::findOrFail($id);
        $type->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }
}
