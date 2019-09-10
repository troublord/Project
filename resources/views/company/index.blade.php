@extends('layouts.master')

@section('title', '所有文章')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4>
                @auth
                    <div class="float-right">
                        <a href="{{ route('company.create') }}" class="btn btn-sm btn-success ml-2">
                            <i class="fas fa-plus"></i>
                            <span class="pl-1">新增</span>
                        </a>
                    </div>
                @endauth

                @isset($keyword)
                    搜尋：{{ $keyword }}
                @else
                    所有文章
                @endisset           
            </h4>
            <hr>
            @if(count($companies) == 0)
                <p class="text-center">
                    沒有任何廠商
                </p>
            @endif
            @foreach($companies as $company)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title">{{ $company->company_name }}</h4>
                                </div>
                                <div class="col-md-4">
                                @auth
                                        <form action="{{ route('company.destroy', ['id' => $company->company_id]) }}" method="POST">
                                            @csrf
                                            <a href="{{ route('company.edit', ['id' => $company->company_id]) }}" class="btn btn-sm btn-primary">
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
                                    @if($company->company_contact != null)
                                        <span class="badge ml-2">
                                        <a href="{{ route('company.show', ['id' => $company->company_id]) }}" class="float-right card-link">
                                            詳細資料
                                            {{ $company->company_contact }}
                                        </a>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                {{ $company->created_at }}
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