@extends('layouts.app')

@section('title', '請款資料')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <form action="{{ route('paymentrequest.search') }}" method="GET">
            <h4>
                @auth
                    <div class="float-right">
                        <a href="{{ route('paymentrequest.create') }}" class="btn btn-sm btn-success ml-2">
                            <i class="fas fa-plus"></i>
                            <span class="pl-1">新增</span>
                        </a>
                        <button class="btn btn-md btn-primary">搜尋</button>
                    </div>
                @endauth
                請款單
            </h4>
        <div class="md-form mt-12">
        <input class="form-control" type="text" placeholder="搜尋廠商名稱" aria-label="Search" name="name">
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
                  <th scope="col">請款單號</th>
                  <th scope="col">公司ID</th>
                  <th scope="col">工件ID</th>
                  <th scope="col">販賣單價</th>
                  <th scope="col">數量</th>
                  <th scope="col">總計</th>
                  <th scope="col">功能</th>
                  <th scope="col">紀錄日期</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datas as $data)
                    <tr>
                        <th scope="row">{{ $data->request_id }}</th>
                        <td>
                        {{ $data->company_id }}
                        </td>
                        <td>
                        {{ $data->workpiece_id }}
                        </td>
                        <td>
                        {{ $data->request_price }}
                        </td>
                        <td>
                        {{ $data->request_amount }}
                        </td>
                        <td>
                        {{ $data->request_total }}
                        </td>
                        <td>
                        @auth
                            <form action="{{ route('paymentrequest.destroy', ['id' => $data->request_id]) }}" method="POST">
                                @csrf
                                <a href="{{ route('paymentrequest.edit', ['id' => $data->request_id]) }}" class="btn btn-sm btn-primary">
                                  <i class="fas fa-pencil-alt"></i>
                                  <span class="pl-1">編輯</span>
                                </a>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                    <span class="pl-1">刪除</span>
                                </button>
                            
                        @endauth

                        </td>
                        <td>
                        <a href="{{ route('paymentrequest.show', ['id' => $data->request_id]) }}" class="float-right card-link">
                        {{ $data->created_at }}
                        </a>
                        </td>
                    </tr>
                </form>

               
            @endforeach
            {{ $datas->render() }}


            </tbody>
            </talbe>
        </div>
        



    </div>

</div>

@stop