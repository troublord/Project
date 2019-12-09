@extends('layouts.app')

@section('title', '生產紀錄表')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <form action="{{ route('produce.search') }}" method="GET">

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
            <div class="md-form mt-12">
                <input class="form-control" type="text" placeholder="搜尋工件ID" aria-label="Search" name="id">
                <button class="btn btn-md btn-primary">搜尋</button>
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
                  <th scope="col">生產單號</th>
                  <th scope="col">員工ID</th>
                  <th scope="col">工件ID</th>
                  <th scope="col">產量</th>
                  <th scope="col">電腦指數</th>
                  <th scope="col">加工指數</th>
                  <th scope="col">加工秒數</th>
                  <th scope="col">加工時間</th>
                  <th scope="col">功能</th>
                  <th scope="col">生產日期</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datas as $data)
                    <tr>
                        <th scope="row">{{ $data->produce_id }}</th>
                        <td>
                        {{ $data->employee_id }}
                        </td>
                        <td>
                        {{ $data->workpiece_id }}
                        </td>
                        <td>
                        {{ $data->com_index }}
                        </td>
                        <td>
                        {{ $data->pro_index }}
                        </td>
                        <td>
                        {{ $data->pro_index }}
                        </td>
                        <td>
                        {{ $data->pro_index }}
                        </td>
                        <td>
                        {{ $data->pro_index }}
                        </td>
                        <td>
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
                            

                        </td>
                        <td>
                        <a href="{{ route('produce.show', ['id' => $data->produce_id]) }}" class="float-right card-link">
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