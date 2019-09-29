<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post as PostEloquent;	
use App\PostType as PostTypeEloquent;
use View;
use Redirect;

class PostTypeController extends Controller
{
    public function __construct(){
        $this->middleware('auth', [
            'except' => [
                'show'
            ]
        ]); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('post_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PostTypeEloquent::create($request->only('name'));
        $posts = PostEloquent::orderBy('created_at', 'DESC')->paginate(5);
        $post_types = PostTypeEloquent::orderBy('name', 'ASC')->get();
        return View::make('home', compact('posts','post_types'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = PostTypeEloquent::findOrFail($id);
        $post = PostEloquent::where('type', $id)->orderBy('created_at', 'DESC')->paginate(5);
        return View::make('home', compact('posts', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_type = PostTypeEloquent::findOrFail($id);
        return View::make('post_type.edit', compact('post_type'));
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
        $post_type = PostTypeEloquent::findOrFail($id);
        $post_type->fill($request->only('name'));
        $post_type->save();
        $posts = PostEloquent::orderBy('created_at', 'DESC')->paginate(5);
        $post_types = PostTypeEloquent::orderBy('name', 'ASC')->get();
        return View::make('home', compact('posts','post_types'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_type = PostTypeEloquent::findOrFail($id);
        $post_type->post()->delete();
        $post_type->delete();
        $posts = PostEloquent::orderBy('created_at', 'DESC')->paginate(5);
        $post_types = PostTypeEloquent::orderBy('name', 'ASC')->get();
        return View::make('home', compact('posts','post_types'));
    }
}
