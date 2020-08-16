<?php $__env->startSection('main'); ?>
    <?php echo $__env->make('Includes.Front.TopSlider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('Includes.Front.Alfabet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <dl class="tabs" data-tab="">
                    <dd class="tab tab-c-con active"><a class="tab-c" href="#panel2-1">Trending Now</a></dd>
                    <dd class="tab tab-c-con"><a class="tab-c" href="#panel2-2">Featured Songs</a></dd>
                </dl>
                <div class="row panel2" id="panel2-1">

                    
                   <?php $__env->startComponent('components.music-box'); ?>
                   <?php echo $__env->renderComponent(); ?>


                    <div class="col-6 col-md-2 photo-cart music-cart-wrapper scale-play-list view-event">
                        <a class="text-center" href="#">
                            <span class="view-event-sp music-cart-wrapper">View More</span>
                        </a>
                    </div>

                </div>

                <div class="row panel2" id="panel2-2" style="display: none">
                   <?php $__env->startComponent('components.music-box'); ?>
                   <?php echo $__env->renderComponent(); ?>
                
                    <div class="col-6 col-md-2 photo-cart music-cart-wrapper scale-play-list view-event">
                        <a class="text-center" href="#">
                            <span class="view-event-sp music-cart-wrapper">View More</span>
                        </a>
                    </div>

                </div>


            </div>
            <div class="col-12 col-md-3 music-cart-h-wrapper pl-md-0">
                <dl class="tabs" data-tab="">
                    <dd class="active tab tab-b-con"><a class="tab-b" href="#this_month">This Month</a></dd>
                    <dd class="tab tab-b-con"><a class="tab-b" href="#this_week">This Week</a></dd>
                    <dd class="tab tab-b-con"><a class="tab-b" href="#all_time">All time</a></dd>
                </dl>
                <div class="panel1" id="this_month">
                   <?php $__env->startComponent('components.list-view'); ?>
                   <?php echo $__env->renderComponent(); ?>
                   
                    <div class="music-cart-h view-event ">
                        <a class="text-center" href="#">
                            <span class="view-event-sp music-cart-wrapper">View More</span>
                        </a>
                    </div>
                </div>
                <div class="panel1" id="this_week" style="display: none">
                     <?php $__env->startComponent('components.list-view'); ?>
                     <?php echo $__env->renderComponent(); ?>
                   
                    <div class="music-cart-h view-event ">
                        <a class="text-center" href="#">
                            <span class="view-event-sp music-cart-wrapper">View More</span>
                        </a>
                    </div>
                </div>
                <div class="panel1" id="all_time" style="display: none">
                    <?php $__env->startComponent('components.list-view'); ?>
                    <?php echo $__env->renderComponent(); ?>
                  
                    <div class="music-cart-h view-event ">
                        <a class="text-center" href="#">
                            <span class="view-event-sp music-cart-wrapper">View More</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">

        <div class="row  justify-content-between">
            <div class="col">
                <div class="sectionTitle">
                    <h2 class="title">New Albums</h2>
                </div>
            </div>
            <div class="col text-right">

            </div>
        </div>
        <div class="row">
           <?php $__env->startComponent('components.album-box'); ?>
               
           <?php echo $__env->renderComponent(); ?>
            
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.Front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\radio\resources\views/Front/mp3s.blade.php ENDPATH**/ ?>