<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleTeam;
use App\Models\SaleTeam;
use App\Models\SaleTeamUser;
use App\Models\User;
use Illuminate\Http\Request;

class SaleTeamController extends Controller
{
    public function index()
    {
        $sale_teams = SaleTeam::all();
        return view('sale_team.index', compact('sale_teams'));
    }

    public function create()
    {
        $users = User::all();
        return view('sale_team.create', compact('users'));
    }

    public function store(StoreSaleTeam $request)
    {
        $sale_team = new SaleTeam();
        $sale_team->code = $request->code;
        $sale_team->title = $request->title;
        $sale_team->area = $request->area;
        $sale_team->remark = $request->remark;
        $sale_team->save();
        $sale_team_id = $sale_team->id;

        $users = $request->users;
        foreach ($users as $key => $value) {
            $insert[$key]['user_id'] = $value;
            $insert[$key]['sale_team_id'] = $sale_team_id;
        }
        SaleTeamUser::insert($insert);
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }

    public function edit($id)
    {
        $users = User::all();
        $sale_team = SaleTeam::findOrFail($id);
        $sale_team_users = SaleTeamUser::where('sale_team_id', $id)
            ->get();
        return view('sale_team.edit', compact('users', 'sale_team', 'sale_team_users'));
    }

    public function update(StoreSaleTeam $request, $id)
    {
        $sale_team = SaleTeam::findOrFail($id);
        $sale_team->code = $request->code;
        $sale_team->title = $request->title;
        $sale_team->area = $request->area;
        $sale_team->remark = $request->remark;
        $sale_team->update();
        $sale_team_id = $sale_team->id;

        $users = $request->users;
        if ($users) {
            foreach ($users as $key => $value) {
                $insert[$key]['user_id'] = $value;
                $insert[$key]['sale_team_id'] = $sale_team_id;
            }
            SaleTeamUser::insert($insert);
        }
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }

    public function destroy($id)
    {
        $sale_team = SaleTeamUser::findOrFail($id);
        $sale_team->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }
}
