<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use View;
use Redirect;
use App\Company as CompanyEloquent;
use App\Receipt as ReceiptEloquent;

class CompanyController extends Controller
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
        $companies = CompanyEloquent::orderBy('company_id', 'DESC')->get();
        $receipts=ReceiptEloquent::groupBy('company_id')->selectRaw('sum(receipt_total) as sum, company_id')->orderBy('sum', 'desc')->get();
        return View::make('company.index', compact('companies','receipts'));
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
        $validate = Validator::make($request->all(), [
            'company_name'=>'required|string',
            'company_contact'=>'required|string|max:10',
            'company_phone'=>'required|numeric',
            'company_address'=>'required|string',
        ],[
            'company_name.required'    => '需要填寫欄位',
            'company_name.string'      => '需為字串',
            'company_contact.max'   => '超過10個字元',
            'company_contact.string'     => '格式錯誤',
            'company_phone.numeric'      => '需為數字',
            'company_address.string'     => '需要為字串',

        ]);
    
        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors());
        }

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
