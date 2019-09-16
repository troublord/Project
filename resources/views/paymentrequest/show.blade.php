@extends('layouts.master')

@section('title', $data->request_id)

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-sm-12 pb-2 mt-4 mb-2 border-bottom">
                <div class="row">   
                    <h1>{{ $com->company_name }}請款單</h1>
                    @auth
                        <div class="float-right ml-auto">
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
                            </form>
                        </div>
                    @endauth
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <h2>{{ $com->company_name }}</h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        {{ $data->created_at }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                   工件名稱 {{ $wp->workpiece_name }}
                </div>
                <div class="col-sm-12">
                   販賣單價 : {{ $data->request_price }}
                </div>
                <div class="col-sm-12">
                   數量: {{ $data->request_amount }}
                </div>
                <div class="col-sm-12">
                   總計: {{ $data->request_total }}
                </div>

            </div>
        </div>
    </div>
</div>
@stop