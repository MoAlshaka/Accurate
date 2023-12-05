<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = Route::all();
        return view('routeLines.index')->with(['routes' => $routes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('routeLines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "car" => 'required|max:225',
            "driver" => 'required|max:225',

        ]);
        if ($request->has('checkbox')) {
            $activity = 1;
        } else {
            $activity = 0;
        }

        Route::create([
            "code" => $request->code,
            "name" => $request->name,
            "car" => $request->car,
            "driver" => $request->driver,
            "status" => "$activity",
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('routes.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $route = Route::findorfail($id);
        return view('routeLines.edit')->with(['route' => $route]);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "code" => 'required|max:225',
            "name" => 'required|max:225',
            "car" => 'required|max:225',
            "driver" => 'required|max:225',

        ]);
        $updateRoute = Route::findorfail($id);

        if ($request->has('checkbox')) {
            $activity = 1;
        } else {
            $activity = 0;
        }

        $updateRoute->update([
            "code" => $request->code,
            "name" => $request->name,
            "car" => $request->car,
            "driver" => $request->driver,
            "status" => "$activity",
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('routes.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Route::destroy($id);
            return redirect()->route('routes.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('routes.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
