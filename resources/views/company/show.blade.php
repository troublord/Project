@extends('layouts.master')

@section('title', $company->company_name)

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-sm-12 pb-2 mt-4 mb-2 border-bottom">
                <div class="row">   
                    <h1>{{ $company->company_name }}</h1>
                    @auth
                        <div class="float-right ml-auto">
                            <form action="{{ route('company.destroy', ['id' => $company->company_id]) }}" method="POST">
                                @csrf
                                <a href="{{ route('company.edit', ['id' => $company->company_id]) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                    <span class="pl-1">編輯廠商</span>
                                </a>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                    <span class="pl-1">刪除廠商</span>
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <h2>{{ $company->company_id }}</h2>
                    </div>
                    <div class="col-sm-6 text-right">
                        {{ $company->created_at }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                   聯絡人: {{ $company->company_contact }}
                </div>
                <div class="col-sm-12">
                   電話: {{ $company->company_phone }}
                </div>
                <div class="col-sm-12">
                   地址: {{ $company->company_address }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop