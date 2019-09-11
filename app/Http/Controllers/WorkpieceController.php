<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use Redirect;
use App\Workpiece as WorkpieceEloquent;

class WorkpieceController extends Controller
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
        $workpieces = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);
        return View::make('workpiece.index', compact('workpieces'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workpiece = WorkpieceEloquent::orderBy('workpiece_id', 'DESC')->paginate(5);
        return View::make('workpiece.create', compact('workpiece'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workpiece = new WorkpieceEloquent($request->all());
        $workpiece->save();
        return Redirect::route('workpiece.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workpiece = WorkpieceEloquent::findOrFail($id);
        return View::make('workpiece.show', compact('workpiece'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workpiece = WorkpieceEloquent::findOrFail($id);
        return View::make('workpiece.edit', compact('workpiece'));
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
        $workpiece = WorkpieceEloquent::findOrFail($id);
        $workpiece->fill($request->all());
        $workpiece->save();
        return Redirect::route('workpiece.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workpiece = WorkpieceEloquent::findOrFail($id);
        $workpiece->delete();
        return Redirect::route('workpiece.index');
    }
}
