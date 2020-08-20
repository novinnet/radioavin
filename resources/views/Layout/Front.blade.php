<!doctype html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title' , env('APP_NAME'))</title>
    <link rel="stylesheet" href="{{asset('frontend/assets/bootstrap-4.5.0-dist/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/bootstrap-4.5.0-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/swiper/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/fontawesome-free-5.13.1-web/css/all.css')}}">
    @yield('css')
    <link rel="stylesheet" href="{{asset('frontend/assets/style.css')}}">
    
</head>


<body @if (\Request::route()->getName() == "login" || \Request::route()->getName() == "S.Register"
    )
    style="background: #fff"
    @endif
    >
    @include('Includes.Front.Header')
    @yield('main')
    @include('Includes.Front.Footer')

    @include('Includes.Front.MobileMenu')
    
</body>
<script src="{{asset('frontend/assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('frontend/assets/bootstrap-4.5.0-dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/swiper/swiper.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-validate/jquery.validate.js')}}"></script>
<script
    src="{{asset('frontend/assets/Generic-Mobile-friendly-Slider-Plugin-with-jQuery-touchSlider/jquery.touchSlider.js')}}">
</script>
<script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.css" rel="stylesheet">
<script type="text/javascript" src="{{asset('frontend/assets/js/index.js')}}"></script>
<script src="{{asset('frontend/assets/js/tipped.min.js')}}"></script>
@yield('js')
<script>
 function call(e) {
     e.preventDefault()
     var id = $(event.target).data('id')
      var typ = $(event.target).data('type')
   var jbox =  new jBox('Modal', {
  attach: '.openModal',
  minWidth:300,
  ajax: {
      type:"POST",
    url: '{{route('Ajax.GetPlayLists')}}',
    data: {
      id:id,
      type:typ
    },
    reload: 'strict',
    setContent: false,
    success: function (response) {
      this.setContent(response);
    },
    error: function () {
      this.setContent('<b style="color: #d33">Error loading content.</b>');
    }
  }
});
jbox.open()
 }




  function newPlaylist(event) {
      event.preventDefault()
      var request = $.post('{{route('Ajax.NewPlaylist')}}', {
        name: $('input.input-pl-name').val(),
        type: $('input.input-pl-type').val(),
        _token: $('meta[name="_token"]').attr("content"),
    });
    request.done(function (res) {
        $('.pl-wrapper').append(`
        <div class="pl-item"><a href="${res.playurl}" class="user-playlist"><i class="fa fa-play"></i>${res.name}</a>
        <div>
            <a href="#" data-id="${res.id}" data-url="${res.addurl}" onclick="addToPlaylist(event)"class="add"> <i class="fa fa-plus"></i> </a>
            <a href="#" onclick=""> <i class="fa fa-edit"></i> </a>
        </div>
        </div>
       `)
  })
}
</script>

</html>