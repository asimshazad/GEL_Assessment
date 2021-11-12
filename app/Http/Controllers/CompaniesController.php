<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaniesFormRequest;
use App\Models\Company;
use Exception;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesFormRequest $request)
    {
        
        $input = $request->all();
        try {

            if (request()->file('logo')) {

                $file = request()->file('logo');
                $file_extension = $file->getClientOriginalExtension();
                $destination_path = storage_path('app/public/companies');
                $filename = 'storage/companies/'.rand(11111, 99999) .time(). '.' . $file_extension; 
                $file->move($destination_path, $filename);
                $input['logo'] = $filename;
            }
    
            Company::create($input);
            return redirect()->route('companies.index')->with('success', 'Company created successfully.');


        }catch (Exception $ex) {

            return redirect()->route('companies.index')->with('error', $ex->getMessage());
        }
        
      
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('companies.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompaniesFormRequest $request, $id)
    { 
        $input = $request->all();
        try {

            if (request()->file('logo')) {

                $file = request()->file('logo');
                $file_extension = $file->getClientOriginalExtension();
                $destination_path = storage_path('app/public/companies');
                $filename = 'storage/companies/'.rand(11111, 99999) .time(). '.' . $file_extension; 
                $file->move($destination_path, $filename);
                $input['logo'] = $filename;
            }
    
            Company::find($id)->update($input);

            return redirect()->route('companies.index')->with('success', 'Company updated successfully.');


        }catch (Exception $ex) {

            return redirect()->route('companies.index')->with('error', $ex->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
