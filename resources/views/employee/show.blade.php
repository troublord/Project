@extends('layouts.master')

@section('title', $employee->employee_name)

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-sm-12 pb-2 mt-4 mb-2 border-bottom">
                <div class="row">   
                    <h1>{{ $employee->employee_name }}</h1>
                    @auth
                        <div class="float-right ml-auto">
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
                        </div>
                    @endauth
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <h2>{{ $employee->employee_id }}</h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        {{ $employee->created_at }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                   聯絡電話: {{ $employee->employee_phone }}
                </div>
                <div class="col-sm-12">
                   聯絡地址: {{ $employee->employee_address }}
                </div>
                <div class="col-sm-12">
                   電子信箱: {{ $employee->employee_email }}
                </div>
                <div class="col-sm-12">
                   生日: {{ $employee_birth }}
                </div>

            </div>
        </div>
    </div>
</div>
@stop