@extends('layouts.master')

@section('title', '編輯請款單資料')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">編輯：{{ $data->request_id }}</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('paymentrequest.update', ['id' => $data->request_id]) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group row">
                                <label for="company_id" class="col-sm-2 col-form-label-sm text-md-right">公司名稱</label>
                                <div class="col-sm-8">
                                    <select name="company_id" id="company_id" class="form-control form-control-sm {{ $errors->has('company_id') ? ' is-invalid' : '' }}">
                                        <option value="{{ $com->company_id }}">{{ $com->company_name }}</option>
                                        @foreach($companys as $company)
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
                                <label for="company_id" class="col-sm-2 col-form-label-sm text-md-right">工件名稱</label>
                                <div class="col-sm-8">
                                    <select name="workpiece_id" id="workpiece_id" class="form-control form-control-sm {{ $errors->has('workpiece_id') ? ' is-invalid' : '' }}">
                                        <option value="{{ $wp>workpiece_id }}">{{ $wp->workpiece_name }}</option>
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
                                <label for="request_price" class="col-sm-2 col-form-label-sm text-md-right">工件單價</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('request_price') ? ' is-invalid' : '' }}" name="request_price" id="request_price" value="{{ $data->request_price ?? '' }}">
                                    @if ($errors->has('request_price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('request_price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="request_amount" class="col-sm-2 col-form-label-sm text-md-right">數量</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('request_amount') ? ' is-invalid' : '' }}" name="request_amount" id="request_amount" value="{{ $data->request_amount ?? '' }}">
                                    @if ($errors->has('request_amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('request_amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="request_total" class="col-sm-2 col-form-label-sm text-md-right">總計</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('request_total') ? ' is-invalid' : '' }}" name="request_total" id="request_total" value="{{ $data->request_total ?? '' }}">
                                    @if ($errors->has('request_total'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('request_total') }}</strong>
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