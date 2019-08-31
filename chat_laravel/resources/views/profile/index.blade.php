@extends('profile.master')
@section('content') 
<div class="container">
  <ol class="breadcrumb" style="margin-bottom:5px;padding-bottom:4px;margin-top:0px;padding-top:0px">
    <li class="breadcrumb-item "><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item" ><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
  </ol>
    <div class="row justify-content-center">
      @include('profile.sidebar')     
       @foreach($userData as $datakey)
        <div class="col-md-9" style="left:calc(10%);">
            <div class="card">
                <div class="card-header">{{ucwords($datakey->name)}}</div>
                     <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="col-sm-6 col-md-12">
                                <div class="thumbnail">
                                <h2 align="center">{{ucwords($datakey->name)}}</h2>
                                    <img src="{{url('/')}}/public/img/{{$datakey->image}}" width ="120px" height="120px" class="img-circle" /><br>
                                    <div class="caption">
                                    <p align="center">                                       
                                            {{$datakey->city}} in {{$datakey->country}}
                                    </p>
                                        @if(($datakey->user_id)==(Auth::user()->id))
                                        <p align="center">
                                            <a href="{{url('/editProfile')}}" class="btn btn-primary" role="button">Edit Profile</a>                                  
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <h5 class=""> <span class="label label-darkbu">About</span></h5>
                                    <p>                                  
                                        {{$datakey->about}}
                                    </p>
                            </div>
                    </div>
            </div>            
        </div>
        @endforeach
    </div>
</div>
@endsection
