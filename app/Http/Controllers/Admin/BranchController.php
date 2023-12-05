<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index')->with(['branches' => $branches]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "branch_code" => 'required|max:225',
            "branch_name" => 'required|max:225',
            "country" => 'required|max:225',
            "mohafza" => 'required|max:225',
            "city" => 'required|max:225',
            "zone" => 'required|max:225',
            "address" => 'required|max:225',
            "phone" => 'required|max:225',
            "fax" => 'required|max:225',
        ]);
        $checkboxs = $request->checkbox;
        if ($request->has('checkbox')) {
            if (count($checkboxs) == 2) {
                $activity = 1;
                $type = 1;
            } else {
                if ($checkboxs[0] === 'activity') {
                    $activity = 1;
                    $type = 0;
                } else {
                    $type = 1;
                    $activity = 0;
                }
            }
        } else {
            $activity = 0;
            $type = 0;
        }

        Branch::create([
            "branch_code" => $request->branch_code,
            "branch_name" => $request->branch_name,
            "country" => $request->country,
            "mohafza" => $request->mohafza,
            "city" => $request->city,
            "zone" => $request->zone,
            "address" => $request->address,
            "phone" => $request->phone,
            "fax" => $request->fax,
            "status" => "$activity",
            "type" => "$type",
            "user_id" => auth()->user()->id,


        ]);
        return redirect()->route('branches.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $branch = Branch::findorfail($id);
        return view('branches.edit')->with(['branch' => $branch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "branch_code" => 'required|max:225',
            "branch_name" => 'required|max:225',
            "country" => 'required|max:225',
            "mohafza" => 'required|max:225',
            "city" => 'required|max:225',
            "zone" => 'required|max:225',
            "address" => 'required|max:225',
            "phone" => 'required|max:225',
            "fax" => 'required|max:225',
        ]);
        $updateBranch = Branch::findorfail($id);
        $checkboxs = $request->checkbox;
        if ($request->has('checkbox')) {
            if (count($checkboxs) == 2) {
                $activity = 1;
                $type = 1;
            } else {
                if ($checkboxs[0] === 'activity') {
                    $activity = 1;
                    $type = 0;
                } else {
                    $type = 1;
                    $activity = 0;
                }
            }
        } else {
            $activity = 0;
            $type = 0;
        }
        $updateBranch->update([
            "branch_code" => $request->branch_code,
            "branch_name" => $request->branch_name,
            "country" => $request->country,
            "mohafza" => $request->mohafza,
            "city" => $request->city,
            "zone" => $request->zone,
            "address" => $request->address,
            "phone" => $request->phone,
            "fax" => $request->fax,
            "status" => "$activity",
            "type" => "$type",
            "user_id" => auth()->user()->id,

        ]);
        return redirect()->route('branches.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::findorfail($id);
        // if ($branch->zones) {
        // }
        try {
            Branch::destroy($id);
            return redirect()->route('branches.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('branches.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
