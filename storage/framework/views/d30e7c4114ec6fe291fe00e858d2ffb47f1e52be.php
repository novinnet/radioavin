

<div class="container">
    <div class="row mt-5">
        <div class="form-group col-md-6">

            <select name="song" class="js-example-basic-single col-md-12" dir="rtl">
                <option value="search singer">search singer</option>
                <?php $__currentLoopData = \App\Artist::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($artist->id); ?>"
                    <?php echo e(isset($playlist) && $playlist->tracks()->pluck('id')->contains($artist->id) ? 'selected' : ''); ?>>
                    <?php echo e($artist->fullname); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
           
        </div>
        <div class="form-group col-md-6">
             <select name="song" class="js-example-basic-single col-md-12" dir="rtl">
                <option value="search song">search song</option>
                <?php $__currentLoopData = \App\Post::where('type','music')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($song->id); ?>"
                    <?php echo e(isset($playlist) && $playlist->tracks()->pluck('id')->contains($song->id) ? 'selected' : ''); ?>>
                    <?php echo e($song->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
     
</div><?php /**PATH C:\xampp\htdocs\radio\resources\views/Includes/Front/Alfabet.blade.php ENDPATH**/ ?>