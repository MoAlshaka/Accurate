<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportCate;
use App\Models\SupportTeam;
use App\Models\User;
use Illuminate\Http\Request;

class SupportTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = SupportTeam::all();
        return view('teams.index')->with(['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $supportCates = SupportCate::all();
        return view('teams.create')->with(['supportCates' => $supportCates, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'support_cate_id' => 'required',
            'users' => 'required',
            'users.*' => 'exists:users,id',
        ]);
        $supportTeam = SupportTeam::create([
            'code' => $request->code,
            'name' => $request->name,
            'support_cate_id' => $request->support_cate_id,
            'created_dy' => auth()->user()->id,
        ]);
        $supportTeam->users()->sync($request->users);
        return redirect()->route('teams.index')->with(['Add' => 'تم الاضافة  بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = SupportTeam::findorfail($id);
        $users = User::all();
        $supportCates = SupportCate::all();
        return view('teams.edit')->with(['supportCates' => $supportCates, 'users' => $users, 'team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'support_cate_id' => 'required',

        ]);
        $supportTeam = SupportTeam::findorfail($id);
        $supportTeam->update([
            'code' => $request->code,
            'name' => $request->name,
            'support_cate_id' => $request->support_cate_id,
            'created_dy' => auth()->user()->id,
        ]);
        $supportTeam->users()->sync($request->users);
        return redirect()->route('teams.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            SupportTeam::destroy($id);
            return redirect()->route('teams.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('teams.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
