<?php $__env->startSection('content'); ?>
<style>
    table{
        width: 100%;
    }
    table td{
        padding:10px;
        border-bottom:1px solid #ddd;
    }
    table th{
        padding:10px;
        border:1px solid #ddd;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Jobs submit by you</h4>
                        <p class="category">sub heading here</p>
                    </div>
                    <div class="content">
                        <div class="form-group">
                        </div>
                        <div class="footer">
                            <div class="legend">
                                <table>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Skills</th>
                                        <th>Contact Email</th>
                                        <th>Dteail</th>
                                    </tr>    
                                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobkey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                  
                                        <tr>
                                            <td><?php echo e($jobkey->job_title); ?></td>
                                            <td><?php echo e($jobkey->skills); ?></td>
                                            <td><?php echo e($jobkey->contact_email); ?></td>
                                            <td><a href=" ">view</a></td>
                                        </tr>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                            <hr>
                            <div class="stats">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
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
<?php echo $__env->make('company.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/company/jobs.blade.php ENDPATH**/ ?>