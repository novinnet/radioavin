<div class="col-md-4">
    
    
    
    <div class="row">
        <div class="form-group col-md-12">
            <label for=""> Singer: </label>
            <select name="singers[]" class="js-example-basic-single" multiple dir="rtl" required>
                <?php $__currentLoopData = $singers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($singer->id); ?>"
                    <?php echo e(isset($post) && $post->artists->pluck('id')->contains($singer->id) ? 'selected' : ''); ?>>
                    <?php echo e($singer->fullname); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

     
   <?php /**PATH C:\xampp\htdocs\radio\resources\views/Includes/Panel/VideoSideForm.blade.php ENDPATH**/ ?>