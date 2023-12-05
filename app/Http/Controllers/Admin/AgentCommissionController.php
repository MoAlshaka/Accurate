<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgentCommission;
use Illuminate\Http\Request;

class AgentCommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commissions = AgentCommission::all();
        return view('agentCommission.index')->with(['commissions' => $commissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agentCommission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "desc" => 'required|max:225',

        ]);
        AgentCommission::create([
            "code" => $request->code,
            "name" => $request->name,
            "desc" => $request->desc,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('agent-commission.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $commission = AgentCommission::findorfail($id);
        return view('agentCommission.edit')->with(['commission' => $commission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "desc" => 'required|max:225',

        ]);
        $commission = AgentCommission::findorfail($id);
        $commission->update([
            "code" => $request->code,
            "name" => $request->name,
            "desc" => $request->desc,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('agent-commission.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AgentCommission::destroy($id);
        return redirect()->route('agent-commission.index')->with(['Delete' => 'تم الحذف  بنجاح']);
    }
}
