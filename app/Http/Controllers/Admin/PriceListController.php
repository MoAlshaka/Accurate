<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceList;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priceLists = PriceList::all();
        return view('priceList.index')->with(['priceLists' => $priceLists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('priceList.create');
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

        if ($request->has('checkbox')) {
            $activity = 1;
        } else {
            $activity = 0;
        }

        PriceList::create([
            "code" => $request->code,
            "name" => $request->name,
            "desc" => $request->desc,
            "status" => "$activity",
            "user_id" => auth()->user()->id,
        ]);
        return redirect()->route('price-list.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $priceList = PriceList::findorfail($id);
        return view('priceList.edit')->with(['priceList' => $priceList]);
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
        $updatePriceList = PriceList::findorfail($id);

        if ($request->has('checkbox')) {
            $activity = 1;
        } else {
            $activity = 0;
        }

        $updatePriceList->update([
            "code" => $request->code,
            "name" => $request->name,
            "desc" => $request->desc,
            "status" => "$activity",
            "user_id" => auth()->user()->id,
        ]);
        return redirect()->route('price-list.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            PriceList::destroy($id);
            return redirect()->route('price-list.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('price-list.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
