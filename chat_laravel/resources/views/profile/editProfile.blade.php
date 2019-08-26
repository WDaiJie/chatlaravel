@extends('profile.master')

@section('content')
<!-- {{$data[0]->city}} -->
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="{{url('/home ')}}">Home</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/editProfile')}}">Edit Profile</a></li>
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

                            <div class="col-sm-6 col-md-12">
                                <div class="thumbnail">
                                        <h2 align="center">{{ucwords(Auth::user()->name)}}</h2>
                                        <img src="{{url('/')}}/public/img/{{Auth::user()->image}}" width ="120px" height="120px" class="img-circle" /><br>
                                    <div class="caption">
                                        <p align="center">
                                            @foreach($data as $key)
                                                {{$key->city}} in {{$key->country}}
                                            @endforeach
                                        </p>
                                        <p align="center">
                                            <a href="{{url('/')}}/changePhoto" class="btn btn-primary" role="button">Change Image</a>                                  
                                        </p>
                                    </div>
                                </div>
                            </div>                                           
                            <div class="col-sm-6 col-md-12">    
                                 <span class="label label-darkbu">Update Profile</span>
                                 <br>
                                 <form action="{{url('/updateProfile')}}" method="post">
                                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="col-md-6">
                                        
                                            <span id="basic-addon1">City Name</span>
                                            <input type="text" class="form-control" placeholder="City Name" name="city">
                                  
                                        <br>
                                      
                                            <span id="basic-addon1">Country Name</span>
                                            <input type="text" class="form-control" placeholder="Country Name" name="country">
                                      
                                        
                                    
                                    </div>     
                                    <div class="col-md-6">
                                     
                                            <span id="basic-addon1">About</span>
                                            <textarea type="text" class="form-control" rows="4" cols="10" name="About"></textarea>
                                        
                                        <br>
                                        <div class="input-group">
                                            <input type="submit" class="btn btn-primary pull-right">
                                        </div>
                                    </div>
                                </form >
                                

                            </div>                                  
                        </div>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection
