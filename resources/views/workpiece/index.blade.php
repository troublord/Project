@extends('layouts.app')

@section('title', '所有')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>
                @auth
                    <div class="float-right">
                        <a href="{{ route('workpiece.create') }}" class="btn btn-sm btn-success ml-2">
                            <i class="fas fa-plus"></i>
                            <span class="pl-1">新增</span>
                        </a>
                    </div>
                @endauth
                    工件
            </h4>
            <hr>
            @if(count($workpieces) == 0)
                <p class="text-center">
                    沒有任何工件         
                </p>
            @endif
            <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">工件編號</th>
                  <th scope="col">工件名稱</th>
                  <th scope="col">價格</th>
                  <th scope="col">放置工數</th>
                  <th scope="col">可出貨數量</th>
                  <th scope="col">可加工數量</th>
                  <th scope="col">設定之安全庫存</th>
                  <th scope="col">操作</th>
                  <th scope="col">紀錄日期</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workpieces as $workpiece)
                    <tr>
                        <th scope="row">{{ $workpiece->workpiece_id }}</th>
                        <td>
                        {{ $workpiece->workpiece_name }}
                        </td>
                        <td>
                        {{ $workpiece->workpiece_price }}
                        </td>
                        <td>
                        {{ $workpiece->workpiece_formation }}
                        </td>
                        <td>
                        {{ $workpiece->finished }}
                        </td>
                        <td>
                        {{ $workpiece->unfinished }}
                        </td>
                        <td>
                        {{ $workpiece->safety }}
                        </td>
                        <td>
                        @auth
                                @csrf
                                <a href="{{ route('workpiece.edit', ['id' => $workpiece->workpiece_id]) }}" class="btn btn-sm btn-primary">
                                  <i class="fas fa-pencil-alt"></i>
                                  <span class="pl-1">編輯</span>
                                </a>
                            
                        @endauth
                        </td>
                        <td>
                        {{ $workpiece->created_at }}
                        </td>
                    </tr>

                @endforeach
            </tbody>
            </talbe>
        </div>

        



    </div>

</div>

@stop