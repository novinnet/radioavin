@extends('Layout.Panel')

@section('content')

<div class="container-fluid">
   @if (!isset($post))
        @include('Includes.Panel.moviesmenu')
   @endif
    <div class="card">
        <div class="card-body">

            <form id="upload-music" method="post" @isset($post) action="{{route('Panel.EditVideo',$post)}}" @else
                action="{{route('Panel.AddVideo')}}" @endisset enctype="multipart/form-data">
                @csrf
                <div class="card-title d-flex justify-content-between">
                    <h5 class="text-center">
                        @isset($post)
                        Edit Video
                        @else
                        Add Video
                        @endisset


                    </h5>

                    <button type="submit" class="btn btn-primary">
                        @isset($post)
                        ویرایش
                        @else
                        ذخیره
                        @endisset
                    </button>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                       @include('Includes.Panel.VideoForm')
                    
                     @include('Includes.Panel.Video')
                        
                    </div>
                    @include('Includes.Panel.VideoSideForm')
                </div>
            


              
                    <div class="col-md-12 text-center">
                        <a class="btn btn-outline-primary" href="{{route('Panel.VideoList')}}">Back &nbsp;<i
                                class="fas fa-arrow-circle-right"></i></a>
                        <button type="submit" class="btn btn-primary"> @isset($post)
                            Edit
                            @else
                            Save
                            @endisset

                        </button>
                    </div>
                
            </form>
            <hr>
        </div>
    </div>

    @endsection

    @section('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/datepicker/bootstrap-datepicker.min.css')}}">
    @endsection
    @section('js')
    <script src="{{asset('assets/vendors/datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/vendors/ckeditor/ckeditor.js')}}"></script>
    <script>
        $('#imdb-released').hide()
    $('#checkImdb').change(function(){
        if($(this).is(':checked')){
            $('.add-code').css('display','flex')
          
        }else{
             $('.add-code').hide()
           
        }
    })

    $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true
            });

    CKEDITOR.replace('desc',{
            contentsLangDirection: 'rtl',
            filebrowserUploadUrl: '{{route('UploadImage')}}?type=file',
            imageUploadUrl: '{{route('UploadImage')}}?type=image',
        });
        
                 array  =[];
                $('.scat').each(function(){
                    array.push(this.value)
                })
     
    function showActor(event) {
          event.preventDefault()
          var el = $(event.target)
          let val = $(event.target).val()
          if(val.length > 3) {
            
               data = { val:val,_token: "{{ csrf_token() }}" };
            url='{{route('Panel.Ajax.GetActor')}}';
            request = $.post(url, data);
            request.done(function(res){
                el.next().show()
                el.next().html(res)
          })
    
        }
      }     

       function showDirector(event) {
          event.preventDefault()
          var el = $(event.target)
          let val = $(event.target).val()
          if(val.length > 3) {
            
               data = { val:val,_token: "{{ csrf_token() }}" };
            url='{{route('Panel.Ajax.GetDirector')}}';
            request = $.post(url, data);
            request.done(function(res){
                el.next().show()
                el.next().html(res)
          })
    
        }
      }    
              
    function getCode(event) {
            event.preventDefault()

            var code = $('#code').val()
            
            if(code != '') {
                var parentHtml = $('.wrapper--btn');
             parentHtml.html(`<button class="btn btn-primary  my-2" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm m-l-5" role="status" aria-hidden="true"></span>
                    در حال دریافت اطلاعات ...
                </button>`)   
            data = { code:code,_token: "{{ csrf_token() }}" };
            url='{{route('Panel.GetImdb')}}';
            request = $.post(url, data);
            request.done(function(res){
                if(res.error){
                    alert(res.error)
                     parentHtml.html(`
                        <a href="#" onclick="getCode(event)" class="btn btn-primary my-2">جست و جو &nbsp;<i
                                                    class="fas fa-search"></i></a>
                        `)
                    return false;
                }
                  if(res.is_serial == "series") {
                    alert('کد مورد نظر مربوط به سینمایی میباشد')
                     parentHtml.html(`
                        <a href="#" onclick="getCode(event)" class="btn btn-primary my-2">جست و جو &nbsp;<i
                                                    class="fas fa-search"></i></a>
                        `)
                    return false;
                }
                $('#movie-type').val(res.is_serial)
                $('#original-title').val(res.title)
                $('#year').val(res.year)
                $('#runtime').val(res.duration)
                CKEDITOR.instances['desc'].setData(res.storyline)
                $('.cat-wrapper').html(res.catlist)
                $('#imdbID').val(res.imdbID)
                $('#imdbVotes').val(res.imdbVotes)
                $('#imdbRating').val(res.imdbRating)

                $('#preview').attr('src',res.photo)
                $('#imdbposter').val(res.photo)
                $('#runtime').val(res.runtime)
                $('#released').val(res.Released)
                $('#awards').val(res.Awards)
          


                 const Directors = res.directors.map((item,index) => {
                           return `<div class="custom-control custom-checkbox custom-control-inline">
                                     <input type="checkbox" id="director-${index}" name="directors[]" value="${item.name}"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label" for="director-${index}">
                                        ${item.name}</label>
                                </div>`

                        });
                joinDirectors = Directors.join('');
                $('.directors-list').html(joinDirectors)

                       const Writers = res.writers.map((item,index) => {
                           return `<div class="custom-control custom-checkbox custom-control-inline">
                                     <input type="checkbox" id="writer-${index}" name="writers[]" value="${item.name}"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label" for="writer-${index}">
                                        ${item.name}</label>
                                </div>`

                        });
                joinWriters = Writers.join('');
                $('.writers-list').html(joinWriters)

              
               
               const Languages = res.languages.map((item,index) => {
                           return `<div class="custom-control custom-checkbox custom-control-inline">
                                     <input type="checkbox" id="lang-${index}" name="languages[]" value="${item}"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label" for="lang-${index}">
                                        ${item}</label>
                                </div>`

                        });
                joinlanguages = Languages.join('');
                $('.lang-list').html(joinlanguages)


                const actors = res.casts.map((item,index) => {
                           return `<div class="custom-control custom-checkbox custom-control-inline">
                                     <input type="checkbox" id="ac-${index}" name="actors[]" value="${item[0]}"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label" for="ac-${index}">
                                        ${item[0]}</label>
                                </div>`

                        });
                   joinActors = actors.join('');
                   $('.actors-list').html(joinActors)

                const Images = res.mainPictures.map(item => {
                    return  `<div class=" col-md-3">
                                <a style="cursor:pointer;color:red" onclick="deleteImage(event)"><i
                                        class="fas fa-trash"></i></a>
                                <img width="100%" src="${item}" alt="">
                               <input type="hidden" name="images[]" value="${item}" />
                            </div>`
                });
                joinImages = Images.join('');
                $('.images').html(joinImages)
                parentHtml.html(`
                    <a href="#" onclick="getCode(event)" class="btn btn-primary my-2">جست و جو &nbsp;<i
                                                class="fas fa-search"></i></a>
                    `)
               
          });
            request.fail(function(xhr, status, error) {
            alert('خطا در دریافت اطلاعات')
            parentHtml.html(`
                        <a href="#" onclick="getCode(event)" class="btn btn-primary my-2">جست و جو &nbsp;<i
                                                    class="fas fa-search"></i></a>
                        `)
          });
         
       }
    }


    
function deleteVideo(event , videoId) {
    event.preventDefault()
    
    var el = $(event.target);
     data = { id:videoId,_method:'delete',_token: "{{ csrf_token() }}" };
            url="{{route('Panel.DeleteVideo')}}";
            request = $.post(url, data);
            request.done(function(res){
                if($('.upload-season-file').length == 1) {
                    el.parent('.upload-season-file').find('#video-url').val('')
                    el.parent('.upload-season-file').find('#video-url').val('')

                }else{

                    el.parent('.upload-season-file').remove()
                    el.parent().next('.clone').remove()
                }

        });
}

    function deleteImage (event) {
            event.preventDefault()
            var target =$(event.target)
            target.parents('.col-md-3').remove()
            }
              
 $(".dropify").dropify();
           
    </script>
    @endsection