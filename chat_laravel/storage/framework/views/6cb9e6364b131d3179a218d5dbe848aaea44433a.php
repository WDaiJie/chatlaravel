<style>
    .sidebarli{
        padding-left:30px; 
        padding-right:5px;
        padding-top:8px;
        padding-bottom:8px
        text-align:justify;
        display: block;
        width: 100%;
    }
    .sidebarli:hover{
        background-color: #96a5fb3b;
    }   
</style>
<div class="col-md-3">
            <div class="card">
                <div class="card-header">Sidebar Link</div>
                <?php if(Auth::check()): ?>
                    <div class="sidebarli"> 
                        <a href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->slug); ?>"><img src="<?php echo e(Config::get('app.url')); ?>/public/img/<?php echo e(Auth::user()->image); ?>"width="40" style="margin:10px"/><?php echo e(Auth::user()->name); ?></a>
                    </div>
                    <div class="sidebarli"> 
                        <a href="<?php echo e(url('/')); ?>"> <img src="<?php echo e(Config::get('app.url')); ?>/public/img/newsfeed.png"width="40" style="margin:10px"/>News Feed</a>
                    </div>
                    <div class="sidebarli"> 
                        <a href="<?php echo e(url('/friends')); ?>"> <img src="<?php echo e(Config::get('app.url')); ?>/public/img/friends.png"width="40" style="margin:10px"/> Friends </a>
                     </div>
                     <div class="sidebarli"> 
                        <a href="<?php echo e(url('/messages')); ?>"> <img src="<?php echo e(Config::get('app.url')); ?>/public/img/message.png"width="40" style="margin:10px"/>Messages</a>
                    </div>
                     <div class="sidebarli"> 
                        <a href="<?php echo e(url('/findfriends')); ?>"> <img src="<?php echo e(Config::get('app.url')); ?>/public/img/findfriend.png"width="40" style="margin:10px"/>Find Friends</a>
                     </div>
                     <div class="sidebarli"> 
                        <a href="<?php echo e(url('/jobs')); ?>"> <img src="<?php echo e(Config::get('app.url')); ?>/public/img/findjob.png"width="40" style="margin:10px"/>Find Jobs</a>
                     </div>
                   <?php endif; ?>
            </div>
</div><?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/profile/sidebar.blade.php ENDPATH**/ ?>