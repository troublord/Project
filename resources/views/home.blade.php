@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('company.index') }}">廠商</a>
                    <a href="{{ route('workpiece.index') }}">工件</a>
                    <a href="{{ route('employee.index') }}">員工</a>
                    <a href="{{ route('paymentrequest.index') }}">請款單</a>
                    <a href="{{ route('produce.index') }}">生產紀錄表</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
