<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\JournalType;
use Illuminate\Http\Request;

class JournalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journalTypes = JournalType::all();
        return view('journalTypes.index')->with(['journalTypes' => $journalTypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        return view('journalTypes.create')->with(['branches' => $branches]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "branch_id" => 'required',
            "sersies" => 'required|max:225',
            "reference" => 'required|max:225',
        ]);

        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }

        JournalType::create([
            "code" => $request->code,
            "name" => $request->name,
            "sersies" => $request->sersies,
            "reference" => $request->reference,
            "branch_id" => $request->branch_id,
            "status" => "$status",
            "user_id" => auth()->user()->id,
        ]);
        return redirect()->route('journal-types.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $journalType = JournalType::findorfail($id);
        $branches = Branch::all();
        return view('journalTypes.edit')->with(['branches' => $branches, 'journalType' => $journalType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "branch_id" => 'required',
            "sersies" => 'required|max:225',
            "reference" => 'required|max:225',
        ]);

        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        $updateJournalType = JournalType::findorfail($id);
        $updateJournalType->update([
            "code" => $request->code,
            "name" => $request->name,
            "sersies" => $request->sersies,
            "reference" => $request->reference,
            "branch_id" => $request->branch_id,
            "status" => "$status",
            "user_id" => auth()->user()->id,
        ]);
        return redirect()->route('journal-types.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            JournalType::destroy($id);
            return redirect()->route('journal-types.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('journal-types.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
