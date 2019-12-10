@extends('layouts.master')

@section('title', $data->produce_id)

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-sm-12 pb-2 mt-4 mb-2 border-bottom">
                <div class="row">   
                    <h1>{{ $data->produce_id }}生產紀錄表</h1>
                    @auth
                        <div class="float-right ml-auto">
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
                        </div>
                    @endauth
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <h2>{{ $wp->workpiece_name  }}</h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        生產日期:{{ $produce_date }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                   電腦指數 : {{ $data->com_index }}
                </div>
                <div class="col-sm-12">
                   加工指數 : {{ $data->pro_index }}
                </div>
                <div class="col-sm-12">
                   加工秒數 : {{ $data->pro_second }}
                </div>
                <div class="col-sm-12">
                   總加工時間 : {{ $data->pro_period }}
                </div>
                <div class="col-sm-12">
                   備註 : {{ $data->content }}
                </div>

            </div>
        </div>
    </div>
</div>
@stop