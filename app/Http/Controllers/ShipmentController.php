<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $storages = StorageEloquent::where('finished',TRUE)->orderBy('storage_id', 'DESC')->paginate(5);
        return View::make('shipment.create', compact('data','companies','workpieces','storages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $workpieces = WorkpieceEloquent::findOrFail($request->workpiece_id);
        $data = new ShipmentEloquent($request->all());
        $storage=StorageEloquent::findOrFail($request->storage_id)->sum('storage_total');
        $Finished= StorageEloquent::where('finished',TRUE)->sum('storage_total');
        $totalupdate=StorageEloquent::findOrFail($request->storage_id);
        $totalupdate->storage_total=$totalupdate->storage_total-$request->shipment_amount;
        $workpieces->in_stock=$Finished-$request->shipment_amount;
        $data->save();
        $workpieces->save();
        $totalupdate->save();

        // $Unfinished= StorageEloquent::where('finished',FALSE)->sum('storage_total');
        if($workpieces->in_stock>0 && $workpieces->in_stock < 100){
            $alert=new PostController();
            $alert->alert($request->workpiece_id);
        }




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
