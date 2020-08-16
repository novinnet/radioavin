<?php if(isset($playlists) && count($playlists)): ?>
    <div class="container mt-2">
    <div class="row  justify-content-between">
        <div class="col">
            <div class="sectionTitle">
                <h2 class="title">Playlists</h2>
            </div>
        </div>
        <div class="col text-right">
            <a class="viewMore button primaryButton" href="#">View More</a>
        </div>
    </div>
    <div class="">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $playlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide text-center mb-lg-5">
                    <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                        <a href="#">
                            <div class="music-cart">
                                <?php if(isset($playlist->image)): ?>
                                 <img src="<?php echo e(asset($playlist->image)); ?>" />
                                <?php else: ?> 
                                <img src="<?php echo e(asset('frontend/images/remix.jpg')); ?>" />
                                <?php endif; ?>
                                <div class="img-cover"></div>
                            </div>
                            <div class="songInfo center">
                                <span class="artist" title="<?php echo e($playlist->name); ?>"><?php echo e($playlist->name); ?></span>
                                
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <!-- Add Scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>

    </div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\radio\resources\views/Includes/Front/PlayLists.blade.php ENDPATH**/ ?>