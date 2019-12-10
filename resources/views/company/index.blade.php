@extends('layouts.app')

@section('title', '廠商')

@section('content')
<div class="container">

    <div class="row">
    
        <div class="col-md-8">
        <form action="{{ route('company.search') }}" method="GET">
            <h4>
            廠商
                @auth
                    <div class="float-right">
                        <a href="{{ route('company.create') }}" class="btn btn-sm btn-success ml-2">
                            <i class="fas fa-plus"></i>
                            <span class="pl-1">新增</span>
                        </a>
                        <button class="btn btn-md btn-primary">搜尋</button>
                    </div>
                @endauth
                
            </h4>

        <div class="md-form mt-12">
        <input class="form-control" type="text" placeholder="搜尋廠商名稱" aria-label="Search" name="name">
        </div>
        </form>
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
                                    <h4 class="card-title">{{ $company->company_name}}</h4>
                                    <h4 >{{$company->company_id}}</h4>
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
        <div class="col-md-4">
            <div class="list-group">
                <a href="{{ route('company.index') }}" class=" list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    廠商銷售排行
                    <span class="badge badge-secondary badge-pill">廠商數{{ count($companies) }}</span>
                </a>
                @foreach ($receipts as $a)
                    <a href="{{ route('company.show', ['id' => $a->company_id]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ $a->company_id }}
                        <span class="badge badge-secondary badge-pill">
                            {{ $a->sum }}
                        </span>
                    </a>
                @endforeach

            </div>
    </div>



    </div>

</div>

@stop