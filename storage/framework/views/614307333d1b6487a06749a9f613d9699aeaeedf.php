
    <div class="col-6 col-md-2">
    <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-2">
    <a href="<?php echo e($video->url()); ?>">
            <div class="music-cart">
                <?php if(isset($video->poster) && !is_null($video->poster) && $video->poster[1]): ?>
                <img src="<?php echo e(asset($video->poster[1])); ?>" />
                <?php else: ?>
                <img src="<?php echo e(asset('frontend/images/remix.jpg')); ?>" />
                <?php endif; ?>

                <div class="img-cover"></div>
            </div>
            <div class="songInfo center">
                <span class="artist" title="<?php echo e($video->singers()); ?>"><?php echo e($video->singers()); ?></span>
                <span class="song" title="<?php echo e($video->title); ?>"><?php echo e($video->title); ?></span>
            </div>
        </a>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\radio\resources\views/components/video-box.blade.php ENDPATH**/ ?>