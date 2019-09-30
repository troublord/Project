@extends('layouts.master')

@section('title', '編輯廠商')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">編輯：{{ $company->company_name }}</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('company.update', ['id' => $company->company_id]) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group row">
                                <label for="company_name" class="col-sm-2 col-form-label-sm text-md-right">公司名稱</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" name="company_name" id="company_name" value="{{ $company->company_name ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_contact" class="col-sm-2 col-form-label-sm text-md-right">公司聯絡人</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="company_contact" id="company_contact" value="{{ $company->company_contact ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_phone" class="col-sm-2 col-form-label-sm text-md-right">公司電話</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="company_phone" id="company_phone" value="{{ $company->company_phone ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_address" class="col-sm-2 col-form-label-sm text-md-right">公司地址</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="company_address" id="company_address" value="{{ $company->company_address ?? '' }}" required>
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