<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Pkm;
use App\Models\Route;
use App\Models\Shipment;
use Illuminate\Http\Request;

class PkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pkms = Pkm::all();
        return view('pkms.index')->with(['pkms' => $pkms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $routes = Route::all();
        $agents = Agent::all();
        $customers = Customer::all();
        $branches = Branch::all();
        return view('pkms.create')->with(['branches' => $branches, 'agents' => $agents, 'customers' => $customers, 'routes' => $routes,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'date' => 'required',
            'type_of_movement' => 'required',
            'agent_id' => 'required',
            'branch_id' => 'required',
            'route_id' => 'required',
            'shipment_id' => 'required',
            'customer_id' => 'required',
        ]);
        if ($request->has('type')) {
            $type = 1;
        } else {
            $type = 0;
        }

        $numShipment = count($request->shipment_id);

        Pkm::create([
            'code' => $request->code,
            'date' => $request->date,
            'type_of_movement' => $request->type_of_movement,
            'number_of_shipments' => $numShipment,
            'type' => "$type",
            'notes' => $request->notes,
            'branch_id' => $request->branch_id,
            'agent_id' => $request->agent_id,
            'route_id' => $request->route_id,
            'customer_id' => $request->customer_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('pkms.index')->with(['Add' => 'تم الاضافة  بنجاح', 'numShipment' => $numShipment]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Pkm::destroy($id);
            return redirect()->route('pkms.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('pkms.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
