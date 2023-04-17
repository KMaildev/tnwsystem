<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketingDashboardController extends Controller
{
    public function index()
    {
        return view('marketing_dashboard.index');
    }
}
