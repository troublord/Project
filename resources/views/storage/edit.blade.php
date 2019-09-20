@extends('layouts.master')

@section('title', '新增入庫單')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">編輯：{{ $data->storage_id }}</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('storage.update', ['id' => $data->storage_id]) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group row">
                                <label for="storage_at" class="col-sm-2 col-form-label-sm text-md-right">入庫日期</label>
                                <div class="col-sm-8">
                                <input type="date" class="form-control form-control-sm" name="storage_at" id="storage_at" value="{{ $storage_at ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="workpiece_id" class="col-sm-2 col-form-label-sm text-md-right">入庫工件</label>
                                <div class="col-sm-8">
                                    <select name="workpiece_id" id="workpiece_id" class="form-control form-control-sm {{ $errors->has('workpiece_id') ? ' is-invalid' : '' }}">
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
                                <label for="employee_id" class="col-sm-2 col-form-label-sm text-md-right">填寫人員</label>
                                <div class="col-sm-8">
                                    <select name="employee_id" id="employee_id" class="form-control form-control-sm {{ $errors->has('employee_id') ? ' is-invalid' : '' }}">
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
                                <label for="storage_amount" class="col-sm-2 col-form-label-sm text-md-right">入庫數量</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('storage_amount') ? ' is-invalid' : '' }}" name="storage_amount" id="storage_amount" value="{{ $data->storage_amount ?? '' }}">
                                    @if ($errors->has('storage_amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('storage_amount') }}</strong>
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