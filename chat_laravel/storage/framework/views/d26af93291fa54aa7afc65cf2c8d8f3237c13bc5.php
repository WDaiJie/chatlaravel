<?php $__env->startSection('content'); ?> 
<div class="container">
  <ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="<?php echo e(url('/home')); ?>">Home</a></li>
    <li class="breadcrumb-item" ><a href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->slug); ?>">Profile</a></li>
  </ol>
    <div class="row justify-content-center">
      <?php echo $__env->make('profile.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     
       <?php $__currentLoopData = $userData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datakey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><?php echo e(ucwords($datakey->name)); ?></div>
                     <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                            <div class="col-sm-6 col-md-12">
                                <div class="thumbnail">
                                <h2 align="center"><?php echo e(ucwords($datakey->name)); ?></h2>
                                    <img src="<?php echo e(url('/')); ?>/public/img/<?php echo e($datakey->image); ?>" width ="120px" height="120px" class="img-circle" /><br>
                                    <div class="caption">
                                    <p align="center">                                       
                                            <?php echo e($datakey->city); ?> in <?php echo e($datakey->country); ?>

                                    </p>
                                        <?php if(($datakey->user_id)==(Auth::user()->id)): ?>
                                        <p align="center">
                                            <a href="<?php echo e(url('/editProfile')); ?>" class="btn btn-primary" role="button">Edit Profile</a>                                  
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <h5 class=""> <span class="label label-darkbu">About</span></h5>
                                    <p>                                  
                                        <?php echo e($datakey->about); ?>

                                    </p>
                            </div>
                    </div>
            </div>            
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/profile/index.blade.php ENDPATH**/ ?>