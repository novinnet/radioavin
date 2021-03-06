$(document).ready(function () {
    $(document).on('mousemove', '.ac_results li', function () {

        $(this).addClass("ac_over");
    })
    $(document).on("mouseleave", ".ac_results li", function () {

        $(this).removeClass("ac_over");
    });

    $('.profile-icon').click(function(e){
        if($('.profile-content').hasClass('hidden')){

            $('.profile-content').removeClass('hidden')
            $('.profile-content').addClass('show')
        }else{
            $('.profile-content').addClass('hidden')
            $('.profile-content').removeClass('show')
        }
    })

    $('.mobile-menu').click(function (e) {
        e.preventDefault()
        if ($('.mobile-menu-content').hasClass('hidden')) {
            $('.toggle').addClass('radius-bottom-zero')
            $('.mobile-menu i').removeClass('fa-caret-right')
            $('.mobile-menu i').addClass('fa-caret-down')
            $('.mobile-menu-content').removeClass('hidden')
            $('.mobile-menu-content').addClass('show')
            $('.mobile-menu-content').css({}).animate({ height: '130px' }, 300);
        } else {
            $('.toggle').removeClass('radius-bottom-zero')
            $('.mobile-menu i').addClass('fa-caret-right')
            $('.mobile-menu i').removeClass('fa-caret-down')
            $('.mobile-menu-content').addClass('hidden')
            $('.mobile-menu-content').removeClass('show')
            $('.mobile-menu-content').css({}).animate({ height: '0' }, 200);
        }
    })

    $(".tab-c").on("click", function (e) {
        e.preventDefault();
        tabs = $(this).attr("href");
        $(".panel2").hide();
        $(tabs).show();
        $(".tab-c-con").removeClass("active");
        $(this).parent().addClass("active");
    });
    $(".tab-b").on("click", function (e) {
        e.preventDefault();
        tabs = $(this).attr("href");
        $(".panel1").hide();
        $(tabs).show();
        $(".tab-b-con").removeClass("active");
        $(this).parent().addClass("active");
    });


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
                spaceBetween: 20,
            },
        }
    });


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

    $("#touchSlider5").touchSlider({
        view: 3,
        gap: 0,
        breakpoints: {
            640: {
                view: 1,
                gap: 0,
            },
            375: {
                view: 1,
                gap: 0,
            },
        },
    });


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



})
$.validator.addMethod(
    "regex",
    function (value, element, regexp) {
        return this.optional(element) || regexp.test(value);
    },
    "Please Enter Valid"
);
$("#register").validate({
    rules: {
        password: {
            required: true,
            minlength: 6,
        },
        cpassword: {
            required: true,
            equalTo: "#password",
        },
        email: {
            required: true,
            regex: /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,
        },
        mobile: {
            regex: /^09[0-9]{9}$/,
        },
    },
});

$("#login-form").validate({
    rules: {
        password: {
            required: true,
            minlength: 6,
        },

        username: {
            required: true,

        },

    },
});

var token = $('meta[name="_token"]').attr("content");


function addToFavorite(event, id, url) {
    event.preventDefault();

    var el = $(event.target);
    // data = ;
    var request = $.post(url, {
        post_id: id,
        _token: token,
    });
    request.done(function (res) {
        // console.log(res.auth)
        if (res.auth == false) {
            location.href = res.login
        }
        if (res == "attach") {
            el.html('<i class="fa fa-check"></i>');
            el.css("background-color", "#007bff");
        } else {
            el.html('+');
            el.css("background-color", "transparent");
        }
    });
}

var send = true;
function getResult(event, url) {
    event.preventDefault()
    var timeout = 1000;
    var el = $(event.target);
    var word = el.val()
    if (word.length == 0) {
        $('.ac_results').fadeOut();
        $(".ac_results ul").html('');
    }
    if (word.length > 2 && send) {
        send = false;
        setTimeout(() => {
            var request = $.post(url, {
                word: word,
                _token: token
            });
            request.done(function (res) {

                send = true;
                if (res.length > 0) {

                    $('.ac_results').fadeIn()
                    $('.ac_results ul').html(res)
                }
            });
        }, timeout);
    }
}

function downloadd(e) {
    e.preventDefault();
    
    var id = $(".download-btn").attr("data-id");
    var url = mainUrl + "/ajax/download";

    var request = $.post(url, {
        id: id,
        _token: token
    });
    request.done(function(res) {
        //  if (res.length > 0) {
        //      $(".ac_results").fadeIn();
        //      $(".ac_results ul").html(res);
        //  }
    });
}


function openFilter() {
  document.getElementById("myNav").style.height = "100%";
}
function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}


function showForm(event) {
    
}