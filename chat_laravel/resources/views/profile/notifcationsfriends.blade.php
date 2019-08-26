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
                <div class="card-header">{{ucwords(Auth::user()->name)}}, your notice</div>
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
                                @foreach($note_friends as $key)
                                <div class="row" style="border-bottom: 1px solid rgba(11, 4, 76, 0.7);margin-bottom: 10px; display:block;">
                                    <ul>
                                         <li>                                            
                                             <p><a href="{{url('/profile')}}/{{$key->slug}}" style="font-weight:bold; color:green">
                                                {{$key->name}}</a><br>{{$key->note}}</p>                    
                                            </i>    
                                        </li>     

                                    </ul>
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
