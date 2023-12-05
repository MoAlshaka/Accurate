<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('warehouses.index')->with(['warehouses' => $warehouses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $branches = Branch::all();
        return view('warehouses.create')->with(['branches' => $branches]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|max:225',
            "branch_id" => 'required',
        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        Warehouse::create([
            'name' => $request->name,
            'branch_id' => $request->branch_id,
            'status' => "$status",
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('warehouses.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $warehouse = Warehouse::findorfail($id);
        $branches = Branch::all();
        return view('warehouses.edit')->with(['branches' => $branches, 'warehouse' => $warehouse]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => 'required|max:225',
            "branch_id" => 'required',
        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        $updatewarehouse = Warehouse::findorfail($id);
        $updatewarehouse->update([
            'name' => $request->name,
            'branch_id' => $request->branch_id,
            'status' => "$status",
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('warehouses.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Warehouse::destroy($id);
            return redirect()->route('warehouses.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('warehouses.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
