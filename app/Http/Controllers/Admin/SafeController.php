<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Safe;
use App\Models\User;
use Illuminate\Http\Request;

class SafeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $safes = Safe::all();
        return view('safes.index')->with(['safes' => $safes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $users = User::all();
        return view('safes.create')->with(['branches' => $branches, 'users' => $users]);
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
            "user_id" => 'required',

        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        if ($request->has('deposit')) {
            $deposit = 1;
        } else {
            $deposit = 0;
        }
        if ($request->has('withdraw')) {
            $withdraw = 1;
        } else {
            $withdraw = 0;
        }
        if ($request->has('incoming_transfer')) {
            $incoming_transfer = 1;
        } else {
            $incoming_transfer = 0;
        }
        if ($request->has('outgoing_transfer')) {
            $outgoing_transfer = 1;
        } else {
            $outgoing_transfer = 0;
        }
        if ($request->has('colc')) {
            $colc = 1;
        } else {
            $colc = 0;
        }
        if ($request->has('crdt')) {
            $crdt = 1;
        } else {
            $crdt = 0;
        }
        if ($request->has('cash')) {
            $cash = 1;
        } else {
            $cash = 0;
        }
        Safe::create([
            "code" => $request->code,
            "name" => $request->name,
            'branch_id' => $request->branch_id,
            "deposit" => "$deposit",
            "withdraw" => "$withdraw",
            "incoming_transfer" => "$incoming_transfer",
            "outgoing_transfer" => "$outgoing_transfer",
            "colc" => "$colc",
            "crdt" => "$crdt",
            "cash" => "$cash",
            "status" => "$status",
            "user_id" => auth()->user()->id,
            "created_dy" => auth()->user()->id,
        ]);
        return redirect()->route('safes.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $safe = Safe::findorfail($id);
        $branches = Branch::all();
        $users = User::all();
        return view('safes.edit')->with(['branches' => $branches, 'users' => $users, 'safe' => $safe]);
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
            "user_id" => 'required',

        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        if ($request->has('deposit')) {
            $deposit = 1;
        } else {
            $deposit = 0;
        }
        if ($request->has('withdraw')) {
            $withdraw = 1;
        } else {
            $withdraw = 0;
        }
        if ($request->has('incoming_transfer')) {
            $incoming_transfer = 1;
        } else {
            $incoming_transfer = 0;
        }
        if ($request->has('outgoing_transfer')) {
            $outgoing_transfer = 1;
        } else {
            $outgoing_transfer = 0;
        }
        if ($request->has('colc')) {
            $colc = 1;
        } else {
            $colc = 0;
        }
        if ($request->has('crdt')) {
            $crdt = 1;
        } else {
            $crdt = 0;
        }
        if ($request->has('cash')) {
            $cash = 1;
        } else {
            $cash = 0;
        }
        $updateSafe = Safe::findorfail($id);
        $updateSafe->update([
            "code" => $request->code,
            "name" => $request->name,
            'branch_id' => $request->branch_id,
            "deposit" => "$deposit",
            "withdraw" => "$withdraw",
            "incoming_transfer" => "$incoming_transfer",
            "outgoing_transfer" => "$outgoing_transfer",
            "colc" => "$colc",
            "crdt" => "$crdt",
            "cash" => "$cash",
            "status" => "$status",
            "user_id" => auth()->user()->id,
            "created_dy" => auth()->user()->id,
        ]);
        return redirect()->route('safes.index')->with(['Update' => 'تم الاضافة  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Safe::destroy($id);
            return redirect()->route('safes.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('safes.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
