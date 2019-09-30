@extends('layouts.master')

@section('title', '新增採購單')

@section('content')'
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">新增採購單</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('purchase.store') }}" method="POST" class="mt-2">
                            @csrf
                            <div class="form-group row">
                                <label for="purchase_at" class="col-sm-2 col-form-label-sm text-md-right">購買日期</label>
                                <div class="col-sm-8">
                                    <div class='input-group datepicker' data-provide="datepicker" id='purchase_at'>
                                    <input type='date' class="datepicker form-control {{ $errors->has('purchase_at') ? ' is-invalid' : '' }}" name="purchase_at" id="purchase_at" />

                                    </div>
                                    @if ($errors->has('purchase_at'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('purchase_at') }}</strong>
                                        </span>
                                    @endif
                                   </div>
                            </div>
                            <div class="form-group row">
                                <label for="employee_id" class="col-sm-2 col-form-label-sm text-md-right">採購人員</label>
                                <div class="col-sm-8">
                                    <select name="employee_id" id="employee_id" class="form-control form-control-sm {{ $errors->has('employee_id') ? ' is-invalid' : '' }}">
                                        <option value="0">請選擇員工</option>
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
                                    <select name="company_id" id="company_id" class="form-control form-control-sm {{ $errors->has('company_id') ? ' is-invalid' : '' }}">
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
                                <label for="purchase_name" class="col-sm-2 col-form-label-sm text-md-right">購買物</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('purchase_name') ? ' is-invalid' : '' }}" name="purchase_name" id="purchase_name">
                                    @if ($errors->has('purchase_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('purchase_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="purchase_price" class="col-sm-2 col-form-label-sm text-md-right">購買單價</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('purchase_price') ? ' is-invalid' : '' }}" name="purchase_price" id="purchase_price" required>
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
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('purchase_amount') ? ' is-invalid' : '' }}" name="purchase_amount" id="purchase_amount" required>
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
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('purchase_total') ? ' is-invalid' : '' }}" name="purchase_total" id="purchase_total" required> 
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