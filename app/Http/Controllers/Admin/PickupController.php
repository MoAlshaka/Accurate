<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Pickup;
use Illuminate\Http\Request;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pickups = Pickup::all();
        return view('pickups.index')->with(['pickups' => $pickups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agents = Agent::all();
        $customers = Customer::all();
        $branches = Branch::all();
        return view('pickups.create')->with(['branches' => $branches, 'agents' => $agents, 'customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:225',
            'date' => 'required',
            'type_of_movement' => 'required|max:225',
            'customer_id' => 'required',
            'agent_id' => 'required',
            'transport' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'number_of_shipments' => 'required|integer',
            'status' => 'required|max:225',
            'branch_id' => 'required',
        ]);
        Pickup::create([
            'code' => $request->code,
            'date' => $request->date,
            'type_of_movement' => $request->type_of_movement,
            'customer_id' => $request->customer_id,
            'agent_id' => $request->agent_id,
            'transport' => $request->transport,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'number_of_shipments' => $request->number_of_shipments,
            'status' => $request->status,
            'branch_id' => $request->branch_id,
            'notes' => $request->notes,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('pickups.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $pickup = Pickup::findorfail($id);
        $agents = Agent::all();
        $customers = Customer::all();
        $branches = Branch::all();
        return view('pickups.edit')->with(['branches' => $branches, 'agents' => $agents, 'customers' => $customers, 'pickup' => $pickup]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code' => 'required|max:225',
            'date' => 'required',
            'type_of_movement' => 'required|max:225',
            'customer_id' => 'required',
            'agent_id' => 'required',
            'transport' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'number_of_shipments' => 'required|integer',
            'status' => 'required|max:225',
            'branch_id' => 'required',
        ]);
        $pickup = Pickup::findorfail($id);
        $pickup->update([
            'code' => $request->code,
            'date' => $request->date,
            'type_of_movement' => $request->type_of_movement,
            'customer_id' => $request->customer_id,
            'agent_id' => $request->agent_id,
            'transport' => $request->transport,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'number_of_shipments' => $request->number_of_shipments,
            'status' => $request->status,
            'branch_id' => $request->branch_id,
            'notes' => $request->notes,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('pickups.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            Pickup::destroy($id);
            return redirect()->route('pickups.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('pickups.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
