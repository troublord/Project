@extends('layouts.master')

@section('title', '新增廠商')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">新增廠商</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('company.store') }}" method="POST" class="mt-2">
                            @csrf
                            <div class="form-group row">
                                <label for="company_name" class="col-sm-2 col-form-label-sm text-md-right">公司名稱</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" id="company_name">
                                    @if ($errors->has('company_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_contact" class="col-sm-2 col-form-label-sm text-md-right">公司聯絡人</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('company_contact') ? ' is-invalid' : '' }}" name="company_contact" id="company_contact">
                                    @if ($errors->has('company_contact'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_contact') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_phone" class="col-sm-2 col-form-label-sm text-md-right">公司電話</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('company_phone') ? ' is-invalid' : '' }}" name="company_phone" id="company_phone">
                                    @if ($errors->has('company_phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_address" class="col-sm-2 col-form-label-sm text-md-right">公司地址</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('company_address') ? ' is-invalid' : '' }}" name="company_address" id="company_address">
                                    @if ($errors->has('company_address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label-sm text-md-right">備註</label>
                                <div class="col-sm-8">
                                    <textarea name="content" id="content" rows="15" class="form-control form-control-sm {{ $errors->has('content') ? ' is-invalid' : '' }}" style="resize: vertical;"></textarea>
                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
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