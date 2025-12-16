<?php

namespace App\Http\Controllers\admin;

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
        $companies=Company::all();
        return view('admin.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "company_name"=>"required",
            "address"=>"required",
            "email"=>"required|email",
            "phone"=>"required",
            "logo"=>"nullable|image|mimes:jpg,jpeg,png,svg|max:2048",
        ]);
        $company=new Company();
        $company->name=$request->company_name;
        $company->address=$request->address;
        $company->email=$request->email;
        $company->phone=$request->phone;
        $file=$request->logo;
        if($file)
        {
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('images',$filename);
            $company->logo='images/'.$filename;
        }
        $company->save();
        return redirect()->route('company.index');
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
        $company=Company::find($id);
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "company_name"=>"required",
            "address"=>"required",
            "email"=>"required|email",
            "phone"=>"required",
            "logo"=>"nullable|image|mimes:jpg,jpeg,png,svg|max:2048",
        ]);
        $company=Company::findorFail($id);
        $company->name=$request->company_name;
        $company->address=$request->address;
        $company->email=$request->email;
        $company->phone=$request->phone;
        $file=$request->logo;
        if($file)
        {
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('images',$filename);
            $company->logo='images/'.$filename;
        }
        $company->save();
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company=Company::find($id);
        $company->delete();
        return redirect()->route('company.index');
    }
}
