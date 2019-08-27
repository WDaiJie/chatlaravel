<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('public/js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="stylesheet" href="{{ asset('public/js/bootstrap.min.js') }}">
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color:   #e4e5fb;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .top_bar{
              position:relative; 
              width:99%; 
              top:0; 
              padding:5px; 
              margin:0 5
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 500;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px0;
            }
            .heard_har{
              background-color: #f6f7f9;
                    border-bottom: 1px solid #dddfe2;
                    border-radius: 2px 2px 0 0;
                    font-weight: bold;
                    padding: 8px 6px;
            }
            .left-sidebar, .right-sidebar{
              background-color:#fff;
              height:500px;

            }
            .left-sidebar li { 
                padding:10px;
                border-bottom:1px solid #ddd;
                list-style:none; margin-left:-20px
            }     
            .posts_div{
                margin-bottom:10px;
            }
            .posts_div h3{
              margin-top:4px !important;

            }
            #postTest{
                border:none; 
                height:120px;
            }   
            .sidebarli{
            padding-left:30px; 
            padding-right:5px;
            padding-top:8px;
            padding-bottom:8px
            text-align:justify;
            display: block;
            width:100%;
        }
        .sidebarli:hover{
            background-color: #96a5fb3b;
        }  
             
        </style>
            <script src="https://use.fontawesome.com/595a5020bd.js"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                        <a href="{{ url('/profile') }}/{{ Auth::user()->slug }}">Profile</a>
                    @else
                        <a href="{{ route('login')}}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="col-md-12"  id="app" style=" height:500px;">     
                @include('profile.sidebar')
                <div class="col-md-6 col-sm-12 col-xs-12 center-con">
                    @if(Auth::check())
                    <div class="posts_div">
                        <div class="heard_har">@{{msg}}                      
                        </div>             
                        <div style="background-color:#fff">
                            <div class="row">
                                <div class="col-md-2" style="padding-right:0px;padding-left:32px;padding-top:10px">
                                    <img src="{{url('/')}}/public/img/{{Auth::user()->image}}" style="width:60px;height:60px;margin:10px;background:#fff;border:2px solid #e0e0e0" class="img-rounded">                                
                                    <span><b>{{Auth::user()->name}}</b></span>
                                </div>   
                                <div class="col-md-10 pull-right"style="padding-right:10px;padding-left:0px;">
                                    <form method="post" enctyple="multipart/form-data" v-on:submit.prevent="addPost" style="padding-top:10px">
                                        <textarea v-model="content" id="postText" class="form-control"></textarea>
                                        <button type="submit" class="btn btn-sm btn-info pull-right" style="margin:10px" id="postBtn">submit</button>
                                    </form>
                                </div>                
                            </div>
                        </div>                       
                    </div> 
                    @endif 
                    <div class="posts_div">
                        <div class="heard_har">Posts</div>  
                            <div v-for="post in postsdata"> 
                                <div class="col-md-12 "style="background-color:#fff; border:1px solid #e0e0e0;padding-right:0px;margin-right:0px">
                                    <div class="col-md-2"> 
                                        <img :src="'{{Config::get('app.url')}}/public/img/' + post.image" style="width:70px; margin:5px;border-radius:100%">
                                    </div>
                                    <div class="col-md-3">
                                        <h3>@{{post.name}}</h3>
                                        <i class="fa fa-globe"></i>@{{post.city}} in @{{post.country}}
                                        <small><b>Gender:</b>@{{post.gender}}</small><br>
                                        <small>@{{post.created_at}}</small>
                                     </div>
                                     <div class="col-md-6" style="padding-top:30px;padding-left:15px;margin-right:0px;">                     
                                        <p style="color:#333">@{{post.content}}</p>                                  
                                     </div>
                                     <div class="col-md-1"style="padding-left:30px;margin-left:1px;padding-right:0px;margin-right:0px;">
                                            @if(Auth::check())
                                            <a href="#" data-toggle="dropdown" aria-haspopup="true" style="padding-right:0px;"> <img src="{{asset('public/img/settings.png')}}" width="25px" height="25px" >
                                                <div class="dropdown-menu">                                
                                                        <a class="dropdown-item">some action here</a>                                        
                                                        <a class="dropdown-item">some more action</a>   
                                                        <div class="dropdown-divider"></div>                                     
                                                        <a class="dropdown-item" v-if="post.user_id=='{{Auth::user()->id}}'" @click="deletePost(post.id)" style="height:30px;margin-top:-2px;padding-top:0px"><i class="fa fa-trash" style="margin:10px;"></i>delete</a>                                        
                                                </div>
                                             </a>  
                                             @endif 
                                        </div>
                                </div>                                                                 
                            </div>     
                    </div>       
                </div>
                <div class="col-md-3 right-sidebar  hidden-sm hidden-xs">
                    <h3 align="center"> Left Sidebar</h3><hr>
                </div>              
            </div>
        </div>
    </body>
<!-- <script>
    $(document).ready(function(){
        $('#postBtn').hide();
        $("#postText").hover(function() {
            $('#postBtn').show();
            $('#postText').animate({ 'zoom': currentZoom += .5} ,'slow');
        });
    });
</script> -->
</html>
