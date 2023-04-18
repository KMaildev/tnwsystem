<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleTeamDashboardController extends Controller
{
    public function index()
    {
        return view('sale_team_dashboard.index');
    }
}
