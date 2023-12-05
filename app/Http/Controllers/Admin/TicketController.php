<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\SupportCate;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index')->with(['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $supportCates = SupportCate::all();
        return view('tickets.create')->with(['customers' => $customers, 'supportCates' => $supportCates]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|max:225',
            'notes' => 'required',
            'status' => 'required|max:225',
            'customer_id' => 'required',
            'support_cate_id' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg',
            ]);
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $new_name = uniqid() . ".$ext";
            $image->move(public_path('images/tickets'), $new_name);
        } else {
            $new_name = null;
        }
        Ticket::create([
            'code' => $request->code,
            'address' => $request->address,
            'notes' => $request->notes,
            'status' => $request->status,
            'image' => $new_name,
            'customer_id' => $request->customer_id,
            'support_cate_id' => $request->support_cate_id,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('tickets.index')->with(['Add' => 'تم الاضافة  بنجاح']);
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
        $ticket = Ticket::findorfail($id);
        $customers = Customer::all();
        $supportCates = SupportCate::all();
        return view('tickets.edit')->with(['customers' => $customers, 'supportCates' => $supportCates, 'ticket' => $ticket]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'address' => 'required|max:225',
            'notes' => 'required',
            'status' => 'required|max:225',
            'customer_id' => 'required',
            'support_cate_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);
        $ticket = Ticket::findorfail($id);
        $image_name = $ticket->image;
        if ($request->hasFile('image')) {
            if ($image_name) {
                unlink(public_path("images/tickets/$image_name"));
            }
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = uniqid() . ".$ext";
            $image->move(public_path('images/tickets'), $image_name);
        }
        $ticket->update([
            'code' => $request->code,
            'address' => $request->address,
            'notes' => $request->notes,
            'status' => $request->status,
            'image' => $image_name,
            'customer_id' => $request->customer_id,
            'support_cate_id' => $request->support_cate_id,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('tickets.index')->with(['Update' => 'تم التعديل  بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::findorfail($id);
        if ($ticket->image !== null) {
            $imagePath = public_path("images/tickets/{$ticket->image}");
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $ticket->delete();
        return redirect()->route('tickets.index')->with(['Delete' => 'تم الحذف  بنجاح']);
    }
}
