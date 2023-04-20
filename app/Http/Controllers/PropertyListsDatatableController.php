<?php

namespace App\Http\Controllers;

use App\Models\PropertyListing;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PropertyListsDatatableController extends Controller
{

    public function propertyListsDatatableMarketing(Request $request)
    {
        $start = $request->get('from');
        $to = $request->get('to');

        if ($start && $to) {
            $data = PropertyListing::with('township_table', 'users', 'property_type')
                ->where('reject_status', NULL)
                ->whereBetween('price', [$start, $to])
                ->orderBy('id', 'DESC');
        } else {
            $data = PropertyListing::with('township_table', 'users', 'property_type')
                ->where('reject_status', NULL)
                ->whereHas('users', function ($q) use ($request) {
                    $q->orWhere('name', 'LIKE', '%' . $request . '%');
                })
                ->orderBy('id', 'DESC');
        }

        return Datatables::of($data)
            ->addIndexColumn()

            ->editColumn('marketing_name', function ($each) {
                return $each->users ? $each->users->name : '-';
            })

            ->filterColumn('marketing_name', function ($query, $keyword) {
                $query->whereHas('users', function ($q1) use ($keyword) {
                    $q1->where('name', 'like', '%' . $keyword . '%');
                });
            })

            ->editColumn('offer_status', function ($each) {
                $str = str_replace('_', ' ', $each->offer_status);
                return ucwords($str);
            })

            ->editColumn('township_name', function ($each) {
                return $each->township_table ? $each->township_table->township : '-';
            })

            ->filterColumn('township_name', function ($query, $keyword) {
                $query->whereHas('township_table', function ($q1) use ($keyword) {
                    $q1->where('township', 'like', '%' . $keyword . '%');
                });
            })

            ->editColumn('property_type', function ($each) {
                return $each->property_type ? $each->property_type->property_type : '-';
            })

            ->filterColumn('property_type', function ($query, $keyword) {
                $query->whereHas('property_type', function ($q1) use ($keyword) {
                    $q1->where('property_type', 'like', '%' . $keyword . '%');
                });
            })

            ->editColumn('sqft', function ($each) {
                if ($each->area_width == NULL || $each->area_width == '') {
                    $area_width = 0;
                } else {
                    $area_width = $each->area_width ?? 0;
                }

                if ($each->area_height == NULL || $each->area_height == '') {
                    $area_height = 0;
                } else {
                    $area_height = $each->area_height ?? 0;
                }

                return $area_width . '*' . $area_height . ' = ' . $area_width * $area_height;
            })

            ->editColumn('permission_type', function ($each) {
                if ($each->permission_type == 'grant') {
                    return 'ဂရံ';
                } elseif ($each->permission_type == 'permit') {
                    return 'Permit';
                } elseif ($each->permission_type == 'ancestral_land') {
                    return 'ဘိုးဘွားပိုင်မြေ';
                } else {
                    return '';
                }
            })

            ->editColumn('orginal_or_copy', function ($each) {
                if ($each->orginal_or_copy == 'Orginal') {
                    return 'မူရင်း';
                } elseif ($each->orginal_or_copy == 'Copy') {
                    return 'မိတ္တူ';
                } else {
                    return '';
                }
            })

            ->addColumn('phone', function ($each) {
                $id =  $each->id;
                $html = '';
                $html .= '
                    <button type="button" class="btn btn-primary btn-xs" id="showPhoneModel" data-id="' . $id . '">
                        <i class="fa fa-phone"></i>
                         Phone
                    </button>
                ';
                return $html;
            })

            ->addColumn('photo_status', function ($each) {
                $photo_status = ($each->photo_status == 'no') ? ('No') : ('Yes');
                $bg_status = ($each->photo_status == 'no') ? ('bg-danger') : ('bg-success');

                $html =
                    '<div class="d-flex flex-column w-100">
                        <div class="d-flex justify-content-between">
                            <span>
                            ' . $photo_status . '
                            </span>
                        </div>
                        <div class="progress" style="height:3px; margin-bottom: 0">
                            <div class="progress-bar ' . $bg_status . '"
                                style="width: 100%" role="progressbar">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="' . route('property_file_create', ['id' => $each->id]) . '" style="font-size: 12px;">
                                Upload
                            </a>
                        </div>
                    </div>';
                return $html;
            })

            ->addColumn('action', function ($each) {
                $actions = '';
                return $actions;
            })

            ->rawColumns(['action', 'photo_status', 'phone'])
            ->make(true);
    }


    public function propertyListsDatatableSale(Request $request)
    {
        $start = $request->get('from');
        $to = $request->get('to');

        if ($start && $to) {
            $data = PropertyListing::with('township_table', 'users', 'property_type')
                ->where('reject_status', NULL)
                ->whereBetween('price', [$start, $to])
                ->orderBy('id', 'DESC');
        } else {
            $data = PropertyListing::with('township_table', 'users', 'property_type')
                ->where('reject_status', NULL)
                ->whereHas('users', function ($q) use ($request) {
                    $q->orWhere('name', 'LIKE', '%' . $request . '%');
                })
                ->orderBy('id', 'DESC');
        }

        return Datatables::of($data)
            ->addIndexColumn()

            ->editColumn('marketing_name', function ($each) {
                return $each->users ? $each->users->name : '-';
            })

            ->filterColumn('marketing_name', function ($query, $keyword) {
                $query->whereHas('users', function ($q1) use ($keyword) {
                    $q1->where('name', 'like', '%' . $keyword . '%');
                });
            })

            ->editColumn('offer_status', function ($each) {
                $str = str_replace('_', ' ', $each->offer_status);
                return ucwords($str);
            })

            ->editColumn('township_name', function ($each) {
                return $each->township_table ? $each->township_table->township : '-';
            })

            ->filterColumn('township_name', function ($query, $keyword) {
                $query->whereHas('township_table', function ($q1) use ($keyword) {
                    $q1->where('township', 'like', '%' . $keyword . '%');
                });
            })

            ->editColumn('property_type', function ($each) {
                return $each->property_type ? $each->property_type->property_type : '-';
            })

            ->filterColumn('property_type', function ($query, $keyword) {
                $query->whereHas('property_type', function ($q1) use ($keyword) {
                    $q1->where('property_type', 'like', '%' . $keyword . '%');
                });
            })

            ->editColumn('sqft', function ($each) {
                if ($each->area_width == NULL || $each->area_width == '') {
                    $area_width = 0;
                } else {
                    $area_width = $each->area_width ?? 0;
                }

                if ($each->area_height == NULL || $each->area_height == '') {
                    $area_height = 0;
                } else {
                    $area_height = $each->area_height ?? 0;
                }

                return $area_width . '*' . $area_height . ' = ' . $area_width * $area_height;
            })

            ->editColumn('permission_type', function ($each) {
                if ($each->permission_type == 'grant') {
                    return 'ဂရံ';
                } elseif ($each->permission_type == 'permit') {
                    return 'Permit';
                } elseif ($each->permission_type == 'ancestral_land') {
                    return 'ဘိုးဘွားပိုင်မြေ';
                } else {
                    return '';
                }
            })

            ->editColumn('orginal_or_copy', function ($each) {
                if ($each->orginal_or_copy == 'Orginal') {
                    return 'မူရင်း';
                } elseif ($each->orginal_or_copy == 'Copy') {
                    return 'မိတ္တူ';
                } else {
                    return '';
                }
            })

            ->addColumn('photo_status', function ($each) {
                $photo_status = ($each->photo_status == 'no') ? ('No') : ('Yes');
                $bg_status = ($each->photo_status == 'no') ? ('bg-danger') : ('bg-success');

                $html =
                    '<div class="d-flex flex-column w-100">
                        <div class="d-flex justify-content-between">
                            <span>
                            ' . $photo_status . '
                            </span>
                        </div>
                        <div class="progress" style="height:3px; margin-bottom: 0">
                            <div class="progress-bar ' . $bg_status . '"
                                style="width: 100%" role="progressbar">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="" style="font-size: 12px;">
                                Upload
                            </a>
                        </div>
                    </div>';
                return $html;
            })

            ->addColumn('action', function ($each) {
                $actions = '';
                return $actions;
            })

            ->rawColumns(['action', 'photo_status'])
            ->make(true);
    }
}
