<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::first();
        return view('company.index')->with(['company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $company = Company::findorfail($id);
        // return $company;
        return view('company.edit')->with(['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_name' => 'required|max:225',
            'company_owner' => 'required|max:225',
            'activity' => 'required|max:225',
            'phone' => 'required|max:20',
            'number_of_recorder' => 'required|max:225',
            'number_of_credit' => 'required|max:225',
            'email' => 'required|max:225|email',
            'website' => 'required|max:225',
            'zone' => 'required|max:225',
            'head_of_report' => 'required',
            'footer_of_report' => 'required',
        ]);
        $company = Company::findorfail($id);
        $company->update([
            "company_name"  => $request->company_name,
            "company_owner"  => $request->company_owner,
            "activity"  => $request->activity,
            "phone"  => $request->phone,
            "number_of_recorder"  => $request->number_of_recorder,
            "number_of_credit"  => $request->number_of_credit,
            "email"  => $request->email,
            "website"  => $request->website,
            "zone"  => $request->zone,
            "head_of_report"  => $request->head_of_report,
            "footer_of_report"  => $request->footer_of_report,
        ]);
        return redirect()->route('company.index')->with(["Update" => "تم نعديل البيانات بنجاح"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
