<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\PriceList;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index')->with(['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $priceLists = PriceList::all();
        return view('customers.create')->with(['branches' => $branches, 'priceLists' => $priceLists]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "company_representative" => 'required|max:225',
            'branch_id' => 'required',
            "personal_account" => 'required|max:225',
            "activity" => 'required|max:225',
            "account_type" => 'required|max:225',
            "request_type" => 'required|max:225',
            "package_open" => 'required|max:225',
            "category" => 'required|max:225',
            'price_list_id' => 'required',
            "tax" => 'required|max:225',
            "payment_method" => 'required|max:225',
            "payment_schedule" => 'required|max:225',
            "phone_hiden" => 'required|max:225',
            "city" => 'required|max:225',
            "zone" => 'required|max:225',
            "phone" => 'required|max:225',
            "mobile" => 'required|max:225',
            "postal_code" => 'required|max:225',
            "address" => 'required|max:225',
            "email" => 'required|max:225|email',

        ]);

        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        if ($request->has('shipping_code')) {
            $shipping_code = 1;
        } else {
            $shipping_code = 0;
        }
        if ($request->has('return_fees')) {
            $return_fees = 1;
        } else {
            $return_fees = 0;
        }
        if ($request->has('uncollected_shipments')) {
            $uncollected_shipments = 1;
        } else {
            $uncollected_shipments = 0;
        }
        if ($request->has('storage')) {
            $storage = 1;
        } else {
            $storage = 0;
        }
        if ($request->has('receipt_code')) {
            $receipt_code = 1;
        } else {
            $receipt_code = 0;
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
        Customer::create([
            "code" => $request->code,
            "name" => $request->name,
            "company_representative" => $request->company_representative,
            'branch_id' => $request->branch_id,
            "personal_account" => $request->personal_account,
            "activity" => $request->activity,
            "account_type" => $request->account_type,
            "request_type" => $request->request_type,
            "package_open" => $request->package_open,
            "category" => $request->category,
            'price_list_id' => $request->price_list_id,
            "tax" => $request->tax,
            "payment_method" => $request->payment_method,
            "payment_schedule" => $request->payment_schedule,
            "phone_hiden" => $request->phone_hiden,
            "city" => $request->city,
            "zone" => $request->zone,
            "phone" => $request->phone,
            "mobile" => $request->mobile,
            "postal_code" => $request->postal_code,
            "address" => $request->address,
            "email" => $request->email,
            "shipping_code" => "$shipping_code",
            "return_fees" => "$return_fees",
            "uncollected_shipments" => "$uncollected_shipments",
            "storage" => "$storage",
            "receipt_code" => "$receipt_code",
            "colc" => "$colc",
            "crdt" => "$crdt",
            "cash" => "$cash",
            "status" => "$status",
            "user_id" => auth()->user()->id,
        ]);
        return redirect()->route('customers.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $branches = Branch::all();
        $priceLists = PriceList::all();
        $customer = Customer::findorfail($id);
        return view('customers.edit')->with(['branches' => $branches, 'priceLists' => $priceLists, 'customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "company_representative" => 'required|max:225',
            'branch_id' => 'required',
            "personal_account" => 'required|max:225',
            "activity" => 'required|max:225',
            "account_type" => 'required|max:225',
            "request_type" => 'required|max:225',
            "package_open" => 'required|max:225',
            "category" => 'required|max:225',
            'price_list_id' => 'required',
            "tax" => 'required|max:225',
            "payment_method" => 'required|max:225',
            "payment_schedule" => 'required|max:225',
            "phone_hiden" => 'required|max:225',
            "city" => 'required|max:225',
            "zone" => 'required|max:225',
            "phone" => 'required|max:225',
            "mobile" => 'required|max:225',
            "postal_code" => 'required|max:225',
            "address" => 'required|max:225',
            "email" => 'required|max:225|email',

        ]);

        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        if ($request->has('shipping_code')) {
            $shipping_code = 1;
        } else {
            $shipping_code = 0;
        }
        if ($request->has('return_fees')) {
            $return_fees = 1;
        } else {
            $return_fees = 0;
        }
        if ($request->has('uncollected_shipments')) {
            $uncollected_shipments = 1;
        } else {
            $uncollected_shipments = 0;
        }
        if ($request->has('storage')) {
            $storage = 1;
        } else {
            $storage = 0;
        }
        if ($request->has('receipt_code')) {
            $receipt_code = 1;
        } else {
            $receipt_code = 0;
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
        $updateCustomer = Customer::findorfail($id);
        $updateCustomer->update([
            "code" => $request->code,
            "name" => $request->name,
            "company_representative" => $request->company_representative,
            'branch_id' => $request->branch_id,
            "personal_account" => $request->personal_account,
            "activity" => $request->activity,
            "account_type" => $request->account_type,
            "request_type" => $request->request_type,
            "package_open" => $request->package_open,
            "category" => $request->category,
            'price_list_id' => $request->price_list_id,
            "tax" => $request->tax,
            "payment_method" => $request->payment_method,
            "payment_schedule" => $request->payment_schedule,
            "phone_hiden" => $request->phone_hiden,
            "city" => $request->city,
            "zone" => $request->zone,
            "phone" => $request->phone,
            "mobile" => $request->mobile,
            "postal_code" => $request->postal_code,
            "address" => $request->address,
            "email" => $request->email,
            "shipping_code" => "$shipping_code",
            "return_fees" => "$return_fees",
            "uncollected_shipments" => "$uncollected_shipments",
            "storage" => "$storage",
            "receipt_code" => "$receipt_code",
            "colc" => "$colc",
            "crdt" => "$crdt",
            "cash" => "$cash",
            "status" => "$status",
            "user_id" => auth()->user()->id,
        ]);
        return redirect()->route('customers.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Customer::destroy($id);
            return redirect()->route('customers.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('customers.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
