@extends('layouts.master')

@section('title', $data->receipt_id)

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-sm-12 pb-2 mt-4 mb-2 border-bottom">
                <div class="row">   
                    <h1>{{ $data->receipt_id }}發票</h1>
                    @auth
                        <div class="float-right ml-auto">
                            <form action="{{ route('receipt.destroy', ['id' => $data->receipt_id]) }}" method="POST">
                                @csrf
                                <a href="{{ route('receipt.edit', ['id' => $data->receipt_id]) }}" class="btn btn-sm btn-primary">
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
                    <h2>廠商: {{ $com->company_name  }}</h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        開立日期:{{ $receipt_at }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                   開立人員: {{ $emp->employee_name  }}
                </div>
                <div class="col-sm-12">
                   工件名稱 : {{ $work->workpiece_name }}
                </div>
                <div class="col-sm-12">
                   單價 : {{ $data->receipt_price }}
                </div>
                <div class="col-sm-12">
                   數量 : {{ $data->receipt_amount }}
                </div>
                <div class="col-sm-12">
                   總計 : {{ $data->receipt_total }}
                </div>

            </div>
        </div>
    </div>
</div>
@stop