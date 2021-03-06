@extends('profile.master')
@section('content')
<div class="container">
    <ol class="breadcrumb" style="margin-bottom:5px;padding-bottom:4px;margin-top:0px;padding-top:0px">
        <li class="breadcrumb-item "><a href="{{url('/home')}}">Home</a></li>
    </ol>
    <div class="row justify-content-center">
        @include('profile.sidebar')
        <div class="col-md-9" style="left:calc(10%); ">
            <div class="card">
                <div class="card-header">Dashboard</div>
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
