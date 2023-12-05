<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipments = Shipment::all();
        return view('shipments.index')->with(['shipments' => $shipments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $branches = Branch::all();
        return view('shipments.create')->with(['customers' => $customers, 'branches' => $branches]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "date" => 'required ',
            "shipment_number" => 'required ',
            'type_of_movement' => 'required ',
            'request_type' => 'required ',
            'package_desc' => 'required ',
            'package_price' => 'required ',
            'weight' => 'required ',
            'width' => 'required ',
            'long' => 'required ',
            'high' => 'required ',
            'piece_number' => 'required ',
            'payment_method' => 'required ',
            'package_price' => 'required ',
            'account_type' => 'required ',
            'margay_number' => 'required ',
            'package_open' => 'required ',
            'sender_name' => 'required |max:255',
            'service' => 'required |max:255',
            'sender_city' => 'required |max:255',
            'sender_zone' => 'required |max:255',
            'sender_address' => 'required |max:255',
            'sender_phone' => 'required |max:255',
            'sender_mobile' => 'required |max:255',
            'receiver_name' => 'required |max:255',
            'receiver_city' => 'required |max:255',
            'receiver_zone' => 'required |max:255',
            'receiver_address' => 'required |max:255',
            'receiver_phone' => 'required |max:255',
            'receiver_mobile' => 'required |max:255',
            'branch_id' => 'required ',
            'customer_id' => 'required ',
        ]);
        Shipment::create([
            'date' => $request->date,
            "shipment_number" => $request->shipment_number,
            'type_of_movement' => $request->type_of_movement,
            'request_type' => $request->request_type,
            'package_desc' => $request->package_desc,
            'package_price' => $request->package_price,
            'weight' => $request->weight,
            'width' => $request->width,
            'long' => $request->long,
            'high' => $request->high,
            'piece_number' => $request->piece_number,
            'payment_method' => $request->payment_method,
            'package_price' => $request->package_price,
            'account_type' => $request->account_type,
            'margay_number' => $request->margay_number,
            'package_open' => $request->package_open,
            'notes' => $request->notes,
            'sender_name' => $request->sender_name,
            'service' => $request->service,
            'sender_city' => $request->sender_city,
            'sender_zone' => $request->sender_zone,
            'sender_address' => $request->sender_address,
            'sender_phone' => $request->sender_phone,
            'sender_mobile' => $request->sender_mobile,
            'receiver_name' => $request->receiver_name,
            'receiver_city' => $request->receiver_city,
            'receiver_zone' => $request->receiver_zone,
            'receiver_address' => $request->receiver_address,
            'receiver_phone' => $request->receiver_phone,
            'receiver_mobile' => $request->receiver_mobile,
            'branch_id' => $request->branch_id,
            'customer_id' => $request->customer_id,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('shipments.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $shipment = Shipment::findorfail($id);
        $customers = Customer::all();
        $branches = Branch::all();
        return view('shipments.edit')->with(['customers' => $customers, 'branches' => $branches, 'shipment' => $shipment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "date" => 'required ',
            "shipment_number" => 'required ',
            'type_of_movement' => 'required ',
            'request_type' => 'required ',
            'package_desc' => 'required ',
            'package_price' => 'required ',
            'weight' => 'required ',
            'width' => 'required ',
            'long' => 'required ',
            'high' => 'required ',
            'piece_number' => 'required ',
            'payment_method' => 'required ',
            'package_price' => 'required ',
            'account_type' => 'required ',
            'margay_number' => 'required ',
            'package_open' => 'required ',
            'sender_name' => 'required |max:255',
            'service' => 'required |max:255',
            'sender_city' => 'required |max:255',
            'sender_zone' => 'required |max:255',
            'sender_address' => 'required |max:255',
            'sender_phone' => 'required |max:255',
            'sender_mobile' => 'required |max:255',
            'receiver_name' => 'required |max:255',
            'receiver_city' => 'required |max:255',
            'receiver_zone' => 'required |max:255',
            'receiver_address' => 'required |max:255',
            'receiver_phone' => 'required |max:255',
            'receiver_mobile' => 'required |max:255',
            'branch_id' => 'required ',
            'customer_id' => 'required ',
        ]);
        $updateShipment = Shipment::findorfail($id);
        $updateShipment->update([
            'date' => $request->date,
            "shipment_number" => $request->shipment_number,
            'type_of_movement' => $request->type_of_movement,
            'request_type' => $request->request_type,
            'package_desc' => $request->package_desc,
            'package_price' => $request->package_price,
            'weight' => $request->weight,
            'width' => $request->width,
            'long' => $request->long,
            'high' => $request->high,
            'piece_number' => $request->piece_number,
            'payment_method' => $request->payment_method,
            'package_price' => $request->package_price,
            'account_type' => $request->account_type,
            'margay_number' => $request->margay_number,
            'package_open' => $request->package_open,
            'notes' => $request->notes,
            'sender_name' => $request->sender_name,
            'service' => $request->service,
            'sender_city' => $request->sender_city,
            'sender_zone' => $request->sender_zone,
            'sender_address' => $request->sender_address,
            'sender_phone' => $request->sender_phone,
            'sender_mobile' => $request->sender_mobile,
            'receiver_name' => $request->receiver_name,
            'receiver_city' => $request->receiver_city,
            'receiver_zone' => $request->receiver_zone,
            'receiver_address' => $request->receiver_address,
            'receiver_phone' => $request->receiver_phone,
            'receiver_mobile' => $request->receiver_mobile,
            'branch_id' => $request->branch_id,
            'customer_id' => $request->customer_id,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('shipments.index')->with(['Update' => 'تم الاضافة  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Shipment::destroy($id);
            return redirect()->route('shipments.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('shipments.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
    public function shipments($id)
    {
        $shipments = Shipment::where('customer_id', $id)->get();
        return response($shipments);
    }
}
