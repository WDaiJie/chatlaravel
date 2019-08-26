<?php $__env->startSection('content'); ?>
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(url('/home ')); ?>">Home</a></li>
        <li class="breadcrumb-item" ><a href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->slug); ?>">Profile</a></li>
        <li class="breadcrumb-item" ><a href="<?php echo e(url('/editProfile')); ?>">Edit Profile</a></li>
        <li class="breadcrumb-item" ><a href="#">Change Image</a></li>
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
                        <div class="col-sm-6 col-md-12">  
                            <div class="thumbnail">
                                <h3>Update Your Profile</h3> 
                                <img src="<?php echo e(url('/')); ?>/public/img/<?php echo e(Auth::user()->image); ?>" width ="135px" height="135px" class="img-circle" /><hr>
                                <div class="caption">                                                                       
                                    <form action="<?php echo e(url('/')); ?>/uploadPhoto" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <p><input type="file" name="pic" class="form-control"></p>
                                        <input type="submit" class="btn btn-success" name="btn">
                                    </form> 
                                </div>                                  
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/profile/pic.blade.php ENDPATH**/ ?>