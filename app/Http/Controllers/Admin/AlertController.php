<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alerts = Alert::where('send_date', "!=", null)->get();
        return view('alerts.index')->with(['alerts' => $alerts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alerts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|max:200',
            'type' => 'required',
            'methods' => 'required',
            'content' => 'required',

        ]);
        if ($request->has('save')) {
            $send_date = null;
        } else {
            $send_date = now();
        }

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg',
            ]);
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $new_name = uniqid() . ".$ext";
            $image->move(public_path('images/alerts'), $new_name);
        } else {
            $new_name = null;
        }
        Alert::create([
            'address' => $request->address,
            'type' => $request->type,
            'methods' => $request->methods,
            'content' => $request->content,
            'send_date' => $send_date,
            'image' => $new_name,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('alerts.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $alert = Alert::findorfail($id);
        return view('alerts.edit')->with(['alert' => $alert]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'address' => 'required|max:200',
            'type' => 'required',
            'methods' => 'required',
            'content' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg',
            ]);
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $new_name = uniqid() . ".$ext";
            $image->move(public_path('images/alerts'), $new_name);
        } else {
            $new_name = null;
        }
        $alert = Alert::findorfail($id);
        $alert->update([
            'address' => $request->address,
            'type' => $request->type,
            'methods' => $request->methods,
            'content' => $request->content,
            'image' => $new_name,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('alerts.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Alert::destroy($id);
            return redirect()->route('alerts.index')->with(['Delete' => 'تم الحذف  بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('alerts.index')->with(['Warning' => 'لا يمكن حذف هذا الحقل لانه مرتيط بحقول أخرى']);
        }
    }
}
