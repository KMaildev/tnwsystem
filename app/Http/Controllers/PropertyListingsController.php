<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyListing;
use App\Models\PropertyCount;
use App\Models\PropertyListing;
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


    public function store(StorePropertyListing $request)
    {
        $user_id = auth()->user()->id;
        // Generate Code
        $total_count = PropertyCount::count();
        $increment = 'TNW-' . sprintf('%06d', $total_count + 1);

        $property_count = new PropertyCount();
        $property_count->total_property = $increment;
        $property_count->save();

        $marketing = new PropertyListing();
        $marketing->offer_status = $request->offer_status ?? '';
        $marketing->code = $increment ?? '';
        $marketing->marketing_date = $request->marketing_date ?? '';
        $marketing->no = $request->no ?? '';
        $marketing->road = $request->road ?? '';
        $marketing->township_id = $request->township_id ?? '';
        $marketing->ward = $request->ward ?? '';
        $marketing->property_type_id = $request->property_type_id ?? '';
        $marketing->floor = $request->floor ?? '';
        $marketing->house_style = $request->house_style ?? '';
        $marketing->price = $request->price ?? '';
        $marketing->rent_offer_contract_status = $request->rent_offer_contract_status ?? '';
        $marketing->deposit_amount = $request->deposit_amount ?? '';
        $marketing->area_width = $request->area_width ?? '';
        $marketing->area_height = $request->area_height ?? '';
        $marketing->area = $request->area ?? '';
        $marketing->area_type = $request->area_type ?? '';
        $marketing->bcc_status = $request->bcc_status ?? '';
        $marketing->owner_status = $request->owner_status ?? '';
        $marketing->lift_status = $request->lift_status ?? '';
        $marketing->property_status = $request->property_status ?? '';
        $marketing->extra_charge = $request->extra_charge ?? '';
        $marketing->rooms = $request->rooms ?? '';
        $marketing->shrine = $request->shrine ?? '';
        $marketing->bathrooms = $request->bathrooms ?? '';
        $marketing->dining = $request->dining ?? '';
        $marketing->living = $request->living ?? '';
        $marketing->bedrooms = $request->bedrooms ?? '';
        $marketing->master_bedrooms = $request->master_bedrooms ?? '';
        $marketing->other_rooms = $request->other_rooms ?? '';
        $marketing->permission_type = $request->permission_type ?? '';
        $marketing->grant_type = $request->grant_type ?? '';
        $marketing->orginal_or_copy = $request->orginal_or_copy ?? '';
        $marketing->owner_agent = $request->owner_agent ?? '';
        $marketing->name = $request->name ?? '';
        $marketing->phone = $request->phone ?? '';
        $marketing->email = $request->email ?? '';
        $marketing->address = $request->address ?? '';
        $marketing->remark = $request->remark ?? '';
        $marketing->photo_status = 'no' ?? '';
        $marketing->reject_status = NULL;
        $marketing->user_id = $user_id ?? 0;
        $marketing->save();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }




    public function already_live_filter_search(Request $request)
    {
        $No = $request->No;
        $WardNo = $request->WardNo;
        $Road = $request->Road;

        if ($No) {
            $marketing_data = PropertyListing::where(['no' => $No])->get();
        }

        if ($WardNo) {
            $marketing_data = PropertyListing::where(['ward' => $WardNo])->get();
        }

        if ($Road) {
            $marketing_data = PropertyListing::where(['road' => $Road])->get();
        }

        if ($No && $WardNo && $Road) {
            $marketing_data = PropertyListing::where([
                'no' => $No,
                'ward' => $WardNo,
                'road' => $Road,
            ])->get();
        }

        return json_encode($marketing_data);
    }

    public function get_phone_number($id)
    {
        $marketing = PropertyListing::findOrFail($id);
        $propertyPhoneNumber = explode(',', $marketing->phone);
        $propertyPhoneNumberTotal = count($propertyPhoneNumber);

        $html = '';
        for ($i = 0; $i < $propertyPhoneNumberTotal; $i++) {
            $ph = $propertyPhoneNumber[$i];
            $html .= '<a href="tel:' . $ph . '"><i class="fa fa-phone"></i> ' . $ph . '</a>';
            $html .= "<br>";
        }

        return response()->json(['html' => $html]);
    }
}
