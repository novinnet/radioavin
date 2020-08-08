@extends('Layout.Panel')

@section('content')
@if (!isset($playlist))
@include('Includes.Panel.playlistmenu')
@endif

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="text-center">Add PlayList </h5>
                <hr />
            </div>
            <form id="add-blog" method="post" @isset($playlist) action="{{route('Panel.EditPlayList',$playlist)}}" @else
                action="{{route('Panel.AddPlayList')}}" @endisset enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span> Name : </label>
                                <input required type="text" class="form-control" name="name" id="name"
                                    value="{{$playlist->fullname ?? ''}}" placeholder="" required>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-md-5">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label for=""><span class="text-danger">*</span> Poster: </label>
                                    </div>
                                    <div class="col-md-9">
                                        <img alt="" id="preview" width="100%" style="max-height: 400px" src="@isset($playlist)
                                             {{asset($playlist->photo)}} 
                                                @else
                                                 {{asset('assets/images/640x360.png')}} 
                                            @endisset">
                                        <input type="file" name="poster" id="poster" @if (!isset($playlist))
                                            required
                                        @endif/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="desc">Information: </label>
                                <textarea class="form-control" name="bio" id="bio" cols="30"
                                    rows="8">{{$playlist->bio ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for=""><span class="text-danger">*</span> Add Songs: </label>
                                <select name="songs[]" class="js-example-basic-single" multiple dir="rtl" >
                                    @foreach ($songs as $song)
                                    <option value="{{$song->id}}"
                                        {{isset($post) && $post->songs()->pluck('id')->contains($song->id) ? 'selected' : ''}}>
                                        {{$song->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            @isset($playlist)
                            Edit PlayList
                            @else
                        Add PlayList
                            @endisset
                             </button>
                    </div>
                </div>
            </form>
        </div>
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
</script>

@endsection