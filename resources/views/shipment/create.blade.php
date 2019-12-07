@extends('layouts.master')

@section('title', '新增出貨單')

@section('content')'
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <h2>
        @if ($errors->any())
                <strong>{{ $errors->first() }}</strong>
        @endif
        </h2>
            <div class="card">
                <div class="card-header">新增出貨單</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('shipment.store') }}" method="POST" class="mt-2">
                            @csrf
                            <div class="form-group row">
                                <label for="shipment_at" class="col-sm-2 col-form-label-sm text-md-right">運送日期</label>
                                <div class="col-sm-8">
                                    <div class='input-group datepicker' data-provide="datepicker" id='shipment_at'>
                                    <input type='date' class="datepicker form-control {{ $errors->has('shipment_at') ? ' is-invalid' : '' }}" name="shipment_at" id="shipment_at" required/>

                                    </div>
                                    @if ($errors->has('shipment_at'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('shipment_at') }}</strong>
                                        </span>
                                    @endif
                                   </div>
                            </div>
                            <div class="form-group row">
                                <label for="workpiece_id" class="col-sm-2 col-form-label-sm text-md-right">運送工件</label>
                                <div class="col-sm-8">
                                    <select name="workpiece_id" id="workpiece_id" class="form-control form-control-sm {{ $errors->has('workpiece_id') ? ' is-invalid' : '' }}" required>
                                        <option value="0">請選擇工件</option>
                                        @foreach($workpieces as $workpiece)
                                            <option value="{{ $workpiece->workpiece_id }}">
                                                {{ $workpiece->workpiece_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('workpiece_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('workpiece_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="company_id" class="col-sm-2 col-form-label-sm text-md-right">出貨廠商</label>
                                <div class="col-sm-8">
                                    <select name="company_id" id="company_id" class="form-control form-control-sm {{ $errors->has('company_id') ? ' is-invalid' : '' }}" required>
                                        <option value="0">請選擇廠商</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->company_id }}">
                                                {{ $company->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shipment_amount" class="col-sm-2 col-form-label-sm text-md-right">運送量</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('shipment_amount') ? ' is-invalid' : '' }}" name="shipment_amount" id="shipment_amount" required>
                                    @if ($errors->has('shipment_amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('shipment_amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-md btn-primary">儲存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop