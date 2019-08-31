@extends('profile.master')

@section('content')
<div class="container">
    <ol class="breadcrumb" style="margin-bottom:5px;padding-bottom:4px;margin-top:0px;padding-top:0px">
        <li class="breadcrumb-item "><a href="{{url('/home ')}}">Home</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/editProfile')}}">Edit Profile</a></li>
        <li class="breadcrumb-item" ><a href="#">Find Friends</a></li>
   </ol>
    <div class="row justify-content-center">
        @include('profile.sidebar')
        <div class="col-md-9" style="left:calc(10%);">
            <div class="card">
                <div class="card-header">{{ucwords(Auth::user()->name)}}</div>
                     <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="col-sm-12 col-md-12">
                            @if (session()->has('data'))
                                <p class="alert alert-success">{!! (session()->get('data')) !!}</p>                                                  
                            @endif
                                @foreach($FriendRequests as $frindkey)
                                <div class="row" style="border-bottom: 1px solid rgba(11, 4, 76, 0.7);margin-bottom: 18px;">
                                        <div class="col-md-3 pull-left">    
                                             <a href=""><img src="{{url('/')}}/public/img/{{$frindkey->image}}" width ="95px" height="95px" class="image-circle"/><br></a>
                                        </div>     
                                        <div class="col-md-6 pull-left">
                                            <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$frindkey->slug}}">{{ucwords($frindkey->name)}}</a></h3>                                                                                  
                                            <p><b>Gender:</b>{{$frindkey->gender}}<br>
                                            <b>Email:</b>{{$frindkey->email}}</p>
                                        </div>                    
                                        <div class="col-md-3 pull-right">                                               
                                                 <p><a href="{{url('/acceptfriend')}}/{{$frindkey->name}}/{{$frindkey->id}}" class="btn btn-info btn-sm">Confirm</a>                                                                                      
                                                 <a href="{{url('/requestremovefriend')}}/{{$frindkey->id}}" class="btn btn-danger btn-sm">Remove</a></p>      
                                        </div>
                                </div>
                                @endforeach
                            </div>     
                        </div>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection
