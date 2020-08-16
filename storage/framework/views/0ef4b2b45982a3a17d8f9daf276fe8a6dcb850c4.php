<?php $__env->startSection('main'); ?>
<div class="container mt-page ">
    <div class="row text-center justify-content-center">
        <div class="col-10 col-md-6">
            <div class="formContainer1 forms">
                <div class="panels">
                    <div class="leftPanel emptyState">
                        <i class="fa fa-user "></i>
                    </div>
                    <div class="rightPanel">
                        <div class="titleContainer" style="margin-bottom: 20px">
                            <h2 class="title dark">Register To RadioAvin</h2>
                            <?php if(count($errors)): ?>
                            <h6 class="text-danger">
                                <?php echo e($errors->first()); ?>

                            </h6>
                            <?php endif; ?>
                        </div>
                        <div id="">
                            <div id="">
                                <form id="register" class="parsley-validate" action="<?php echo e(route('S.Register')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" name="email" id="email" placeholder="*Email">
                                    <input type="text" name="mobile" id="mobile" placeholder="Mobile">
                                    <input type="text" name="password" id="password" placeholder="*Password">
                                    <input type="text" name="cpassword" id="cpassword" placeholder="*Confirm Password">
                                    <div style="margin-top: 10px">
                                        <button type="submit" class="submit-button">Register</button>
                                        <div class="alert-box alert form_error twelve columns" style="display: none">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\radio\resources\views/Front/register.blade.php ENDPATH**/ ?>