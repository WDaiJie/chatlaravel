@extends('profile.master')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="{{url('/home ')}}">Home</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/editProfile')}}">Edit Profile</a></li>
        <li class="breadcrumb-item" ><a href="#">Jobs</a></li>
   </ol>
    <div class="row justify-content-center">
        @include('profile.sidebar')
        <div class="col-md-9">
            <div class="card">
            <div class="card-header">
                {{ucwords(Auth::user()->name)}}, may you interested in these Jobs<br>
                <a href="{{url('jobs')}}">ALL Jobs</a>
            </div>
                     <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="col-sm-12 col-md-12">
                            @if (session()->has('data'))
                                <p class="alert alert-danger">{!! (session()->get('data')) !!}</p>                                                  
                            @endif
                                @foreach($jobs as $jobkey)
                                <div class="col-md-12">
                                   <div class="col-md-4">
                                        <a href="{{url('/job/')}}/{{$jobkey->id}}">
                                            <div class="thumbnail">
                                                <div class="cpation">
                                                    <p>
                                                        <b>Job Title:</b> {{ucwords($jobkey->job_title)}}<br>
                                                        <b>Email:</b>{{ucwords($jobkey->contact_email)}}<br>
                                                        <b>Skills:</b> {{ucwords($jobkey->skills)}}<br>
                                                        <b>Requirements:</b>{{ucwords($jobkey->requirements)}}<br>
                                                        <b>company:</b> {{ucwords($jobkey->company_id)}}<br>
                                                    </p>
                                        
                                                </div>
                                            </div>
                                        </a>
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
