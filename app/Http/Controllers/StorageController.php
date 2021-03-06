<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use Redirect;
use App\Storage as StorageEloquent;
use App\Workpiece as WorkpieceEloquent;
use App\Employee as EmployeeEloquent;
use DateTime;

class storageController extends Controller
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
        $datas = StorageEloquent::orderBy('storage_id', 'DESC')->paginate(5);
        return View::make('storage.index', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = StorageEloquent::orderBy('storage_id', 'DESC')->paginate(5);
        $employees = EmployeeEloquent::orderBy('employee_id', 'DESC')->paginate(5);
        $workpieces = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);
        return View::make('storage.create', compact('data','employees','workpieces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new StorageEloquent($request->all());
        $total = StorageEloquent::where('workpiece_id',$data->workpiece_id)->get()->sum('storage_amount');
        $data->storage_total=$request->storage_amount;
        $data->save();
        return Redirect::route('storage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = StorageEloquent::findOrFail($id);
        $total = StorageEloquent::where('workpiece_id',$data->workpiece_id)->get()->sum('storage_total');
        $emp = EmployeeEloquent::findOrFail($data->employee_id);
        $work = WorkpieceEloquent::findOrFail($data->workpiece_id);
        $date=  strtotime($data->storage_at);
        $storage_at=date("Y-m-d", $date);
        return View::make('storage.show', compact('data','emp','work','storage_at','total'));
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
        
        $data = StorageEloquent::findOrFail($id);
        $emp = EmployeeEloquent::findOrFail($data->employee_id);
        $work = WorkpieceEloquent::findOrFail($data->workpiece_id);
        $employees = EmployeeEloquent::orderBy('employee_id', 'DESC')->paginate(5);
        $workpieces = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);
        $date=  strtotime($data->storage_at);
        $storage_at=date("Y-m-d", $date);
        return View::make('storage.edit', compact('data','emp','work','storage_at','employees','workpieces'));
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
        $data = StorageEloquent::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        return Redirect::route('storage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StorageEloquent::findOrFail($id);
        $data->delete();
        return Redirect::route('storage.index');
    }
}
