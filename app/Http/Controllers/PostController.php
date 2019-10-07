<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post as PostEloquent;
use App\PostType as PostTypeEloquent;
use Carbon\Carbon;
use App\Receipt as ReceiptEloquent;
use App\Workpiece as WorkpieceEloquent;
use Auth;
use View;
use Redirect;


class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth', [
            'except' => [
                'index', 'show'
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
        $posts = PostEloquent::orderBy('created_at', 'DESC')->paginate(5);
        $post_types = PostTypeEloquent::orderBy('name', 'ASC')->get();
        
        return View::make('home', compact('posts','post_types','receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post_types = PostTypeEloquent::orderBy('name', 'ASC')->get();
        return View::make('post.create', compact('post_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new PostEloquent($request->all());
        $post->user_id = Auth::user()->id;
        $post->save();
        $posts = PostEloquent::orderBy('created_at', 'DESC')->paginate(5);
        $post_types = PostTypeEloquent::orderBy('name', 'ASC')->get();
        return View::make('home', compact('posts','post_types'));
    }
    public function alert($workpiece_id)
    {
        $workpiece= WorkpieceEloquent::findOrFail($workpiece_id);
        $post = new PostEloquent;
        $post->user_id = Auth::user()->id;
        $post->title=$workpiece->workpiece_name."可供銷售工件不足需要生產";
        $post->type=7;
        $post->content="可出貨工件剩下".$workpiece->in_stock;
        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostEloquent::findOrFail($id);
        return View::make('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = PostEloquent::findOrFail($id);
        $post_types = PostTypeEloquent::orderBy('name' , 'ASC')->get();
        return View::make('post.edit', compact('post', 'post_types'));
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
        $post = PostEloquent::findOrFail($id);
        $post->fill($request->all());
        $post->save();
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
        $post = PostEloquent::findOrFail($id);
        $post->delete();
        $posts = PostEloquent::orderBy('created_at', 'DESC')->paginate(5);
        $post_types = PostTypeEloquent::orderBy('name', 'ASC')->get();
        return View::make('home', compact('posts','post_types'));
    }
}
