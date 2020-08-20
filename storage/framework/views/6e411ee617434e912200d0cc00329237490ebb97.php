<?php if(isset($sliders) && count($sliders) > 6): ?>
    <div class="container mt-page">

    <div id="touchSlider5" class="music-page-slider">
        <ul>
           <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <img src="<?php echo e(asset($slider->poster[2])); ?>" style="width: 100%;" />
                <div class="songInfo inline">
                    <span class="date"><?php echo e($slider->singers()); ?> - </span> 
                    <span class="title" title="<?php echo e($slider->title); ?>"><?php echo e($slider->title); ?></span>
                </div>
            </li>
            
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\radio\resources\views/Includes/Front/TopSlider.blade.php ENDPATH**/ ?>