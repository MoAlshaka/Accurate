<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subsidiarie;
use Illuminate\Http\Request;

class SubsidiarieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subsidiaries = Subsidiarie::all();
        return view('subsidiaries.index')->with(['subsidiaries' => $subsidiaries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subsidiaries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|max:225',
            "code" => 'required|max:225',
        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        Subsidiarie::create([
            'name' => $request->name,
            'code' => $request->code,
            'status' => "$status",
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('subsidiaries.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $subsidiarie = Subsidiarie::findorfail($id);

        return view('subsidiaries.edit')->with(['subsidiarie' => $subsidiarie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => 'required|max:225',
            "code" => 'required|max:225',
        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        $updateSubsidiarie = Subsidiarie::findorfail($id);
        $updateSubsidiarie->update([
            'name' => $request->name,
            'code' => $request->code,
            'status' => "$status",
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('subsidiaries.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Subsidiarie::destroy($id);
            return redirect()->route('subsidiaries.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('subsidiaries.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
