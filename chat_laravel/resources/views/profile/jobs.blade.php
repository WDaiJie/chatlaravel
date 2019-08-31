@extends('profile.master')

@section('content')
<style>
    .jobDiv .company_pic{
        width:50px; 
        height:50px; 
        margin:5px
    }
    .jobDiv{
        border:1px solid #ddd; 
        margin:10px; 
        width:30%; 
        float:left; 
        padding:10px; 
        color:#000
    }
    .jobbarli{
        padding-left:10px; 
        padding-right:5px;
        padding-top:2px;
        padding-bottom:2px
        text-align:justify;
        display: block;
        width: 100%;
    }
</style>
<div class="container">
    <ol class="breadcrumb" style="margin-bottom:5px;padding-bottom:4px;margin-top:0px;padding-top:0px">
        <li class="breadcrumb-item "><a href="{{url('/home ')}}">Home</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/editProfile')}}">Edit Profile</a></li>
        <li class="breadcrumb-item" ><a href="{{url('/jobs')}}">Jobs</a></li>
   </ol>
    <div class="row justify-content-center">
        @include('profile.sidebar')
        <div class="col-md-9" style="left:calc(10%); ">
            <div class="card">
                
                    <div class="card-header">
                        <h4><span style="color:#4905cc">{{ucwords(Auth::user()->name)}}</span>,Jobs you may be interested in</h4>Any location Selected industries:  Any industry Selected company size range:  1 to 1,000 employees
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
                                <div class="jobDiv">
                                    <a href="{{url('job')}}/{{$jobkey->id}}">
                                        <div class="caption">
                                            <div class="jobbarli"><img src="{{Config::get('app.url')}}/public/img/findjob.png"width="25" style="margin:5px"/> {{$jobkey->job_title}} </div>
                                            <div class="jobbarli"> <img src="{{Config::get('app.url')}}/public/img/{{$jobkey->image}}" width="25" style="margin:px"/>  {{ucwords($jobkey->name)}}</div>
                                    </a>
                                            <?php $skills = explode(',',$jobkey->skills)?>
                                                @foreach($skills as $skill)
                                                <div style="background-color:#2e2569; color:#fff; margin-top:5px; border-radius:10px; width:100%; float:left; padding:3px 15px 3px 15px">{{$skill}}
                                                </div>
                                                @endforeach
                                                <a href="{{url('job')}}/{{$jobkey->id}}" style="margin-top:10px; width:100%" class="btn btn-primary">View details</a>
                                            
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
