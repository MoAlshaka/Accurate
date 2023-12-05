<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\CancelReason;
use Illuminate\Http\Request;

class CancellationReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cancellationReasons = CancelReason::all();
        return view('cancellationReason.index')->with(['cancellationReasons' => $cancellationReasons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('cancellationReason.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name',
            "status",
            'code',
            'type',

        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        CancelReason::create([
            'name' => $request->name,
            "status" => "$status",
            'code' => $request->code,
            'type' => $request->type,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('cancellation-reasons.index')->with(['Add' => 'تم الحفظ  بنجاح']);
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
        $cancellationReason = CancelReason::findorfail($id);
        return view('cancellationReason.edit')->with(['cancellationReason' => $cancellationReason]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name',
            "status",
            'code',
            'type',

        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        $updateCancelReason = CancelReason::findorfail($id);
        $updateCancelReason->update([
            'name' => $request->name,
            "status" => "$status",
            'code' => $request->code,
            'type' => $request->type,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('cancellation-reasons.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            CancelReason::destroy($id);
            return redirect()->route('cancellation-reasons.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('cancellation-reasons.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
