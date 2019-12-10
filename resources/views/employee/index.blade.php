@extends('layouts.app')

@section('title', '員工')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4>
                @auth
                    <div class="float-right">
                        <a href="{{ route('employee.create') }}" class="btn btn-sm btn-success ml-2">
                            <i class="fas fa-plus"></i>
                            <span class="pl-1">新增</span>
                        </a>
                    </div>
                @endauth
                員工
            </h4>
            <hr>
            @if(count($employees) == 0)
                <p class="text-center">
                    沒有員工資料 
                </p>
            @endif
            @foreach($employees as $employee)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title">{{ $employee->employee_name }}</h4>
                                </div>
                                <div class="col-md-4">
                                @auth
                                        <form action="{{ route('employee.destroy', ['id' => $employee->employee_id]) }}" method="POST">
                                            @csrf
                                            <a href="{{ route('employee.edit', ['id' => $employee->employee_id]) }}" class="btn btn-sm btn-primary">
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
                                        <span class="badge ml-2">
                                        <a href="{{ route('employee.show', ['id' => $employee->employee_id]) }}" class="float-right card-link">
                                            詳細資料
                                        </a>
                                        </span>
                                </div>
                                <div class="col-md-4">
                                {{ $employee->created_at }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-4">
            <div class="list-group">
                <a href="{{ route('produce.index') }}" class=" list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    員工生產效率等級
                    <span class="badge badge-secondary badge-pill">員工數{{ count($employees) }}</span>
                </a>
                @foreach ($employees as $employee)
        
                    <a href="{{ route('produce.search_emp', ['id' => $employee->employee_id]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ $employee->employee_name}}
                        <span class="badge badge-secondary badge-pill">
                            @if ($employee->total_hours != 0)
                                {{round($employee->total_index/$employee->total_hours)}}
                            @else
                            0
                            @endif
                        </span>
                    </a>
                @endforeach

            </div>
        </div>

    </div>

</div>

@stop