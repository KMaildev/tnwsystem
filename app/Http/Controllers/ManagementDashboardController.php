<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementDashboardController extends Controller
{
    public function index()
    {
        return view('management_dashboard.index');
    }
}
