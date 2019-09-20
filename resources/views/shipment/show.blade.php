@extends('layouts.master')

@section('title', $data->shipment_id)

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-sm-12 pb-2 mt-4 mb-2 border-bottom">
                <div class="row">   
                    <h1>{{ $data->shipment_id }}出貨單</h1>
                    @auth
                        <div class="float-right ml-auto">
                            <form action="{{ route('shipment.destroy', ['id' => $data->shipment_id]) }}" method="POST">
                                @csrf
                                <a href="{{ route('shipment.edit', ['id' => $data->shipment_id]) }}" class="btn btn-sm btn-primary">
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
                    <h2>出貨廠商 : {{ $com->company_name }}</h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        運送日期:{{ $shipment_at }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                   運送工件: {{ $work->workpiece_name  }}
                </div>
                <div class="col-sm-12">
                   運送量 : {{ $data->shipment_amount }}
                </div>

            </div>
        </div>
    </div>
</div>
@stop