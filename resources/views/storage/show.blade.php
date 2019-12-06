@extends('layouts.master')

@section('title', $data->storage_id)

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-sm-12 pb-2 mt-4 mb-2 border-bottom">
                <div class="row"> 
                    <h1>{{ $data->storage_id }}入庫單</h1>
                    @auth
                        <div class="float-right ml-auto">
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
                            </form>
                        </div>
                    @endauth
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <h2>入庫工件 : {{ $work->workpiece_name }}</h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        入庫日期:{{ $storage_at }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                   填寫人員: {{ $emp->employee_name  }}
                </div>
                <div class="col-sm-12">
                   入庫量 : {{ $data->storage_amount }}
                </div>
                <div class="col-sm-12">
                   未完成量 : {{ $work->unfinished }}
                </div>
                <div class="col-sm-12">
                   已完成量 : {{ $work->finished }}
                </div>

            </div>
        </div>
    </div>
</div>
@stop