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
                <div class="card-header"><?php echo e(ucwords(Auth::user()->name)); ?>, your notice</div>
                     <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                            <div class="col-sm-12 col-md-12">
                            <?php if(session()->has('data')): ?>
                                <p class="alert alert-success"><?php echo (session()->get('data')); ?></p>                                                  
                            <?php endif; ?>
                                <?php $__currentLoopData = $note_friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row" style="border-bottom: 1px solid rgba(11, 4, 76, 0.7);margin-bottom: 10px; display:block;">
                                    <ul>
                                         <li>                                            
                                             <p><a href="<?php echo e(url('/profile')); ?>/<?php echo e($key->slug); ?>" style="font-weight:bold; color:green">
                                                <?php echo e($key->name); ?></a><br><?php echo e($key->note); ?></p>                    
                                            </i>    
                                        </li>     

                                    </ul>
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

<?php echo $__env->make('profile.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/profile/notifcationsfriends.blade.php ENDPATH**/ ?>