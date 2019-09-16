<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use Redirect;
use App\Company as CompanyEloquent;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = CompanyEloquent::orderBy('company_id', 'DESC')->paginate(5);
        return View::make('company.index', compact('companies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = CompanyEloquent::orderBy('company_id', 'DESC')->paginate(5);
        return View::make('company.create', compact('companies'));   
        // 這邊船什麼過去沒差  沒有什麼要顯示的
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new CompanyEloquent($request->all());
        $company->save();
        return Redirect::route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = CompanyEloquent::findOrFail($id);
        return View::make('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = CompanyEloquent::findOrFail($id);
        return View::make('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = CompanyEloquent::findOrFail($id);
        $company->fill($request->all());
        $company->save();
        return Redirect::route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = CompanyEloquent::findOrFail($id);
        $company->delete();
        return Redirect::route('company.index');
    }
}
