<!doctype html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/bootstrap-4.5.0-dist/css/bootstrap-reboot.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/bootstrap-4.5.0-dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/fontawesome-free-5.13.1-web/css/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/style.css')); ?>">
</head>

<body>
    <header>
        <div class="top-header" id="navbar">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-4 ">
                        
                    </div>
                    <div
                        class="col-6 col-md-4 pt-2 pt-md-0  text-md-center text-right justify-content-center align-middle">
                        <div>
                            <div class="search-box align-middle">
                                <label>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="136pt" version="1.1"
                                        viewBox="-1 0 136 136.21852" width="136pt">
                                        <g id="surface1">
                                            <path
                                                d="M 93.148438 80.832031 C 109.5 57.742188 104.03125 25.769531 80.941406 9.421875 C 57.851562 -6.925781 25.878906 -1.460938 9.53125 21.632812 C -6.816406 44.722656 -1.351562 76.691406 21.742188 93.039062 C 38.222656 104.707031 60.011719 105.605469 77.394531 95.339844 L 115.164062 132.882812 C 119.242188 137.175781 126.027344 137.347656 130.320312 133.269531 C 134.613281 129.195312 134.785156 122.410156 130.710938 118.117188 C 130.582031 117.980469 130.457031 117.855469 130.320312 117.726562 Z M 51.308594 84.332031 C 33.0625 84.335938 18.269531 69.554688 18.257812 51.308594 C 18.253906 33.0625 33.035156 18.269531 51.285156 18.261719 C 69.507812 18.253906 84.292969 33.011719 84.328125 51.234375 C 84.359375 69.484375 69.585938 84.300781 51.332031 84.332031 C 51.324219 84.332031 51.320312 84.332031 51.308594 84.332031 Z M 51.308594 84.332031 "
                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
                                        </g>
                                    </svg>
                                </label>
                                <input type="text" placeholder="search">
                            </div>
                        </div>
                    </div>

                    <div class="col-5 col-md-4 border-top-my d-inline-block d-md-none">
                        <div class="logo">
                            <a class="logo-url" href="./index.html">
                                <img src="<?php echo e(asset('frontend/images/screencapture-radiojavan-2020-07-13-15_06_28.png')); ?>"
                                    height="38" width="172" />
                            </a>
                        </div>
                    </div>
                    <div class="col-7 col-md-4 border-top-my pr-">
                        <ul class="top-header-menu text-right">
                            <li class="text-red d-none d-md-block"><a href="#">Listen Now</a></li>
                            <li class="position-relative">
                                <span class="login_modal_lbl">Log In</span>
                                <div id="login-modal" style="display: none">
                                    <div id="user_account_dropdown">
                                        <form id="login_form" action="/login" accept-charset="UTF-8" method="post">
                                            <input name="utf8" type="hidden" value="✓"><input type="hidden"
                                                name="authenticity_token"
                                                value="i0AXqQc0VVFjZ97DRZCpV7p/OjLmGr2IKovY6Hlvwi+hwQHCZPLZCvEYmL10PdGUsEN5VM4/G1I7XH1L4b56/g==">
                                            <input type="text" name="login_email" id="login_email" placeholder="Email">
                                            <input type="hidden" name="redirect" id="redirect" value="/signup">
                                            <input type="password" name="login_password" id="login_password"
                                                placeholder="Password" class="twelve">
                                            <span class="button primaryButton" id="login_button">Log In</span>
                                        </form>
                                        <hr>
                                        <div id="login_signup">
                                            Don't have an account?
                                            <a href="/singup.html" data-no-turbolink="data-no-turbolink"
                                                class="button linkButton">Sign Up</a>
                                        </div>
                                        <hr>
                                        <span id="facebook_button" class="button textButton" style="">
                                            <a data-no-turbolink="" href="#">
                                                <span>Login With Facebook</span>
                                            </a>
                                        </span>
                                        <hr>
                                        <div id="login_forgot">
                                            <a href="/account/forgot" data-no-turbolink="data-no-turbolink"
                                                class="button textButton">Forgot your password?</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="./singup.html">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container justify-content-between" id="navmenu">
            <div class="row justify-content-between nav-menu overflow-hidden">
                <div class="nav-menu-logo">
                    <div class="logo">
                        <a class="logo-url" href="#">
                            <img src="<?php echo e(asset('frontend/images/screencapture-radiojavan-2020-07-13-15_06_28.png')); ?>"
                                height="38" width="172" />
                        </a>
                    </div>

                </div>
                <div class="nav-main-menu">
                    <nav>
                        <ul>
                            <li><a href="./music.html">Music</a></li>
                            <li><a href="./playlist.html">PlayList</a></li>
                            <li><a href="./videos.html">Videos</a></li>
                            <li><a href="./podcasts.html">Podcasts</a></li>
                            <li><a href="./photos.html">Photos</a></li>
                            <!-- <li><a href="#">Music</a></li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-page ">
        <div class="row mt-2">
            <div class="col-12 col-md-6 ">
                <div class="music-cart-wrapper p-2">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/443fca6c6e652c0.jpg')); ?>" />
                            <div class="img-cover"></div>
                            <span class="tag">mp3</span>
                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 ">
                <div class="music-cart-wrapper p-2">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/donya.jpg')); ?>" />
                            <div class="img-cover"></div>
                            <span class="tag">mp3</span>
                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-2">
        <div class="row  justify-content-between">
            <div class="col">
                <div class="sectionTitle">
                    <h2 class="title">Playlists</h2>
                </div>
            </div>
            <div class="col text-right">
                <a class="viewMore button primaryButton" href="/playlists">View More</a>
            </div>
        </div>

        <div class="">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/remix.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/remix.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/remix.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/remix.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/remix.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/remix.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/remix.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/remix.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/flower.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/flower.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/flower.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide text-center mb-lg-5">
                        <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                            <a href="#">
                                <div class="music-cart">
                                    <img src="<?php echo e(asset('frontend/images/flower.jpg')); ?>" />
                                    <div class="img-cover"></div>

                                </div>
                                <div class="songInfo center">
                                    <span class="artist" title="Baran">Baran</span>
                                    <span class="song" title="Migzaroonam">Migzaroonam</span>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Add Scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>

        </div>
    </div>


    <div class="container mt-2">
        <div class="row  justify-content-between">
            <div class="col">
                <div class="sectionTitle">
                    <h2 class="title">RJ Exclusive</h2>
                </div>
            </div>
            <div class="col text-right">

            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newreleases.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newreleases.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newreleases.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newreleases.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-2">
        <div class="row  justify-content-between">
            <div class="col">
                <div class="sectionTitle">
                    <h2 class="title">Hot Tracks</h2>
                </div>
            </div>
            <div class="col text-right">

            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newreleases.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newsong.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-2">
        <div class="row  justify-content-between">
            <div class="col">
                <div class="sectionTitle">
                    <h2 class="title">More To Explore</h2>
                </div>
            </div>
            <div class="col text-right">

            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newsong.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newsong.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newsong.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newsong.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newsong.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newsong.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newsong.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-2">
        <div class="row  justify-content-between">
            <div class="col">
                <div class="sectionTitle">
                    <h2 class="title">Latest Podcasts</h2>
                </div>
            </div>
            <div class="col text-right">

            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/newsong.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/garsha.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/garsha.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/8587c34a5560eee.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/8587c34a5560eee.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/a54141cefc06982.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/a54141cefc06982.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-2">
        <div class="row  justify-content-between">
            <div class="col">
                <div class="sectionTitle">
                    <h2 class="title">Coming Soon</h2>
                </div>
            </div>
            <div class="col text-right">

            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/a54141cefc06982.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/a54141cefc06982.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/a54141cefc06982.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/a54141cefc06982.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper scale-play-list p-3 p-sm-2 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/a54141cefc06982.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo center">
                            <span class="artist" title="Baran">Baran</span>
                            <span class="song" title="Migzaroonam">Migzaroonam</span>

                        </div>
                    </a>
                </div>
            </div>


        </div>
    </div>

    <div class="container mt-2">
        <div class="row  justify-content-between">
            <div class="col">
                <div class="sectionTitle">
                    <h2 class="title">Popular Artists</h2>
                </div>
            </div>
            <div class="col text-right">

            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper Popular-Artists scale-play-list p-3 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/ebi-b166edc05f473c8-photo.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo text-center">
                            <span class="artist" title="Baran">Baran</span>


                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper Popular-Artists scale-play-list p-3 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/khajeamiri.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo text-center">
                            <span class="artist" title="Baran">Baran</span>


                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper Popular-Artists scale-play-list p-3 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/ebi-b166edc05f473c8-photo.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo text-center">
                            <span class="artist" title="Baran">Baran</span>


                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper Popular-Artists scale-play-list p-3 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/tohi.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo text-center">
                            <span class="artist" title="Baran">Tohi</span>


                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="music-cart-wrapper Popular-Artists scale-play-list p-3 p-md-1 p-lg-3">
                    <a href="#">
                        <div class="music-cart">
                            <img src="<?php echo e(asset('frontend/images/ebi-b166edc05f473c8-photo.jpg')); ?>" />
                            <div class="img-cover"></div>

                        </div>
                        <div class="songInfo text-center">
                            <span class="artist" title="Baran">Baran</span>


                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>



    <footer>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">Music</a></li>
                            <li><a href="#">Music</a></li>
                            <li><a href="#">Music</a></li>
                            <li><a href="#">Music</a></li>
                            <li><a href="#">Music</a></li>
                            <li><a href="#">Music</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-6 ">
                    <span class="copy-write-text text-center">
                        © 2020 by ------- . All Rights Reserved.<br>

                        The largest source of Persian entertainment providing the best Persian and Iranian music 24/7
                    </span>
                </div>
            </div>




        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('frontend/assets/bootstrap-4.5.0-dist/js/bootstrap.min.js')); ?>"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    </footer>


    <div id="mobile-menu" style="position: fixed;bottom: 60px;z-index:1000;" class="col-12">
        <div class="toggle" style="display: flex;padding:5px;
    justify-content: center;
    background: #5b5b5bb5;
    color: white;
    border-radius: 5px;
   
    border: 1px solid #6c6a6a;">
            <a href="#" class="mobile-menu text-white" style="display: flex;width: 100%;
    justify-content: center;
    align-items: center;"> <span style="margin-right: 6px;
    display: inline-block;">menu</span> <i class="fa fa-caret-right"></i></a>
        </div>
        <div class="mobile-menu-content hidden d-flex justify-content-between" style="    background: #000000d4;
    border: 1px solid;
    border-bottom-left-radius: 5px;
    border-top: 0;
     height: 0;
    opacity: 0;
    visibility: hidden;
    border-bottom-right-radius: 5px;
">
            <div class="" style="width: 33.33%;
    padding: 25px 0;
    text-align: center;      background: #212121de;">
                <a href="./music.html" style="color: #e6e6e6e6;"> <i class="fa fa-headphones"></i>
                    music</a>
            </div>
            <div class="" style="color: #e6e6e6e6;width: 33.33%;
    padding: 25px 0;
    text-align: center;    border-left: 1px solid #303030;    background: #212121de;">
                <a href="./videos.html" style="color: #e6e6e6e6;"> <i class="fa fa-video"></i>
                    video</a>
            </div>
            <div class="" style="color: #e6e6e6e6;width: 33.33%;
    padding: 25px 0;
    text-align: center;  border-left: 1px solid #303030;    background: #212121de;">
                <a href="./photos.html" style="color: #e6e6e6e6;"><i class="fa fa-camera"></i>
                    photos</a>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $('.mobile-menu').click(function(e){
        e.preventDefault()
        if($('.mobile-menu-content').hasClass('hidden')){
             $('.toggle').addClass('radius-bottom-zero')
        $('.mobile-menu i').removeClass('fa-caret-right')
        $('.mobile-menu i').addClass('fa-caret-down')
        $('.mobile-menu-content').removeClass('hidden')
        $('.mobile-menu-content').addClass('show')
        $('.mobile-menu-content').css({}).animate({height:'80px'}, 300);
        }else{
            $('.toggle').removeClass('radius-bottom-zero')
        $('.mobile-menu i').addClass('fa-caret-right')
        $('.mobile-menu i').removeClass('fa-caret-down')
        $('.mobile-menu-content').addClass('hidden')
        $('.mobile-menu-content').removeClass('show')
        $('.mobile-menu-content').css({}).animate({height:'0'}, 200);
        }
    })








    var swiper = new Swiper('.swiper-container', {
        scrollbar: {
            el: '.swiper-scrollbar',
            hide: false,

        },
        slidesPerView: 2,
        spaceBetween: 10,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 6,
                spaceBetween: 50,
            },
        }
    });
</script>
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
            document.getElementById("navbar").classList.remove("top-100");
            document.getElementById("navmenu").classList.remove("mystyle");
        } else {
            document.getElementById("navbar").style.top = "-50px";
            document.getElementById("navbar").classList.add("top-100")
            document.getElementById("navmenu").classList.add("mystyle")
        }
        prevScrollpos = currentScrollPos;
    }
</script>
<script>
    $('.login_modal_lbl').on('click', function (e) {
        $('#login-modal').toggle()
    })

    $(document).click(function (e) {
        if ($(e.target).closest('.login_modal_lbl').length == 0
            && $(e.target).closest('#user_account_dropdown').length == 0
        ) {
            $('#login-modal').hide()
        }
    });

</script><?php /**PATH C:\xampp\htdocs\radio\resources\views/Front/index.blade.php ENDPATH**/ ?>