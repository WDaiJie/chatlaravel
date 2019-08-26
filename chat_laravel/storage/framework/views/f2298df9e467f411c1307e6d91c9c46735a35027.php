<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php use App\Http\Controllers\ProfileController; ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <!-- Scripts -->
    <!-- <script src="<?php echo e(asset('public/js/app.js')); ?>" defer></script> -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://use.fontawesome.com/595a5020bd.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('public/js/bootstrap.min.js')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>">
   

    <!-- Styles -->
    <link href="<?php echo e(asset('public/css/app.css')); ?>" rel="stylesheet">
</head>
<body>
<style>
.dropdown-item:hover, .dropdown-item:focus {
    color: #16181b;
    text-decoration: none;
    background-color: #ffffff;
}
</style>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button id="nav-toggle-button" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                         <?php if(auth()->guard()->check()): ?>                         
                            <li><a href="<?php echo e(url('/findfriends')); ?>" style="padding:5px 15px; border-radius:5px; margin:0px">Findfriends</a></li>
                            <li><a href="<?php echo e(url('/requestfriends')); ?>" style="border-radius:5px; margin:0px">My Requests<span style="color:rgb(251, 6, 6); font-weight:bold;
                                       font-size:16px">(<?php echo ProfileController::friendsrequestcount();?>)</span></a></li>                             
                        <?php endif; ?>  
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a href="<?php echo e(url('/friends')); ?>"style="padding:5px 20px; border-radius:5px; margin:0px"><img src="<?php echo e(asset('public/img/friends.png')); ?>" width="40px" height="40px"></a>
                            </li>      
                            <li class="nav-item dropdown">
                                <a href="<?php echo e(url('/messages')); ?>"style="padding:5px 20px; border-radius:5px; margin:0px"><img src="<?php echo e(asset('public/img/message.png')); ?>" width="40px" height="40px"></a>
                            </li>                   
                            <li class="nav-item dropdown">
                                 <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">               
                                    <img src="<?php echo e(asset('public/img/notification.png')); ?>" width="40px" height="40px" ><span class="badge" style="background:red; position: relative; top:-2px; left:-20px;">
                                    <?php echo ProfileController::notifications_acceptfriendcount()?></span>
                                </a>      
                                <?php $notes_friends=ProfileController::noticefriends_data()?>           
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="top:50px;width:375px;padding-top:0; padding-bottom:0.5;">    
                                       <p style="margin:0;padding-left:2px;border-bottom: 0.5px solid">Your notice</p>
                                    <?php $__currentLoopData = $notes_friends['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notekey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                       
                                        <a href="<?php echo e(url('/notifications_friends')); ?>/<?php echo e($notekey->id); ?>" class="dropdown-item"  style="padding-right:0;padding-left:0;padding-top:0; padding-bottom:0;">  
                                            <?php if($notekey->status==1): ?>
                                            <div  class="col-md-12"  style="background:rgb(203, 206, 245);padding:1px">         
                                            <?php else: ?>
                                            <div   class="col-md-12" style="padding:1px">
                               
                                                <?php endif; ?>
                                                <div class="row" style="top:50px;width:375px; margin:0px">
                                                    <div class="col-md-2" style="padding-left:0px">
                                                        <img src="<?php echo e(url('/')); ?>/public/img/<?php echo e($notekey->image); ?>" style="width:60px;height:60px;padding:1px;background:#fff;border:2px solid #eee" class="img-rounded">   
                                                    </div>
                                                    <div class="col-md-10">
                                                        <b style="color:rgb(8, 187, 8);font-size:90%"><?php echo e(ucwords($notekey->name)); ?> </b>
                                                        <span style="font-size:90%"><?php echo e($notekey->note); ?></span><br>
                                                        <small style="color:#90949c"><img src="<?php echo e(asset('public/img/friends.png')); ?>" width="18px" height="18px">
                                                        <?php echo e(date('F j ,Y',strtotime($notekey->created_at))); ?> at  <?php echo e(date('g:i a',strtotime($notekey->created_at))); ?></small>
                                                    </div>                                       
                                                </div>   
                                                                              
                                        </a> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>                                  
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">     
                                    <img src="<?php echo e(url('/')); ?>/public/img/<?php echo e(Auth::user()->image); ?>" width ="45px" height="45px" class="rounded-circle"/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="top:50px;width:330px;position:absolute">
                                    <a class="dropdown-item" href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->slug); ?>"><?php echo e(__('Profile')); ?></a>   
                                    <a class="dropdown-item" href="<?php echo e(url('editProfile')); ?>"><?php echo e(__('Edit Profile')); ?></a>                    
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                           
                            
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="row"style="padding-top:0px">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <!-- <script src="../chat_laravel/public/js/profile.js"></script> -->
    <script src="<?php echo e(asset('public/js/profile.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/profile/master.blade.php ENDPATH**/ ?>