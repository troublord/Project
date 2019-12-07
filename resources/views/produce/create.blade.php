@extends('layouts.master')

@section('title', '新增生產紀錄表')

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
                <div class="card-header">新增生產紀錄表</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('produce.store') }}" method="POST" class="mt-2">
                            @csrf
                            <div class="form-group row">
                                <label for="employee_id" class="col-sm-2 col-form-label-sm text-md-right">生產員工</label>
                                <div class="col-sm-8">
                                    <select name="employee_id" id="employee_id" class="form-control form-control-sm {{ $errors->has('employee_id') ? ' is-invalid' : '' }}" required>
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
                                <label for="company_id" class="col-sm-2 col-form-label-sm text-md-right">生產工件</label>
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
                                <label for="produce_date" class="col-sm-2 col-form-label-sm text-md-right">生產日期</label>
                                <div class="col-sm-8">
                                    <div class='input-group datepicker' data-provide="datepicker" id='produce_date'>
                                    <input type='date' class="datepicker form-control {{ $errors->has('produce_date') ? ' is-invalid' : '' }}" name="produce_date" id="produce_date" required/>

                                    </div>
                                    @if ($errors->has('produce_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('produce_date') }}</strong>
                                        </span>
                                    @endif
                                   </div>
                            </div>
                            <div class="form-group row">
                                <label for="com_index" class="col-sm-2 col-form-label-sm text-md-right">電腦指數</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('com_index') ? ' is-invalid' : '' }}" name="com_index" id="com_index" required>
                                    @if ($errors->has('com_index'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('com_index') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pro_index" class="col-sm-2 col-form-label-sm text-md-right">加工指數</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('pro_index') ? ' is-invalid' : '' }}" name="pro_index" id="pro_index" required>
                                    @if ($errors->has('pro_index'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pro_index') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pro_second" class="col-sm-2 col-form-label-sm text-md-right">加工秒數</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('pro_second') ? ' is-invalid' : '' }}" name="pro_second" id="pro_second" required>
                                    @if ($errors->has('pro_second'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pro_second') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pro_period" class="col-sm-2 col-form-label-sm text-md-right">總加工天數</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('pro_period') ? ' is-invalid' : '' }}" name="pro_period" id="pro_period" required>
                                    @if ($errors->has('pro_period'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pro_period') }}</strong>
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