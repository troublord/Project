<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use View;
use Redirect;
use App\Shipment as ShipmentEloquent;
use App\Workpiece as WorkpieceEloquent;
use App\Company as CompanyEloquent;
use App\Storage as StorageEloquent;
use DateTime;

class shipmentController extends Controller
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
        $datas = ShipmentEloquent::orderBy('shipment_id', 'DESC')->paginate(5);
        return View::make('shipment.index', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ShipmentEloquent::orderBy('shipment_id', 'DESC')->paginate(5);
        $companies = CompanyEloquent::orderBy('company_id', 'DESC')->paginate(10);
        $workpieces = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);

        return View::make('shipment.create', compact('data','companies','workpieces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'shipment_amount'=>'numeric',
            
        ],[
            'shipment_amount.numeric'    => '需為數字',
            

        ]);
    
        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors());
        }

        $workpiece = WorkpieceEloquent::findOrFail($request->workpiece_id);
        $data = new ShipmentEloquent($request->all());
        $RTstat=0;

        if($workpiece->finished>=$request->shipment_amount){//出貨的數量需要小於可以送出的數量
            $workpiece->finished=$workpiece->finished-$request->shipment_amount;
            $RTstat=$workpiece->finished;
        }else {
            return redirect()->back()->withErrors(['出貨數量輸入錯誤', '輸入錯誤']);
        }

        $data->save();
        

         if($RTstat<=$workpiece->safety){
             $alert=new PostController();
             $alert->alert($request->workpiece_id);
         }
         $workpiece->save();




        return Redirect::route('shipment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ShipmentEloquent::findOrFail($id);
        $com = CompanyEloquent::findOrFail($data->company_id);
        $work = WorkpieceEloquent::findOrFail($data->workpiece_id);
        $date=  strtotime($data->shipment_at);
        $shipment_at=date("Y-m-d", $date);
        return View::make('shipment.show', compact('data','com','work','shipment_at'));
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
        
        $data = ShipmentEloquent::findOrFail($id);
        $com = CompanyEloquent::findOrFail($data->company_id);
        $work = WorkpieceEloquent::findOrFail($data->workpiece_id);
        $companies = CompanyEloquent::orderBy('company_id', 'DESC')->paginate(10);
        $workpieces = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);
        $date=  strtotime($data->shipment_at);
        $shipment_at=date("Y-m-d", $date);
        return View::make('shipment.edit', compact('data','com','work','shipment_at','companies','workpieces'));
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
        $data = ShipmentEloquent::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        return Redirect::route('shipment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ShipmentEloquent::findOrFail($id);
        $data->delete();
        return Redirect::route('shipment.index');
    }
}
