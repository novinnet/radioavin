<div class="music-cart-h ">
    <a href="./single-music.html">
        <div class="music-cart">
            <img src="<?php echo e(asset(unserialize($item->poster)['resize'])); ?>" />

            <div class="img-cover"></div>

        </div>
        <div class="songInfo center">
            <span class="artist" title="<?php echo e($item->singers()); ?>"><?php echo e($item->singers()); ?></span>
            <span class="song" title="<?php echo e($item->title); ?>"><?php echo e($item->title); ?></span>

        </div>
    </a>
    <a href="#" onclick="call(event)" id="<?php echo e($item->id); ?>" data-id="<?php echo e($item->id); ?>" data-type="music" class="add-favorite plus">
        +
    </a>
</div><?php /**PATH C:\xampp\htdocs\radio\resources\views/components/list-view.blade.php ENDPATH**/ ?>