<?php $__env->startSection('content'); ?>
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(url('/home ')); ?>">Home</a></li>
        <li class="breadcrumb-item" ><a href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->slug); ?>">Profile</a></li>
        <li class="breadcrumb-item" ><a href="<?php echo e(url('/editProfile')); ?>">Edit Profile</a></li>
        <li class="breadcrumb-item" ><a href="#">Find Friends</a></li>
   </ol>
    <div class="row justify-content-center">
        <?php echo $__env->make('profile.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><?php echo e(ucwords(Auth::user()->name)); ?></div>
                     <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                            <div class="col-sm-12 col-md-12">
                                <?php $__currentLoopData = $allusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frindkey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row" style="border-bottom: 1px solid rgba(11, 4, 76, 0.7);margin-bottom: 18px;">
                                        <div class="col-md-3 pull-left">    
                                                <!-- <h3 align="center"><?php echo e(ucwords($frindkey->name)); ?></h3> -->
                                             <a href=""><img src="<?php echo e(url('/')); ?>/public/img/<?php echo e($frindkey->image); ?>" width ="95px" height="95px" class="image-circle"/><br></a>
                                        </div>     
                                        <div class="col-md-6 pull-left"> <h3 style="margin:0px;">
                                            <h3 style="margin:0px;"><a href="<?php echo e(url('/profile')); ?>/<?php echo e($frindkey->slug); ?>"><?php echo e(ucwords($frindkey->name)); ?></a></h3>
                                                <i class="fa fa-globe"></i> 
                                                    <?php if(($frindkey->city)&&($frindkey->country)): ?><?php echo e($frindkey->city); ?> in <?php echo e($frindkey->country); ?><br><?php echo e($frindkey->about); ?>

                                                    <?php else: ?> Not applicable.
                                                    <?php endif; ?>                                                                                        
                                        </div>                    
                                        <div class="col-md-3 pull-right">
                                        <?php
                                            $check=Auth::user()->checkfriendrequest($frindkey->user_id);                            
                                        ?>      
                                        <?php if($check==1): ?> <p>Request Already Sent</p>
                                        <?php elseif($check==2): ?> <p>Request Already Be Sent by other user</p>
                                        <?php else: ?> <p><a href="<?php echo e(url('/')); ?>/addfriends/<?php echo e($frindkey->id); ?>"class="btn btn-info btn-sm">Add to Friend</a></p>                                     
                                        <?php endif; ?>
                                        </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>                                                                           
                        </div>
                </div>
            </div>
         </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/profile/frindfriends.blade.php ENDPATH**/ ?>