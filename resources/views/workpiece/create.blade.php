@extends('layouts.master')

@section('title', '新增工件')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">新增工件</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('workpiece.store') }}" method="POST" class="mt-2">
                            @csrf
                            <div class="form-group row">
                                <label for="workpiece_name" class="col-sm-2 col-form-label-sm text-md-right">工件名稱</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('workpiece_name') ? ' is-invalid' : '' }}" name="workpiece_name" id="workpiece_name" required>
                                    @if ($errors->has('workpiece_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('workpiece_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="workpiece_price" class="col-sm-2 col-form-label-sm text-md-right">工件價格</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('workpiece_price') ? ' is-invalid' : '' }}" name="workpiece_price" id="workpiece_price" required>
                                    @if ($errors->has('workpiece_price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('workpiece_price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="workpiece_formation" class="col-sm-2 col-form-label-sm text-md-right">工件工數</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm {{ $errors->has('workpiece_formation') ? ' is-invalid' : '' }}" name="workpiece_formation" id="workpiece_formation" required>
                                    @if ($errors->has('workpiece_formation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('workpiece_formation') }}</strong>
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