<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <script src="<?php echo e(asset('public/js/app.js')); ?>" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="stylesheet" href="<?php echo e(asset('public/js/bootstrap.min.js')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="<?php echo e(asset('public/css/app.css')); ?>" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #d1a7ff40;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .top_bar{
              position:relative; width:99%; top:0; padding:5px; margin:0 5
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
                font-weight: 600;
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
              height:550px;

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
             
        </style>
            <script src="https://use.fontawesome.com/595a5020bd.js"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Dashboard</a>
                        <a href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->slug); ?>">Profile</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="col-md-12"  id="app">     
                <div class="col-md-2 left-sidebar  hidden-sm hidden-xs">
                    <h3 align="center"> Left Sidebar</h3><hr>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12 center-con">
                    <?php if(Auth::check()): ?>
                    <div class="posts_div">
                        <div class="heard_har">{{msg}}                      
                        </div>             
                        <div style="background-color:#fff">
                            <div class="row">
                                <div class="col-md-2" style="padding-right:0px;padding-left:32px;padding-top:10px">
                                    <img src="<?php echo e(url('/')); ?>/public/img/<?php echo e(Auth::user()->image); ?>" style="width:60px;height:60px;margin:10px;background:#fff;border:2px solid #e0e0e0" class="img-rounded">                                
                                    <span><b><?php echo e(Auth::user()->name); ?></b></span>
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
                    <?php endif; ?> 
                    <div class="posts_div">
                        <div class="heard_har">Posts</div>  
                            <div v-for="post in postsdata"> 
                                <div class="col-md-12 col-sm-12 col-xs-12"style="background-color:#fff; border:1px solid #e0e0e0">
                                    <div class="col-md-2 col-sm-2 col-xs-2 pull-left"> 
                                        <img :src="'<?php echo e(Config::get('app.url')); ?>/public/img/' + post.image" style="width:70px; margin:5px;border-radius:100%">
                                    </div>
                                    <div class="col-md-3 col-sm-7 col-xs-7 pull-left">
                                        <h3>{{post.name}}</h3>
                                        <i class="fa fa-globe"></i>{{post.city}} in {{post.country}}
                                        <small><b>Gender:</b>{{post.gender}}</small><br>
                                        <small>{{post.created_at}}</small>
                                     </div>
                                     <div class="col-md-7  col-sm-11 col-xs-11 pull-right" style="padding-top:20px">
                                        <p style="color:#333">{{post.content}}</p>
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

<script>
    $(document).ready(function(){
        $('#postBtn').hide();
        $("#postText").hover(function() {
            $('#postBtn').show();
            $('#postText').animate({ 'zoom': currentZoom += .5} ,'slow');
        });
    });
</script>
</html>
<?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/welcome.blade.php ENDPATH**/ ?>