<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use Redirect;
use App\PaymentRequest as PaymentRequestEloquent;
use App\Workpiece as WorkpieceEloquent;
use App\Company as CompanyEloquent;

class PaymentRequestController extends Controller
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
     * 這裡沒有船任何東西進來 
     */
    public function index(Request $request)
    {
        $datas = PaymentRequestEloquent::orderBy('request_id', 'DESC')->paginate(5);
        return View::make('paymentrequest.index', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companys = CompanyEloquent::orderBy('company_id', 'DESC')->paginate(5);
        $workpieces = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);
        return View::make('paymentrequest.create', compact('companys','workpieces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new PaymentRequestEloquent($request->all());
        $data->save();
        return Redirect::route('paymentrequest.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PaymentRequestEloquent::findOrFail($id);
        $wp = WorkpieceEloquent::findOrFail($data->workpiece_id);
        $com = CompanyEloquent::findOrFail($data->company_id);
        return View::make('paymentrequest.show', compact('data', 'wp', 'com'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PaymentRequestEloquent::findOrFail($id);
        $workpieces = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);
        $companys = CompanyEloquent::orderBy('company_id', 'DESC')->paginate(5);
        $wp = WorkpieceEloquent::findOrFail($data->workpiece_id);
        $com = CompanyEloquent::findOrFail($data->company_id);
        return View::make('paymentrequest.edit', compact('data','workpieces','companys' ,'wp', 'com'));
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
        $data = PaymentRequestEloquent::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        return Redirect::route('paymentrequest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PaymentRequestEloquent::findOrFail($id);
        $data->delete();
        return Redirect::route('paymentrequest.index');
    }
}
