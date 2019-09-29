@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">公告欄</div>


                <div class="card-body">
                <h4>
                @auth
                    
                @endauth

                @isset($type)
                    分類：{{ $type->name }}
                    @auth
                        <div class="float-right">
                            <form action="{{ route('types.destroy', ['id' => $type->id]) }}" method="POST">
                                <span class="ml-2">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                        <span class="pl-1">刪除分類</span>
                                    </button>
                                </span>
                            </form>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('types.edit', ['type' => $type->id]) }}" class="btn btn-sm btn-primary ml-2">
                                <i class="fas fa-pencil-alt"></i>
                                <span class="pl-1">編輯分類</span>
                            </a>
                        </div>
                    @endauth
                @endisset
       
            </h4>
            <hr>
            @if(count($posts) == 0)
                <p class="text-center">
                    沒有任何公告
                </p>
            @endif
            @foreach($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="card-title">{{ $post->title }}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    @if($post->postType != null)
                                        <span class="badge badge-secondary ml-2">
                                            {{ $post->postType->name }}
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4 text-right">
                                    {{ $post->created_at->toDateString() }}
                                </div>
                            </div>
                            <hr class="my-2 mx-0">
                            <div class="row">
                                <div class="col-md-12" style="height: 100px; overflow: hidden;">
                                    <p class="card-text">
                                        {{ $post->content }}
                                    </p> 
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-8">
                                    @auth
                                        <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                                            @csrf
                                            <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                                <span class="pl-1">編輯文章</span>
                                            </a>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                                <span class="pl-1">刪除文章</span>
                                            </button>
                                        </form>
                                    @endauth
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
         <div class="col-md-4">
            <div class="card">
            @auth
            <form action="{{ route('post.store') }}" method="POST" class="mt-2">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label-sm text-md-right">標題</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title">
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-sm-2 col-form-label-sm text-md-right">種類</label>
                                <div class="col-sm-8">
                                    <select name="type" id="type" class="form-control form-control-sm {{ $errors->has('type') ? ' is-invalid' : '' }}">
                                        <option value="0">請選擇...</option>
                                        @foreach($post_types as $post_type)
                                            <option value="{{ $post_type->id }}">
                                                {{ $post_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('post_type.create') }}" class="list-group-item list-group-item-action">建立新分類</a>

                            <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label-sm text-md-right">內文</label>
                                <div class="col-sm-8">
                                    <textarea name="content" id="content" rows="15" class="form-control form-control-sm {{ $errors->has('content') ? ' is-invalid' : '' }}" style="resize: vertical;"></textarea>
                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-md btn-primary">儲存</button>
                                </div>
                            </div>
                        </form>
            @endauth
            </div>
        </div> 
    </div>

</div>
@endsection
