<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentCommission;
use App\Models\Branch;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::all();
        return view('agents.index')->with(['agents' => $agents]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $routes = Route::all();
        $commissions = AgentCommission::all();
        return view('agents.create')->with(['branches' => $branches, 'commissions' => $commissions, 'routes' => $routes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "personal_account" => 'required|max:225',
            "ahda_account" => 'required|max:225',
            "kind_of_commission" => 'required|max:225',
            "much_of_commission" => 'required|max:225',
            "country" => 'required|max:225',
            "mohafza" => 'required|max:225',
            "city" => 'required|max:225',
            "zone" => 'required|max:225',
            "address" => 'required|max:225',
            "phone" => 'required|max:225',
            "phone1" => 'required|max:225',
            "email_box" => 'required|max:225',
            "email_sign" => 'required|max:225',
            "email" => 'required|max:225',
            "branch_id" => 'required',
            "route_id" => 'required',
            "commission_id" => 'required',
        ]);
        $checkboxs = $request->checkbox;
        if ($request->has('checkbox')) {
            if (count($checkboxs) == 2) {
                $activity = 1;
                $payment = 1;
            } else {
                if ($checkboxs[0] === 'activity') {
                    $activity = 1;
                    $payment = 0;
                } else {
                    $payment = 1;
                    $activity = 0;
                }
            }
        } else {
            $activity = 0;
            $payment = 0;
        }
        // dd($payment);
        Agent::create([
            "code" => $request->code,
            "name" => $request->name,
            "personal_account" => $request->personal_account,
            "ahda_account" => $request->ahda_account,
            "kind_of_commission" => $request->kind_of_commission,
            "much_of_commission" => $request->much_of_commission,
            "branch_id" => $request->branch_id,
            "country" => $request->country,
            "route_id" => $request->route_id,
            "commission_id" => $request->commission_id,
            "mohafza" => $request->mohafza,
            "city" => $request->city,
            "zone" => $request->zone,
            "address" => $request->address,
            "phone" => $request->phone,
            "phone1" => $request->phone1,
            "email_box" => $request->email_box,
            "email_sign" => $request->email_sign,
            "email" => $request->email,
            "payment" => "$payment",
            "status" => "$activity",
            'user_id' => auth()->user()->id,

        ]);
        return redirect()->route('agents.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $agent = Agent::findorfail($id);
        $branches = Branch::all();
        $routes = Route::all();
        $commissions = AgentCommission::all();
        return view('agents.edit')->with(['agent' => $agent, 'branches' => $branches, 'commissions' => $commissions, 'routes' => $routes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "personal_account" => 'required|max:225',
            "ahda_account" => 'required|max:225',
            "kind_of_commission" => 'required|max:225',
            "much_of_commission" => 'required|max:225',
            "country" => 'required|max:225',
            "mohafza" => 'required|max:225',
            "city" => 'required|max:225',
            "zone" => 'required|max:225',
            "address" => 'required|max:225',
            "phone" => 'required|max:225',
            "phone1" => 'required|max:225',
            "email_box" => 'required|max:225',
            "email_sign" => 'required|max:225',
            "email" => 'required|max:225',
            "branch_id" => 'required',
            "route_id" => 'required',
            "commission_id" => 'required',
        ]);
        $updateAgent = Agent::findorfail($id);
        $checkboxs = $request->checkbox;
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        if ($request->has('payment')) {
            $payment = 1;
        } else {
            $payment = 0;
        }
        $updateAgent->update([
            "code" => $request->code,
            "name" => $request->name,
            "personal_account" => $request->personal_account,
            "ahda_account" => $request->ahda_account,
            "kind_of_commission" => $request->kind_of_commission,
            "much_of_commission" => $request->much_of_commission,
            "branch_id" => $request->branch_id,
            "country" => $request->country,
            "route_id" => $request->route_id,
            "commission_id" => $request->commission_id,
            "mohafza" => $request->mohafza,
            "city" => $request->city,
            "zone" => $request->zone,
            "address" => $request->address,
            "phone" => $request->phone,
            "phone1" => $request->phone1,
            "email_box" => $request->email_box,
            "email_sign" => $request->email_sign,
            "email" => $request->email,
            "status" => "$status",
            "payment" => "$payment",
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('agents.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Agent::destroy($id);
        return redirect()->route('agents.index')->with(['Delete' => 'تم الحذف  بنجاح']);
    }
    public function agents($id)
    {
        $agents = DB::table("agents")->where("branch_id", $id)->pluck("name", "id");
        return json_decode($agents);
    }
}
