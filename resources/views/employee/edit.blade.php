@extends('layouts.master')

@section('title', '編輯員工資料')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">編輯：{{ $employee->employee_name }}</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('employee.update', ['id' => $employee->employee_id]) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group row">
                                <label for="employee_name" class="col-sm-2 col-form-label-sm text-md-right">名稱</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" name="employee_name" id="employee_name" value="{{ $employee->employee_name ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employee_phone" class="col-sm-2 col-form-label-sm text-md-right">聯絡電話</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="employee_phone" id="employee_phone" value="{{ $employee->employee_phone ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employee_address" class="col-sm-2 col-form-label-sm text-md-right">聯絡地址</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="employee_address" id="employee_address" value="{{ $employee->employee_address ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employee_email" class="col-sm-2 col-form-label-sm text-md-right">電子信箱</label>
                                <div class="col-sm-8">
                                {{ $employee->employee_email }}  
                                <!-- 因為email設為unique所以不給edit -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employee_birth" class="col-sm-2 col-form-label-sm text-md-right">生日</label>
                                <div class="col-sm-8">
                                <input type="date" class="form-control form-control-sm" name="employee_birth" id="employee_birth" value="{{ $employee_birth ?? '' }}">
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