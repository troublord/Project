<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company as CompanyEloquent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    // public function companysearch(Request $request){
    //     if(!$request->has('keyword')){
    //         return Redirect::back();
    //     }
    //     $keyword=$request->keyword;
    //      $companies=CompanyEloquent::where('company_name','LIKE',"%$keyword%")->orderBy('company_id','DESC')->paginate(5);
    //      return view('company.index', compact('companies'));
        
    //  }
}
