@extends('profile.master')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="{{url('/home ')}}">Home</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/editProfile')}}">Edit Profile</a></li>
        <li class="breadcrumb-item" ><a href="#">Find Friends</a></li>
   </ol>
    <div class="row justify-content-center">
        @include('profile.sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ucwords(Auth::user()->name)}}</div>
                     <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="col-sm-12 col-md-12">
                                @foreach($allusers as $frindkey)
                                <div class="row" style="border-bottom: 1px solid rgba(11, 4, 76, 0.7);margin-bottom: 18px;">
                                        <div class="col-md-3 pull-left">    
                                                <!-- <h3 align="center">{{ucwords($frindkey->name)}}</h3> -->
                                             <a href=""><img src="{{url('/')}}/public/img/{{$frindkey->image}}" width ="95px" height="95px" class="image-circle"/><br></a>
                                        </div>     
                                        <div class="col-md-6 pull-left"> <h3 style="margin:0px;">
                                            <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$frindkey->slug}}">{{ucwords($frindkey->name)}}</a></h3>
                                                <i class="fa fa-globe"></i> 
                                                    @if(($frindkey->city)&&($frindkey->country)){{$frindkey->city}} in {{$frindkey->country}}<br>{{$frindkey->about}}
                                                    @else Not applicable.
                                                    @endif                                                                                        
                                        </div>                    
                                        <div class="col-md-3 pull-right">
                                        <?php
                                            $check=Auth::user()->checkfriendrequest($frindkey->user_id);                            
                                        ?>      
                                        @if($check==1) <p>Request Already Sent</p>
                                        @elseif($check==2) <p>Request Already Be Sent by other user</p>
                                        @else <p><a href="{{url('/')}}/addfriends/{{$frindkey->id}}"class="btn btn-info btn-sm">Add to Friend</a></p>                                     
                                        @endif
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
