<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportCate;
use Illuminate\Http\Request;

class SupportCateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supportCates = SupportCate::all();
        return view('supportCates.index')->with(['supportCates' => $supportCates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supportCates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|max:225',
            "code" => 'required|max:225',
        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        SupportCate::create([
            'name' => $request->name,
            'code' => $request->code,
            'status' => "$status",
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('support-cates.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $supportCate = SupportCate::findorfail($id);

        return view('supportCates.edit')->with(['supportCate' => $supportCate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => 'required|max:225',
            "code" => 'required|max:225',
        ]);
        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        $updateSupportCate = SupportCate::findorfail($id);
        $updateSupportCate->update([
            'name' => $request->name,
            'code' => $request->code,
            'status' => "$status",
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('support-cates.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            SupportCate::destroy($id);
            return redirect()->route('support-cates.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('support-cates.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
