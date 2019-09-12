@extends('layouts.master')

@section('title', '新增員工')

@section('content')'
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">新增員工</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('employee.store') }}" method="POST" class="mt-2">
                            @csrf
                            <div class="form-group row">
                                <label for="employee_name" class="col-sm-2 col-form-label-sm text-md-right">名稱</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('employee_name') ? ' is-invalid' : '' }}" name="employee_name" id="employee_name">
                                    @if ($errors->has('employee_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('employee_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employee_phone" class="col-sm-2 col-form-label-sm text-md-right">手機</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('employee_phone') ? ' is-invalid' : '' }}" name="employee_phone" id="employee_phone">
                                    @if ($errors->has('employee_phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('employee_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employee_address" class="col-sm-2 col-form-label-sm text-md-right">居住地址</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('employee_address') ? ' is-invalid' : '' }}" name="employee_address" id="employee_address">
                                    @if ($errors->has('employee_address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('employee_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employee_email" class="col-sm-2 col-form-label-sm text-md-right">電子信箱</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('employee_email') ? ' is-invalid' : '' }}" name="employee_email" id="employee_email">
                                    @if ($errors->has('employee_email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('employee_email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employee_birth" class="col-sm-2 col-form-label-sm text-md-right">生日</label>
                                <div class="col-sm-8">
                                    <div class='input-group datepicker' data-provide="datepicker" id='employee_birth'>
                                    <input type='date' class="datepicker form-control {{ $errors->has('employee_birth') ? ' is-invalid' : '' }}" name="employee_birth" id="employee_birth" />

                                    </div>
                                    @if ($errors->has('employee_birth'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('employee_birth') }}</strong>
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