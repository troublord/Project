@extends('layouts.master')

@section('title', '生產紀錄表')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4>
                @auth
                    <div class="float-right">
                        <a href="{{ route('produce.create') }}" class="btn btn-sm btn-success ml-2">
                            <i class="fas fa-plus"></i>
                            <span class="pl-1">新增</span>
                        </a>
                    </div>
                @endauth
                生產紀錄表
            </h4>
            <hr>
            @if(count($datas) == 0)
                <p class="text-center">
                    沒有資料 
                </p>
            @endif
            @foreach($datas as $data)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title">紀錄表號{{ $data->produce_id }}</h4>
                                </div>
                                <div class="col-md-4">
                                @auth
                                        <form action="{{ route('produce.destroy', ['id' => $data->produce_id]) }}" method="POST">
                                            @csrf
                                            <a href="{{ route('produce.edit', ['id' => $data->produce_id]) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                                <span class="pl-1">編輯</span>
                                            </a>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                                <span class="pl-1">刪除</span>
                                            </button>
                                        </form>
                                    @endauth
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                        <span class="badge ml-2">
                                        <a href="{{ route('produce.show', ['id' => $data->produce_id]) }}" class="float-right card-link">
                                            詳細資料
                                        </a>
                                        </span>
                                </div>
                                <div class="col-md-4">
                                {{ $data->created_at }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        



    </div>

</div>

@stop