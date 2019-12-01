@extends('layouts.app')

@section('title', '所有')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4>
                @auth
                    <div class="float-right">
                        <a href="{{ route('workpiece.create') }}" class="btn btn-sm btn-success ml-2">
                            <i class="fas fa-plus"></i>
                            <span class="pl-1">新增</span>
                        </a>
                    </div>
                @endauth
                    工件
            </h4>
            <hr>
            @if(count($workpieces) == 0)
                <p class="text-center">
                    沒有任何工件         
                </p>
            @endif
            @foreach($workpieces as $workpiece)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title">{{ $workpiece->workpiece_name }}</h4>
                                </div>
                                <div class="col-md-4">
                                @auth
                                        <form action="{{ route('workpiece.destroy', ['id' => $workpiece->workpiece_id]) }}" method="POST">
                                            @csrf
                                            <a href="{{ route('workpiece.edit', ['id' => $workpiece->workpiece_id]) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                                <span class="pl-1">編輯</span>
                                            </a>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                                <span class="pl-1">刪除</span>
                                            </button>
                                        </form>
                                    @endauth
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    @if($workpiece->workpiece_name != null)
                                        <span class="badge ml-2">
                                        <a href="{{ route('workpiece.show', ['id' => $workpiece->workpiece_id]) }}" class="float-right card-link">
                                            詳細資料
                                            {{ $workpiece->workpiece_name }}
                                        </a>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                {{ $workpiece->created_at }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        



    </div>

</div>

@stop