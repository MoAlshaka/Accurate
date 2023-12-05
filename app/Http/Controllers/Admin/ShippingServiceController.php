<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Branch;
use App\Models\ShippingService;
use Illuminate\Http\Request;

class ShippingServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippingServices = ShippingService::all();
        return view('shippingServices.index')->with(['shippingServices' => $shippingServices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $agents = Agent::all();
        return view('shippingServices.create')->with(['branches' => $branches, 'agents' => $agents]);;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name',
            'code',
            'days',
        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        ShippingService::create([
            'name' => $request->name,
            'code' => $request->code,
            'days' => $request->days,
            'shipment_type' => $request->shipment_type,
            "status" => "$status",
            'branch_id' => $request->branch_id,
            'account_deliver' => $request->account_deliver,
            'account_tahsel' => $request->account_tahsel,
            'agent_account' => $request->agent_account,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('shipping-services.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $shippingService = ShippingService::findorfail($id);
        $branches = Branch::all();
        $agents = Agent::all();
        return view('shippingServices.edit')->with(['branches' => $branches, 'agents' => $agents, 'shippingService' => $shippingService]);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name',
            'code',
            'days',
        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        $updateShippingServices = ShippingService::findorfail($id);
        $updateShippingServices->update([
            'name' => $request->name,
            'code' => $request->code,
            'days' => $request->days,
            'shipment_type' => $request->shipment_type,
            "status" => "$status",
            'branch_id' => $request->branch_id,
            'account_deliver' => $request->account_deliver,
            'account_tahsel' => $request->account_tahsel,
            'agent_account' => $request->agent_account,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('shipping-services.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            ShippingService::destroy($id);
            return redirect()->route('shipping-services.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('shipping-services.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
