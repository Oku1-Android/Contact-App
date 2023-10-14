<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Resources\companiesCollection;
use App\Http\Resources\pagination;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\companyRequest;
use App\Models\User;
use App\Models\Contacts;
use Illuminate\Support\Collection;
use Illuminate\Validation\Validator;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __Construct(){
            $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $companies = auth()->user()->companies()->with('contacts')->latest()->paginate(100);

        return view('companies.index', compact('companies'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company;
        return view('companies.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(companyRequest $request)
    {
        //requesting the data

        $request->user()->companies()->create($request->all());
        return redirect()->route('companies.index')->with('message', "Company has been added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('/companies.edit')->with('company', $company);

        //return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(companyRequest $request, Company $company)
    {
        $company->update($request->all());
        return redirect('company.index')->with('message', "Company has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */

    public function destroy(Company $company)

    {
        $companies->delete();
        //$company->delete();

        return redirect()->route('companies.index')->withSuccess(__( "Company has been deleted successfully"));
    }
}
