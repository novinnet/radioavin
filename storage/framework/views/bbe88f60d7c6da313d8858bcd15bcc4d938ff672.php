<!doctype html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
     <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $__env->yieldContent('title' , env('APP_NAME')); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/bootstrap-4.5.0-dist/css/bootstrap-reboot.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/bootstrap-4.5.0-dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/swiper/swiper.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/fontawesome-free-5.13.1-web/css/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/style.css')); ?>">
</head>


<body 
<?php if(\Request::route()->getName() == "login" || \Request::route()->getName() == "S.Register" 
     ): ?>
    style="background: #fff"
    <?php endif; ?>
>
    <?php echo $__env->make('Includes.Front.Header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('main'); ?>
    <?php echo $__env->make('Includes.Front.Footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('Includes.Front.MobileMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
<script src="<?php echo e(asset('frontend/assets/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/assets/bootstrap-4.5.0-dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/swiper/swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/jquery-validate/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/assets/Generic-Mobile-friendly-Slider-Plugin-with-jQuery-touchSlider/jquery.touchSlider.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/assets/js/index.js')); ?>"></script>
<?php echo $__env->yieldContent('js'); ?>
</html><?php /**PATH C:\xampp\htdocs\radio\resources\views/Layout/Front.blade.php ENDPATH**/ ?>