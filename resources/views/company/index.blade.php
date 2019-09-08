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
                                <div class="col-md-12">
                                    <h4 class="card-title">{{ $company->company_name }}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    @if($company->company_contact != null)
                                        <span class="badge badge-secondary ml-2">
                                            {{ $company->company_contact }}
                                        </span>
                                    @endif
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