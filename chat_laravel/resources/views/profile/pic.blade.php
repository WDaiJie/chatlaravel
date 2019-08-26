@extends('profile.master')
@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="{{url('/home ')}}">Home</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/editProfile')}}">Edit Profile</a></li>
        <li class="breadcrumb-item" ><a href="#">Change Image</a></li>
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
                                <h3>Update Your Profile</h3> 
                                <img src="{{url('/')}}/public/img/{{Auth::user()->image}}" width ="135px" height="135px" class="img-circle" /><hr>
                                <div class="caption">                                                                       
                                    <form action="{{url('/')}}/uploadPhoto" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <p><input type="file" name="pic" class="form-control"></p>
                                        <input type="submit" class="btn btn-success" name="btn">
                                    </form> 
                                </div>                                  
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
