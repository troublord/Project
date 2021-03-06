<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use Redirect;
use App\Produce as ProduceEloquent;
use App\Employee as EmployeeEloquent;
use App\Workpiece as WorkpieceEloquent;
use DateTime;

class ProduceController extends Controller
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
        $datas = ProduceEloquent::orderBy('produce_id', 'DESC')->paginate(5);
        return View::make('produce.index', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ProduceEloquent::orderBy('produce_id', 'DESC')->paginate(5);
        $workpieces = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);
        $employees = EmployeeEloquent::orderBy('employee_id', 'DESC')->paginate(5);
        return View::make('produce.create', compact('data','workpieces','employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new ProduceEloquent($request->all());
        $data->save();
        return Redirect::route('produce.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProduceEloquent::findOrFail($id);
        $wp = WorkpieceEloquent::findOrFail($data->workpiece_id);
        $emp = EmployeeEloquent::findOrFail($data->employee_id);
        $date=  strtotime($data->produce_date);
        $produce_date=date("Y-m-d", $date);
        return View::make('produce.show', compact('data','wp','emp','produce_date'));
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
        
        $data = ProduceEloquent::findOrFail($id);
        $wp = WorkpieceEloquent::findOrFail($data->workpiece_id);
        $emp = EmployeeEloquent::findOrFail($data->employee_id);
        $workpieces = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);
        $employees = EmployeeEloquent::orderBy('employee_id', 'DESC')->paginate(5);
        $date=  strtotime($data->produce_date);
        $produce_date=date("Y-m-d", $date);
        return View::make('produce.edit', compact('data','wp','emp','produce_date','workpieces','employees'));
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
        $data = ProduceEloquent::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        return Redirect::route('produce.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProduceEloquent::findOrFail($id);
        $data->delete();
        return Redirect::route('produce.index');
    }
}
