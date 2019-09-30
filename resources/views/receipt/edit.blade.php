@extends('layouts.master')

@section('title', '新增採購單')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">編輯：{{ $data->receipt_id }}</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('receipt.update', ['id' => $data->receipt_id]) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group row">
                                <label for="receipt_at" class="col-sm-2 col-form-label-sm text-md-right">發票開立日期</label>
                                <div class="col-sm-8">
                                <input type="date" class="form-control form-control-sm" name="receipt_at" id="receipt_at" value="{{ $receipt_at ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employee_id" class="col-sm-2 col-form-label-sm text-md-right">開立人員</label>
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
                                <label for="company_id" class="col-sm-2 col-form-label-sm text-md-right">廠商</label>
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
                                <label for="workpiece_id" class="col-sm-2 col-form-label-sm text-md-right">訂單工件</label>
                                <div class="col-sm-8">
                                    <select name="workpiece_id" id="workpiece_id" class="form-control form-control-sm {{ $errors->has('workpiece_id') ? ' is-invalid' : '' }}" required>
                                        <option value="{{ $work->workpiece_id }}">{{ $work->workpiece_name }}</option>
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
                                <label for="receipt_price" class="col-sm-2 col-form-label-sm text-md-right">工件單價<</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('receipt_price') ? ' is-invalid' : '' }}" name="receipt_price" id="receipt_price" value="{{ $data->receipt_price ?? '' }}" required>
                                    @if ($errors->has('receipt_price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('receipt_price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="receipt_amount" class="col-sm-2 col-form-label-sm text-md-right">交貨數量</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('receipt_amount') ? ' is-invalid' : '' }}" name="receipt_amount" id="receipt_amount" value="{{ $data->receipt_amount ?? '' }}" required>
                                    @if ($errors->has('receipt_amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('receipt_amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="receipt_total" class="col-sm-2 col-form-label-sm text-md-right">總計</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('receipt_total') ? ' is-invalid' : '' }}" name="receipt_total" id="receipt_total" value="{{ $data->receipt_total ?? '' }}" required>
                                    @if ($errors->has('receipt_total'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('receipt_total') }}</strong>
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