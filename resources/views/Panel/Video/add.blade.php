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
   
    @endsection