@extends('layouts.app')
@section('title','E-Office')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
            asdasdasd
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">จัดการข้อมูลยานพาหนะ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
