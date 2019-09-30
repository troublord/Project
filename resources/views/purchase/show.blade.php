@extends('layouts.master')

@section('title', $data->purchase_id)

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-sm-12 pb-2 mt-4 mb-2 border-bottom">
                <div class="row">   
                    <h1>{{ $data->purchase_id }}採購單</h1>
                    @auth
                        <div class="float-right ml-auto">
                            <form action="{{ route('purchase.destroy', ['id' => $data->purchase_id]) }}" method="POST">
                                @csrf
                                <a href="{{ route('purchase.edit', ['id' => $data->purchase_id]) }}" class="btn btn-sm btn-primary">
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
                    <h2>購買物: {{ $data->purchase_name  }}</h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        採購日期:{{ $purchase_at }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                   採購人員: {{ $emp->employee_name  }}
                </div>
                <div class="col-sm-12">
                   購買廠商 : {{ $com->company_name }}
                </div>
                <div class="col-sm-12">
                   單價 : {{ $data->purchase_price }}
                </div>
                <div class="col-sm-12">
                   總計 : {{ $data->purchase_amount }}
                </div>
                <div class="col-sm-12">
                   總計 : {{ $data->purchase_total }}
                </div>

            </div>
        </div>
    </div>
</div>
@stop