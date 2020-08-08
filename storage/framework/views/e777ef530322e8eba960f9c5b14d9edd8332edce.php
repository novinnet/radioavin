<div class="col-md-4 right-side">
    <div class="cat">
        <div class="">
            <h6 class="">دسته بندی: </h6>
            <div>
                <div class="d-flex">
                    <input type="text" class="form-control mb-2" name="" id="pprev" placeholder="نام">
                    <input type="text" class="form-control mb-2" name="" id="prev" placeholder="نام لاتین">
                </div>
            <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addCategory(event,'<?php echo e(route('Panel.AddCatAjax')); ?>')">افزودن</a>
            </div>
        </div>
        <div class="cat-wrapper card pr-2" style=" min-height:50px;max-height: 200px;overflow-y: scroll;">
            <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="custom-control custom-checkbox custom-control-inline ">
                <input type="checkbox" id="cat-<?php echo e($key+1); ?>" name="categories[]" value="<?php echo e($item->latin); ?>"
                    class="custom-control-input scat" <?php if(isset($post)): ?>
                    <?php echo e($post->categories->pluck('id')->contains($item->id) ? 'checked' : ''); ?> <?php endif; ?>>
                <label class="custom-control-label" for="cat-<?php echo e($key+1); ?>"><?php echo e($item->name); ?></label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="writers-wrapper mt-3">
        <h6 class="">نویسنده</h6>
        <input type="text" class="form-control mb-2" name="" id="" placeholder="جدید">
        <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addWriter(event)">افزودن</a>
        <div class="writers-list card pr-2" style="min-height:50px;max-height: 200px;overflow-y: scroll;">
            <?php $__currentLoopData = \App\Writer::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $writer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" id="ac-<?php echo e($key+1); ?>" name="writers[]" value="<?php echo e($writer->name); ?>" <?php if(isset($post)): ?>
                    <?php echo e($post->writers->pluck('id')->contains($writer->id) ? 'checked' : ''); ?> <?php endif; ?>
                    class="custom-control-input">
                <label class="custom-control-label" for="ac-<?php echo e($key+1); ?>">
                    <?php echo e($writer->name); ?></label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
    <div class="cast-wrapper mt-3">
        <h6 class="">بازیگران</h6>
        <input type="text" class="form-control mb-2" name="" id="" placeholder="جدید" oninput="showActor(event)">
        <ul class="ul-list" style="display: none">
            <li><a href="#" onclick="addToInput(event)">ddd</a></li>
        </ul>
        <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addActor(event)">افزودن</a>
        <div class="actors-list card pr-2" style="min-height:50px;max-height: 200px;overflow-y: scroll;">
            <?php if(isset($post)): ?>
            <?php $__currentLoopData = $post->actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" id="actor-<?php echo e($key+1); ?>" name="actors[]" value="<?php echo e($item->name); ?>"
                    class="custom-control-input" checked>
                <label class="custom-control-label" for="actor-<?php echo e($key+1); ?>">
                    <?php echo e($item->name); ?></label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="cast-wrapper mt-3">
        <h6 class="">کارگردان</h6>
        <input type="text" class="form-control mb-2" name="" id="" placeholder="جدید" oninput="showDirector(event)">
        <ul class="ul-list" style="display: none">
            <li><a href="#" onclick="addToInput(event)">ddd</a></li>
        </ul>
        <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addDirector(event)">افزودن</a>
        <div class="directors-list card pr-2" style="min-height:50px;max-height: 200px;overflow-y: scroll;">
            <?php if(isset($post)): ?>
            <?php $__currentLoopData = $post->directors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" id="director-<?php echo e($key+1); ?>" name="directors[]" value="<?php echo e($item->name); ?>"
                    class="custom-control-input" checked>
                <label class="custom-control-label" for="director-<?php echo e($key+1); ?>">
                    <?php echo e($item->name); ?></label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="languages-wrapper mt-3">
        <h6 class="">زبان</h6>
        <input type="text" class="form-control mb-2" name="" id="" placeholder="جدید">
        <a href="#" class="btn btn-sm btn-primary mb-3" onclick="addLanguage(event)">افزودن</a>
        <div class="lang-list card pr-2" style="min-height:50px;max-height: 200px;overflow-y: scroll;">
            <?php $__currentLoopData = \App\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" id="ln-<?php echo e($key+1); ?>" name="languages[]" value="<?php echo e($language->name); ?>" 
                <?php if(isset($post)): ?> <?php echo e($post->languages->pluck('id')->contains($language->id) ? 'checked' : ''); ?> <?php endif; ?>
                    class="custom-control-input">
                <label class="custom-control-label" for="ln-<?php echo e($key+1); ?>">
                    <?php echo e($language->name); ?></label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="awards-wrapper mt-3">
        <h6 class="">جوایز فیلم</h6>
        <input type="text" class="form-control mb-2" name="awards" id="awards" <?php if(isset($post)): ?> value="<?php echo e($post->awards); ?>"
            <?php endif; ?> placeholder="جوایز">

    </div>

    <div class="mt-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" id="commentstatus" name="commentstatus" value="1" 
            <?php if(isset($post)): ?>
                <?php echo e($post->comment_status == "enable" ? "checked" : ""); ?>

            <?php endif; ?>
            class="custom-control-input">
            <label class="custom-control-label" for="commentstatus">
                ارسال نظر برای این پست </label>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\tm\resources\views/Includes/Panel/sidemovie.blade.php ENDPATH**/ ?>