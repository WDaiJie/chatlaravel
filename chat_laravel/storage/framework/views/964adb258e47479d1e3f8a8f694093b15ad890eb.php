<?php $__env->startSection('content'); ?>
<!-- <?php echo e($data[0]->city); ?> -->
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(url('/home ')); ?>">Home</a></li>
        <li class="breadcrumb-item" ><a href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->slug); ?>">Profile</a></li>
        <li class="breadcrumb-item" ><a href="<?php echo e(url('/editProfile')); ?>">Edit Profile</a></li>
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
                                        <h2 align="center"><?php echo e(ucwords(Auth::user()->name)); ?></h2>
                                        <img src="<?php echo e(url('/')); ?>/public/img/<?php echo e(Auth::user()->image); ?>" width ="120px" height="120px" class="img-circle" /><br>
                                    <div class="caption">
                                        <p align="center">
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($key->city); ?> in <?php echo e($key->country); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </p>
                                        <p align="center">
                                            <a href="<?php echo e(url('/')); ?>/changePhoto" class="btn btn-primary" role="button">Change Image</a>                                  
                                        </p>
                                    </div>
                                </div>
                            </div>                                           
                            <div class="col-sm-6 col-md-12">    
                                 <span class="label label-darkbu">Update Profile</span>
                                 <br>
                                 <form action="<?php echo e(url('/updateProfile')); ?>" method="post">
                                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <div class="col-md-6">
                                        
                                            <span id="basic-addon1">City Name</span>
                                            <input type="text" class="form-control" placeholder="City Name" name="city">
                                  
                                        <br>
                                      
                                            <span id="basic-addon1">Country Name</span>
                                            <input type="text" class="form-control" placeholder="Country Name" name="country">
                                      
                                        
                                    
                                    </div>     
                                    <div class="col-md-6">
                                     
                                            <span id="basic-addon1">About</span>
                                            <textarea type="text" class="form-control" rows="4" cols="10" name="About"></textarea>
                                        
                                        <br>
                                        <div class="input-group">
                                            <input type="submit" class="btn btn-primary pull-right">
                                        </div>
                                    </div>
                                </form >
                                

                            </div>                                  
                        </div>
                </div>
            </div>
         </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/profile/editProfile.blade.php ENDPATH**/ ?>