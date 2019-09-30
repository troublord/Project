@extends('layouts.master')

@section('title', '新增採購單')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">編輯：{{ $data->purchase_id }}</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('purchase.update', ['id' => $data->purchase_id]) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group row">
                                <label for="purchase_at" class="col-sm-2 col-form-label-sm text-md-right">購買日期</label>
                                <div class="col-sm-8">
                                <input type="date" class="form-control form-control-sm" name="purchase_at" id="purchase_at" value="{{ $purchase_at ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employee_id" class="col-sm-2 col-form-label-sm text-md-right">採購人員</label>
                                <div class="col-sm-8">
                                    <select name="employee_id" id="employee_id" class="form-control form-control-sm {{ $errors->has('employee_id') ? ' is-invalid' : '' }}" required>
                                        <option value="{{ $emp->employee_id }}">{{ $emp->employee_name }}</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->employee_id }}">
                                                {{ $employee->employee_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('employee_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('employee_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_id" class="col-sm-2 col-form-label-sm text-md-right">購買廠商</label>
                                <div class="col-sm-8">
                                    <select name="company_id" id="company_id" class="form-control form-control-sm {{ $errors->has('company_id') ? ' is-invalid' : '' }}" required>
                                        <option value="{{ $emp->employee_id }}">{{ $com->company_name }}</option>
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
                                <label for="purchase_name" class="col-sm-2 col-form-label-sm text-md-right">購買物</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('purchase_name') ? ' is-invalid' : '' }}" name="purchase_name" id="purchase_name" value="{{ $data->purchase_name ?? '' }}" required>
                                    @if ($errors->has('purchase_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('purchase_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="purchase_price" class="col-sm-2 col-form-label-sm text-md-right">購買單價<</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('purchase_price') ? ' is-invalid' : '' }}" name="purchase_price" id="purchase_price" value="{{ $data->purchase_price ?? '' }}" required>
                                    @if ($errors->has('purchase_price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('purchase_price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="purchase_amount" class="col-sm-2 col-form-label-sm text-md-right">購買數量</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('purchase_amount') ? ' is-invalid' : '' }}" name="purchase_amount" id="purchase_amount" value="{{ $data->purchase_amount ?? '' }}" required>
                                    @if ($errors->has('purchase_amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('purchase_amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="purchase_total" class="col-sm-2 col-form-label-sm text-md-right">總計</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('purchase_total') ? ' is-invalid' : '' }}" name="purchase_total" id="purchase_total" value="{{ $data->purchase_total ?? '' }}" required>
                                    @if ($errors->has('purchase_total'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('purchase_total') }}</strong>
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