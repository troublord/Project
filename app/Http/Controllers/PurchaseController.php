<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use Redirect;
use App\Purchase as PurchaseEloquent;
use App\Employee as EmployeeEloquent;
use App\Company as CompanyEloquent;
use DateTime;

class purchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except' => [
                'index', 'show'
            ]
        ]);
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
        $datas = PurchaseEloquent::orderBy('purchase_id', 'DESC')->paginate(5);
        return View::make('purchase.index', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = PurchaseEloquent::orderBy('purchase_id', 'DESC')->paginate(5);
        $companies = CompanyEloquent::orderBy('company_id', 'DESC')->paginate(5);
        $employees = EmployeeEloquent::orderBy('employee_id', 'DESC')->paginate(5);
        return View::make('purchase.create', compact('data','companies','employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new PurchaseEloquent($request->all());
        $data->save();
        return Redirect::route('purchase.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PurchaseEloquent::findOrFail($id);
        $com = CompanyEloquent::findOrFail($data->company_id);
        $emp = EmployeeEloquent::findOrFail($data->employee_id);
        $date=  strtotime($data->purchase_at);
        $purchase_at=date("Y-m-d", $date);
        return View::make('purchase.show', compact('data','com','emp','purchase_at'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // email跟birth要轉過之後才船的過去
        
        $data = PurchaseEloquent::findOrFail($id);
        $com = CompanyEloquent::findOrFail($data->company_id);
        $emp = EmployeeEloquent::findOrFail($data->employee_id);
        $companies = CompanyEloquent::orderBy('company_id', 'DESC')->paginate(5);
        $employees = EmployeeEloquent::orderBy('employee_id', 'DESC')->paginate(5);
        $date=  strtotime($data->purchase_at);
        $purchase_at=date("Y-m-d", $date);
        return View::make('purchase.edit', compact('data','com','emp','purchase_at','companies','employees'));
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
        $data = PurchaseEloquent::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        return Redirect::route('purchase.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PurchaseEloquent::findOrFail($id);
        $data->delete();
        return Redirect::route('purchase.index');
    }
}
