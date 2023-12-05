<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\JournalType;
use App\Models\ShipmentTransaction;
use App\Models\Subsidiarie;
use Illuminate\Http\Request;

class ShipmentTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipmentTransactions = ShipmentTransaction::all();
        return view('shipmentTransactions.index')->with(['shipmentTransactions' => $shipmentTransactions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $journalTypes = JournalType::all();
        $subsidiaries = Subsidiarie::all();
        $branches = Branch::all();
        return view('shipmentTransactions.create')->with(['branches' => $branches, 'journalTypes' => $journalTypes, 'subsidiaries' => $subsidiaries]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "document" => 'required|max:225',
            "sersies" => 'required|max:225',
            "personal_account" => 'required|max:225',
            "branch_id" => 'required',
            "subsidiary_id" => 'required',
            "journal_type_id" => 'required',
        ]);

        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }

        shipmentTransaction::create([
            "code" => $request->code,
            "name" => $request->name,
            "document" => $request->document,
            "sersies" => $request->sersies,
            "personal_account" => $request->personal_account,
            "subsidiary_id" => $request->subsidiary_id,
            "branch_id" => $request->branch_id,
            "journal_type_id" => $request->journal_type_id,
            "status" => "$status",
            "user_id" => auth()->user()->id,
        ]);
        return redirect()->route('shipment-transactions.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $shipmentTransaction = ShipmentTransaction::findorfail($id);
        $journalTypes = JournalType::all();
        $subsidiaries = Subsidiarie::all();
        $branches = Branch::all();
        return view('shipmentTransactions.edit')->with(['branches' => $branches, 'journalTypes' => $journalTypes, 'subsidiaries' => $subsidiaries, 'shipmentTransaction' => $shipmentTransaction]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "document" => 'required|max:225',
            "sersies" => 'required|max:225',
            "personal_account" => 'required|max:225',
            "branch_id" => 'required',
            "subsidiary_id" => 'required',
            "journal_type_id" => 'required',
        ]);

        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        $shipmentTransaction = ShipmentTransaction::findorfail($id);
        $shipmentTransaction->update([
            "code" => $request->code,
            "name" => $request->name,
            "document" => $request->document,
            "sersies" => $request->sersies,
            "personal_account" => $request->personal_account,
            "subsidiary_id" => $request->subsidiary_id,
            "branch_id" => $request->branch_id,
            "journal_type_id" => $request->journal_type_id,
            "status" => "$status",
            "user_id" => auth()->user()->id,
        ]);
        return redirect()->route('shipment-transactions.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            ShipmentTransaction::destroy($id);
            return redirect()->route('shipment-transactions.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('shipment-transactions.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
