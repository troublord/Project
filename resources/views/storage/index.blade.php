@extends('layouts.app')

@section('title', '入庫單')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
        <form action="{{ route('storage.search') }}" method="GET">
            <h4>
                @auth
                    <div class="float-right">
                        <a href="{{ route('storage.create') }}" class="btn btn-sm btn-success ml-2">
                            <i class="fas fa-plus"></i>
                            <span class="pl-1">新增</span>
                        </a>
                        <button class="btn btn-md btn-primary">搜尋</button>
                    </div>
                @endauth
                入庫單
            </h4>
        <div class="md-form mt-12">
        <input class="form-control" type="text" placeholder="搜尋工件ID" aria-label="Search" name="id">
        </div>
        </form>
            <hr>
            @if(count($datas) == 0)
                <p class="text-center">
                    沒有資料 
                </p>
            @endif

            <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">入庫單號</th>
                  <th scope="col">員工ID</th>
                  <th scope="col">工件ID</th>
                  <th scope="col">入庫量</th>
                  <th scope="col">是否加工</th>
                  <th scope="col">功能</th>
                  <th scope="col">入庫日期</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datas as $data)
                    <tr>
                        <th scope="row">{{ $data->storage_id }}</th>
                        <td>
                        {{ $data->employee_id }}
                        </td>
                        <td>
                        {{ $data->workpiece_id }}
                        </td>
                        <td>
                        {{ $data->storage_amount }}
                        </td>
                        <td>
                        @if($data->status)
                        完成品
                        @else
                        原料
                        @endif
                        </td>
                        <td>
                        @auth
                            <form action="{{ route('storage.destroy', ['id' => $data->storage_id]) }}" method="POST">
                                @csrf
                                <a href="{{ route('storage.edit', ['id' => $data->storage_id]) }}" class="btn btn-sm btn-primary">
                                  <i class="fas fa-pencil-alt"></i>
                                  <span class="pl-1">編輯</span>
                                </a>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                    <span class="pl-1">刪除</span>
                                </button>
                            

                        </td>
                        <td>
                        <a href="{{ route('storage.show', ['id' => $data->storage_id]) }}" class="float-right card-link">
                        {{ $data->created_at }}
                        </a>
                        </td>
                    </tr>
                </form>
                @endauth

               
            @endforeach



            </tbody>
            </talbe>
        </div>

    </div>
</div>

@stop