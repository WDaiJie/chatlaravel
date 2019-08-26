<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new Job</h4>
                        <p class="category">sub heading here</p>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <?php echo e(Form::open(['url'=>'company/addJobSubmit'])); ?>

                            <?php echo e(Form::label('Job Title')); ?>

                            <?php echo e(Form::text('job_title')); ?><br>
                            <?php echo e(Form::label('skills')); ?><br>   
                            <?php echo e(Form::label('HTML')); ?>

                            <?php echo e(Form::checkbox('skills[]','HTML')); ?>

                            <?php echo e(Form::label('CSS')); ?>

                            <?php echo e(Form::checkbox('skills[]','CSS')); ?>

                            <?php echo e(Form::label('PHP')); ?>

                            <?php echo e(Form::checkbox('skills[]','PHP')); ?>

                            <br>
                            <?php echo e(Form::label('Requirements')); ?>

                            <?php echo e(Form::textarea('Requirements')); ?><br>
                            <?php echo e(Form::label('contact/conpamy Email')); ?>

                            <?php echo e(Form::text('contact_email')); ?><br>
                            <?php echo e(Form::submit('add job')); ?>

                            <?php echo e(Form::close()); ?>

                        </div>
                        <div class="footer">
                            <div class="legend">
                            </div>
                            <hr>
                            <div class="stats">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Heading here</h4>
                        <p class="category">sub heading here</p>
                    </div>
                    <div class="content">
                        <div class="footer">
                            <div class="legend">
                            </div>
                            <hr>
                            <div class="stats">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('company.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/company/addJob.blade.php ENDPATH**/ ?>