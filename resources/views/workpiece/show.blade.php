@extends('layouts.master')

@section('title', $workpiece->workpiece_name)

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-sm-12 pb-2 mt-4 mb-2 border-bottom">
                <div class="row">   
                    <h1>{{ $workpiece->workpiece_name }}</h1>
                    @auth
                        <div class="float-right ml-auto">
                            <form action="{{ route('workpiece.destroy', ['id' => $workpiece->workpiece_id]) }}" method="POST">
                                @csrf
                                <a href="{{ route('workpiece.edit', ['id' => $workpiece->workpiece_id]) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                    <span class="pl-1">編輯工件</span>
                                </a>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                    <span class="pl-1">刪除工件</span>
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <h2>{{ $workpiece->workpiece_id }}</h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        {{ $workpiece->created_at }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                   價格: {{ $workpiece->workpiece_price }}
                </div>
                <div class="col-sm-12">
                   工數: {{ $workpiece->workpiece_formation }}
                </div>
                <div class="col-sm-12">
                   庫存中完成數量: {{ $workpiece->finished }}
                </div>
                <div class="col-sm-12">
                   庫存中未完成數量: {{ $workpiece->unfinished }}
                </div>
                <div class="col-sm-12">
                   設定之安全庫存: {{ $workpiece->safety }}
                </div>
                <!-- <div class="col-sm-12">
                   備註: {{ $workpiece->content }}
                </div>  -->
            </div>
        </div>
    </div>
</div>
@stop