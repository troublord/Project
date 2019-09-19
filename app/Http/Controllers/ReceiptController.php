<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use Redirect;
use App\receipt as ReceiptEloquent;
use App\Employee as EmployeeEloquent;
use App\Company as CompanyEloquent;
use App\Workpiece as WorkpieceEloquent;
use DateTime;

class receiptController extends Controller
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
        $datas = ReceiptEloquent::orderBy('receipt_id', 'DESC')->paginate(5);
        return View::make('receipt.index', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ReceiptEloquent::orderBy('receipt_id', 'DESC')->paginate(5);
        $companies = CompanyEloquent::orderBy('company_id', 'DESC')->paginate(5);
        $employees = EmployeeEloquent::orderBy('employee_id', 'DESC')->paginate(5);
        $workpieces = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);
        return View::make('receipt.create', compact('data','companies','employees','workpieces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new ReceiptEloquent($request->all());
        $data->save();
        return Redirect::route('receipt.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ReceiptEloquent::findOrFail($id);
        $com = CompanyEloquent::findOrFail($data->company_id);
        $emp = EmployeeEloquent::findOrFail($data->employee_id);
        $work = WorkpieceEloquent::findOrFail($data->workpiece_id);
        $date=  strtotime($data->receipt_at);
        $receipt_at=date("Y-m-d", $date);
        return View::make('receipt.show', compact('data','com','emp','work','receipt_at'));
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
        
        $data = ReceiptEloquent::findOrFail($id);
        $com = CompanyEloquent::findOrFail($data->company_id);
        $emp = EmployeeEloquent::findOrFail($data->employee_id);
        $work = WorkpieceEloquent::findOrFail($data->workpiece_id);
        $companies = CompanyEloquent::orderBy('company_id', 'DESC')->paginate(5);
        $employees = EmployeeEloquent::orderBy('employee_id', 'DESC')->paginate(5);
        $workpieces = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);
        $date=  strtotime($data->receipt_at);
        $receipt_at=date("Y-m-d", $date);
        return View::make('receipt.edit', compact('data','com','emp','receipt_at','companies','employees','workpieces','work'));
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
        $data = ReceiptEloquent::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        return Redirect::route('receipt.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ReceiptEloquent::findOrFail($id);
        $data->delete();
        return Redirect::route('receipt.index');
    }
}
