@extends('layouts.master')

@section('title', '編輯廠商')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">編輯：{{ $workpiece->workpiece_name }}</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route('workpiece.update', ['id' => $workpiece->workpiece_id]) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group row">
                                <label for="workpiece_name" class="col-sm-2 col-form-label-sm text-md-right">工件名稱</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" name="workpiece_name" id="workpiece_name" value="{{ $workpiece->workpiece_name ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="workpiece_price" class="col-sm-2 col-form-label-sm text-md-right">工件價格</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="workpiece_price" id="workpiece_price" value="{{ $workpiece->workpiece_price ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="workpiece_formation" class="col-sm-2 col-form-label-sm text-md-right">工件工數</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="workpiece_formation" id="workpiece_formation" value="{{ $workpiece->workpiece_formation ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="safety" class="col-sm-2 col-form-label-sm text-md-right">安全庫存量</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="safety" id="safety" value="{{ $workpiece->safety ?? '' }}" required>
                                </div>
                            </div>


                            <!-- <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label-sm text-md-right">備註</label>
                                <div class="col-sm-8">
                                    <textarea name="content" id="content" rows="15" class="form-control form-control-sm" style="resize: vertical; value={{ $workpiece->content ?? '' }}"></textarea>
                                </div>
                            </div>   -->
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