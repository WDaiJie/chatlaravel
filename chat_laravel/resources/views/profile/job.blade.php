@extends('profile.master')

@section('content')
<style>
.jobDetails h4{
    border:1px solid #52075f; 
    width:60%;
    padding:5px; 
    margin:0 auto; 
    text-align:center; 
    color:#745ab3
}
.jobDetails .job_company{
    padding-bottom:10px; 
    border-bottom:1px solid #ddd; 
    margin-top:20px
}
.jobDetails .job_point{
    color:#030388; 
    font-weight:bold
}

.jobDetails .email_link{
    padding:5px; 
    border:1px solid #d20d0d; 
    color:#030388
}
</style>
<div class="container">
    <ol class="breadcrumb" style="margin-bottom:5px;padding-bottom:4px;margin-top:0px;padding-top:0px">
        <li class="breadcrumb-item "><a href="{{url('/home ')}}">Home</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/editProfile')}}">Edit Profile</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/jobs')}}">Jobs</a></li>
        <li class="breadcrumb-item" ><a href="#">{{$jobs[0]->job_title}}</a></li>
   </ol>
    <div class="row justify-content-center">
        @include('profile.sidebar')
        <div class="col-md-9" style="left:calc(10%); ">
            <div class="card">
                <div class="card-header">
                    {{ucwords(Auth::user()->name)}}, may you interested in these Jobs<br>
                    <a href="{{url('jobs')}}"><b style="font-size:30px;">See ALL Job</b></a>
                </div>
                     <div class="card-body">
                        <div class="col-sm-12 col-md-12 jobDetails">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="col-sm-12 col-md-12">
                                @if (session()->has('data'))
                                <p class="alert alert-danger">{!! (session()->get('data')) !!}</p>                                                  
                                @endif
                                @foreach($jobs as $job)
                                <h4><b>{{ucwords($job->name)}} need {{$job->job_title}}</b></h4>
                                <div class="row job_company">
                                    <div class="col-md-2 pull-left">
                                        <img src="{{Config::get('app.url')}}/public/img/{{$job->image}}" class="img-rounded" style="width:140px; height:140px; margin:10px; border:2px solid #ddd; padding:5px">
                                    </div>
                                    <div class="col-md-10 pull-right" style="padding-left:100px">
                                        <p style="font-size:18px;">Name :{{ucwords($job->name)}}</p>
                                        <p style="font-size:18px;">Gender :{{ucwords($job->gender)}}</h3>
                                        <p style="font-size:18px;">Phone :{{ucwords($job->phone)}}</h3>
                                        <p style="font-size:18px;">Email :{{ucwords($job->email)}}</h3>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding-top:15px">
                                    <h3 class="job_point">Requirements: </h3><p>{{$job->requirements}}</p>
                                </div>
                                <div class="col-md-12" style="padding-top:2px">
                                        <h3 class="job_point">Skills:</h3><p>{{$job->skills}}</p>
                                </div>
                                <div class="col-md-12" style="padding-top:2px">
                                    <h3 class="job_point">How to Apply: </h3><p>Please send your awesome CV and PortFolio to email:
                                    <a href="mailto:{{$job->contact_email}}" class="email_link">{{$job->contact_email}}</a></p>
                                </div>
                            </div>
                            @endforeach
                        </div>     
                    </div>
            </div>   
         </div>
    </div>
</div>
@endsection
