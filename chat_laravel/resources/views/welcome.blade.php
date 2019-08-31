<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('public/js/app.js') }}" defer></script>
        <script src="{{asset('public/js/moment.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
                top: 12px;
               
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
              background-color:#96a5fb3b;
              height:580px;
              margin-top:20px;

            }
            .left-sidebar li { 
                padding:10px;
                border-bottom:1px solid #ddd;
                list-style:none; 
                margin-left:-20px
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
            .all_post{
                background-color:#fff; padding:8px;
                margin-bottom:10px; border-radius:8px;
                -webkit-box-shadow: 8px 8px 8px -6px #666;
                -moz-box-shadow: 8px 8px 8px -6px #666;
                box-shadow: 8px 8px 8px -6px #666;
            }
            .user_name{
                font-size:18px;
                font-weight:bold; 
                text-transform:capitalize; 
                margin:3px
            }
            .center-con{
                max-height:580px;           
                left:calc(25%);                     
                margin-top:20px;
                padding-left:0px;
             
            }    
            .likeBtn{
              color: #0602bb; 
              font-weight:bold; 
              cursor: pointer;
            }
            #commentBox{
                background-color:#ddd;
                padding:10px;
                width:99%; margin:0 auto;
                background-color:#F6F7F9;
                padding:10px;
                margin-bottom:10px
            }
            #commentBox li {
                 list-style:none; 
                 padding-top:5px;  
                 padding-bottom:0px;           
            }
            .commentHand{
                color:blue
            }
            .commentHand:hover{
                cursor:pointer;                            
            }
            .commet_form{ 
                padding:10px; 
                margin-bottom:10px;
            }
            .upload_wrap{
                position:relative;
                display:inline-block;
                width:100%;
            }
            @media (min-width: 268px) and (max-width: 768px) {
                  .center-con{
                    max-height:580px;
                    position: relative;
                    left:0px;               
                  }
            }
        </style>
         
    </head>
    <body>
        <div class="flex-center position-ref full-height" style="margin-bottom:0px;padding-bottom:0px;">
            @if (Route::has('login'))
                <div class="top-right links" style="position:fixed;">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard(<span style="text-transform:capitalize;color:#3f2184;font-size:15px">{{ucwords(Auth::user()->name)}}</span>)</a>
                        <a href="{{ url('/profile') }}/{{ Auth::user()->slug }}">Profile</a>
                    @else
                        <a href="{{ route('login')}}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="col-md-12"  id="app">   
            @if(Auth::check())    
                @include('profile.sidebar')
                <div class="col-md-6 col-sm-12 col-xs-12 center-con">       
                    <div class="posts_div">
                        <div class="heard_har">@{{msg}}                      
                        </div>             
                        <div style="background-color:#fff">
                            <div class="row">
                                <div class="col-md-2" style="padding-right:0px;padding-left:20px;padding-top:10px">
                                    <img src="{{url('/')}}/public/img/{{Auth::user()->image}}" style="width:60px;height:60px;margin:10px;background:#fff;border:2px solid #e0e0e0" class="img-rounded">                                
                                    <div style="text-align:center;"><span><b>{{Auth::user()->name}}</b></span></div>
                                </div>   
                                <div class="col-md-10 pull-right"style="padding-right:10px;padding-left:2px;">
                                        <div v-if="!image">
                                            <form method="post" enctyple="multipart/form-data" v-on:submit.prevent="addPost" style="padding-top:10px">
                                                <textarea v-model="content" id="postText" class="form-control" placeholder="what's on your mind ?"></textarea>             
                                                <button class="btn btn-sm btn-info pull-right"style="margin:10px;padding-right:10px;" id="Postbtn">Post</button>                                               
                                            </form>        
                                        </div>                  
                                        <div v-if="!image" style="position:relative;display:inline-block;padding-top:5px">      
                                            <div style="border:1px solid #ddd;border-radius:14px;background-color:#efefef;margin:2px;padding-top:3px;padding-left:5px;padding-right:5px;padding-bottom:3px;">     
                                                <i class="fa fa-file-image-o" style="margin:2px" aria-hidden="true"></i><b style="margin:2px"> ImageUpload</b>
                                                <input type="file" @change="onFileChange" style="position:absolute;left:0;top:0;opacity:0">
                                             </div>   
                                        </div>
                                        <div v-else>                                      
                                            <div class="upload_wrap" style="padding-bottom:0px;margin-bottom:0px；">
                                                <textarea v-model="content" id="postText" class="form-control" placeholder="what's on your mind ?"></textarea>
                                                <img :src="image" style="width:100px; margin-top:20px;"/><br>
                                                <b @click="removImg" style="left:110px;position:relative;bottom:100px;cursor:pointer;">X</b>                                   
                                            </div>
                                            <button @click="uploadImg" class="btn btn-sm btn-info pull-right"style="margin:10px;padding-right:10px;">Upload</button>
                                        </div>                       
                                </div>                
                            </div>
                        </div>                       
                    </div> 
                    
                    <div class="posts_div">                   
                        <div v-for="post,key in postsdata"> 
                            <div class="col-md-12 all_post">
                                <div class="modal fade" :id="'EditModal'+post.id" role="dialog">
                                    <div class="modal-dialog" >              
                                    <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Post</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>                                         
                                            </div>
                                            <div class="modal-body" v-for="EditPostykey in EditPostData" style="padding-bottom:0px;margin-bottom:0px；">                                 
                                                <textarea class="form-control" v-model="updatedContent">@{{post.content}}</textarea>                                                                                                
                                                <div style="position:relative;display:inline-block;padding-top:5px">      
                                                    <div style="border:1px solid #ddd;border-radius:14px;background-color:#efefef;margin:2px;padding-top:3px;padding-left:5px;padding-right:5px;padding-bottom:3px;">     
                                                        <i class="fa fa-file-image-o" style="margin:2px" aria-hidden="true"></i><b style="margin:2px"> ImageUpload</b>
                                                        <input type="file" @change="onFileChangeEdit" style="position:absolute;left:0;top:0;opacity:0">
                                                    </div>   
                                                </div>
                                                <div v-if="EditPostykey.image!=null">
                                                    <div v-if="!(EditBoo)" >                                                         
                                                        <img :src="'{{Config::get('app.url')}}/public/img/' + EditPostykey.image"  style="width:100px; margin-top:20px;"/>
                                                        <b @click="removEditImg" style="position:relative;bottom:40px;left:5px;cursor:pointer;">X</b> 
                                                    </div>
                                                    <div v-else>                     
                                                        <img :src="EditPostykey.image" style="width:100px; margin-top:20px;"/>
                                                        <b @click="removEditImg" style="position:relative;bottom:40px;left:5px;cursor:pointer;">X</b> 
                                                    </div>    
                                                </div>       
                                                <button @click="updateEditImg(EditPostykey.id)" class="btn btn-sm btn-info pull-right"style="margin:10px;padding-right:10px;">Post</button>                                                                                                          
                                            </div>        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 pull-left" style="padding-left:8px;"> 
                                    <img :src="'{{Config::get('app.url')}}/public/img/' + post.user.image" style="width:50px; border-radius:100%">
                                </div>
                                <div class="col-md-10" style="margin-left:10px;">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <p> 
                                                <a :href="'{{url('profile')}}/' +post.user.slug" class="user_name"> @{{post.user.name}}</a> <br>
                                                <span style="color:#AAADB3">  @{{ post.created_at | Newtime}}
                                                <i class="fa fa-globe"></i></span>
                                            </p>
                                        </div>
                                        <div class="col-md-1 pull-right"style="padding-left:40px;padding-right:0px;margin-right:0px;">
                                            @if(Auth::check())                              
                                                <a href="#" data-toggle="dropdown" aria-haspopup="true" style="padding-right:0px;"> <img src="{{asset('public/img/settings.png')}}" width="25px" height="25px" >
                                                    <div class="dropdown-menu">                                
                                                            <a class="dropdown-item" v-if="post.user_id=='{{Auth::user()->id}}'" data-toggle="modal" :data-target="'#EditModal'+post.id" @click="openModel(post.id)">Edit Post</a>                                        
                                                            <a class="dropdown-item">some more action</a>   
                                                            <div class="dropdown-divider"></div>                                     
                                                            <a class="dropdown-item" v-if="post.user_id=='{{Auth::user()->id}}'" @click="deletePost(post.id)" style="height:30px;margin-top:-2px;padding-top:0px"><i class="fa fa-trash" style="margin:10px;"></i>delete</a>                                                                       
                                                    </div>                                                                
                                                </a>                
                                            @endif 
                                        </div>                                                      
                                    </div>                                    
                                </div>                                                                                
                                <p class="col-md-12" v-if="post.content"  style="color:#000; margin-top:15px; font-family:inherit"> @{{post.content}}<br></p>  
                                <img :src="'{{Config::get('app.url')}}/public/img/' + post.image" v-if="post.image"style="margin:10px;width:150px;padding-left:5px">
                                <div style="padding:10px; border-top:1px solid #ddd" class="col-md-12">                                                                                                     
                                    <div class="col-md-4">
                                        <p v-if="post.likes.length!=0" @click="likePost(post.id)">
                                            <i class="fa fa-thumbs-up" style="color:blue"></i> liked by <b style="color:blue"> @{{post.likes.length}} </b>users
                                        </p>            
                                        <p v-else @click="likePost(post.id)">
                                            <i class="fa fa-thumbs-up"  style="color:blue"></i> no one like
                                        </p>                                                                         
                                    </div>
                                    <div class="col-md-4" id="commentsDiv">
                                        <p class="commentHand" @click="commentcl(post,key)">Comments <b>(@{{post.comments.length}})</b></p>
                                    </div>                              
                                </div>
                            </div>       
                            <div id="commentBox" v-if="commentSeen==post.id && countseen%2==1" style="padding-bottom:0px;">                            
                                <div v-for="commentkey in post.comments">
                                    <div v-if="commentkey.user_id=={{Auth::user()->id}}">
                                        <div class="col-md-12" style="padding-left:2px;">
                                            <div class="col-md-1"  style="padding-left:0px;-right:7px;margin-left:2px;margin-right:7px;"> 
                                                <img src="{{url('/')}}/public/img/{{Auth::user()->image}}" style="width:50px;height:50px;margin:5px;background:#fff;border:2px solid #e0e0e0" class="img-rounded">                                
                                            </div>
                                            <div class="col-md-10">
                                                <a href="{{url('/profile')}}/{{Auth::user()->slug}}"><b><strong>{{Auth::user()->name}} </strong></b></a>
                                                @{{commentkey.comment}}<br>
                                                <span style="font-size:13px;">@{{commentkey.created_at | Newtime}} </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-else>  
                                        <div class="col-md-12" style="padding-left:2px;">
                                            <div class="col-md-1" style="padding-left:0px;padding-right:7px;margin-left:2px;margin-right:7px;">  
                                                <img :src="'{{url('/')}}/public/img/'+commentkey.user.image" style="width:50px;height:50px;margin:5px;background:#fff;border:2px solid #e0e0e0" class="img-rounded">                                          
                                            </div>
                                            <div class="col-md-10">  
                                                <a :href="'{{url('/profile/')}}/'+commentkey.user.slug"><b><strong>@{{commentkey.user.name}}</strong> </b></a>             
                                                @{{commentkey.comment}}<br>
                                                <span style="font-size:13px;">@{{commentkey.created_at | Newtime}} </span>
                                            </div>
                                        </div>   
                                    </div>                                                                          
                                </div>
                                <div class="comment_form" style="padding-bottom:0px;margin-bottom:0px;">
                                    <textarea class="form-control" v-model="commentData[key]"style="width:590px;height:80px"></textarea>                       
                                    <div style="text-align:right;padding-bottom:0px;">
                                        <button class="btn btn-primary"@click="addComment(post,key)" style="margin:5px">Reply</button>  
                                    </div>                       
                                </div>
                            </div>                                                                            
                        </div>                         
                    </div>     
                </div>       
                <div class="col-md-3 right-sidebar  hidden-sm hidden-xs" style="position:fixed; right:10px">
                    <h3 align="center"> Right Sidebar</h3><hr>
                </div> 
            @else
            <div class="content">
                <div class="title m-b-md">
                        Chat Laravel
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
             
            @endif             
            </div>
        </div>
    </body>
<script>
$(document).ready(function(){
$('#Postbtn').hide();
  $("#postText").hover(function() {
    $('#Postbtn').show();
 });
});
   
</script>
</html>
