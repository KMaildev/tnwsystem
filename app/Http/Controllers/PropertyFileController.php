<?php

namespace App\Http\Controllers;

use App\Models\PropertyFile;
use App\Models\PropertyListing;
use Illuminate\Http\Request;

class PropertyFileController extends Controller
{
    public function property_file_create($id)
    {
        $property_listing = PropertyListing::findOrFail($id);
        $property_files = PropertyFile::where(['property_listing_id' => $id])->get();
        return view('property_file.create', compact('property_listing', 'property_files'));
    }

    public function store(Request $request)
    {
        $file = new PropertyFile();
        if ($request->file('file')) {
            $filePath = $request->file('file');
            $fileName = $filePath->getClientOriginalName();
            $path = $filePath->store('public/property_images');
        }

        $file->path = $path;
        $file->file_name = $fileName;
        $file->property_listing_id = $request->property_listing_id;
        $file->user_id = auth()->user()->id ?? 0;
        $file->save();

        $id = $request->property_listing_id;
        $marketing_team = PropertyListing::findOrFail($id);
        $marketing_team->photo_status = 'yes';
        $marketing_team->update();

        return response()->json(['success' => $fileName]);
    }

    public function destroy($id)
    {
        $data = PropertyFile::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Role is successfully deleted.');
    }
}
