<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\Branch;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zones = Zone::all();
        return view('zones.index')->with(['zones' => $zones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        return view('zones.create')->with(['branches' => $branches]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "zone_code" => 'required|max:225',
            "zone_name" => 'required|max:225',
            "city" => 'required|max:225',
            "branch" => 'required',
        ]);

        if ($request->has('checkbox')) {
            $activity = 1;
        } else {
            $activity = 0;
        }

        Zone::create([
            "zone_code" => $request->zone_code,
            "zone_name" => $request->zone_name,
            "city" => $request->city,
            "branch_id" => $request->branch,
            "status" => "$activity",
            "user_id" => auth()->user()->id,
        ]);
        return redirect()->route('zones.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $zone = Zone::findorfail($id);
        $branches = Branch::all();
        return view('zones.edit')->with(['zone' => $zone, 'branches' => $branches]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "zone_code" => 'required|max:225',
            "zone_name" => 'required|max:225',
            "city" => 'required|max:225',
            "branch" => 'required',
        ]);

        if ($request->has('checkbox')) {
            $activity = 1;
        } else {
            $activity = 0;
        }
        $updateZone = Zone::findorfail($id);
        $updateZone->update([
            "zone_code" => $request->zone_code,
            "zone_name" => $request->zone_name,
            "city" => $request->city,
            "branch_id" => $request->branch,
            "status" => "$activity",
            "user_id" => auth()->user()->id,


        ]);
        return redirect()->route('zones.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Zone::destroy($id);
            return redirect()->route('zones.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('zones.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
