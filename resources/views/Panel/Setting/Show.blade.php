@extends('Layout.Panel')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5 class="text-center">Setting </h5>
                <hr />
            </div>
            <form id="add-plan" method="post" action="{{route('Panel.Setting')}}">
                @csrf
                <div class="row my-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="card-title">Site Theme</label>
                            <input type="text" name="theme" class="sample-selector-rgba form-control text-right"
                                dir="ltr">
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    @foreach ($categories as $category)
                    <div class="col-md-2">
                        <h5>{{$category->name}}</h5>
                        <div style="display: flex;justify-content: space-between">
                            <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="{{$category->name}}" name="cat[{{$category->id}}][name]" value="{{$category->name}}"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="{{$category->name}}">
                                    نمایش</label>
                            </div>
                            <div class="form-group w-50">

                                <select name="cat[{{$category->id}}][order]" id="" class="form-control custom-select">
                                    @for ($i = 1; $i <= count($categories); $i++) 
                                     <option value="{{$i}}" {{$category->orders == $i ? 'selected' : ''}}>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row my-3">
                    <div class="col-md-12">
                        <h6>Footer</h6>
                        <label for="">Text</label>
                        <input type="text" name="footer_label" class="form-control">
                    </div>

                </div>
                <div class="row my-3">
                    <div class="col-md-3 m-t-b-20">
                        <button type="button" class="btn btn-whatsapp ml-2">
                            <i class="fab fa-whatsapp"></i>
                        </button>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="whatsapp" name="whatsapp_status" value="1"
                                class="custom-control-input" checked>
                            <label class="custom-control-label" for="whatsapp">
                                Show / Hide</label>
                        </div>

                        <input type="text" name="whatsapp" class="form-control mt-2">
                    </div>
                    <div class="col-md-3 m-t-b-20">
                        <button type="button" class="ml-2 btn btn-instagram">
                            <i class="fab fa-instagram"></i>
                        </button>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="instagram" name="instagram_status" value="1"
                                class="custom-control-input" checked>
                            <label class="custom-control-label" for="instagram">
                                Show / Hide</label>
                        </div>
                        <input type="text" name="instagram" class="form-control mt-2">

                    </div>
                    <div class="col-md-3 m-t-b-20">
                        <button type="button" class="ml-2 btn btn-instagram">
                            <i class="fab fa-telegram"></i>
                        </button>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="telegram" name="telegram_status" value="1"
                                class="custom-control-input" checked>
                            <label class="custom-control-label" for="telegram">
                                Show / Hide</label>
                        </div>
                        <input type="text" name="telegram" class="form-control mt-2">

                    </div>
                    <div class="col-md-3 m-t-b-20">
                        <button type="button" class="ml-2 btn btn-youtube">
                            <i class="fab fa-youtube"></i>
                        </button>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="youtube" name="youtube_status" value="1"
                                class="custom-control-input" checked>
                            <label class="custom-control-label" for="youtube">
                                Show / Hide</label>
                        </div>
                        <input type="text" name="youtube" class="form-control mt-2">

                    </div>
                    <div class="col-md-3 m-t-b-20">
                        <button type="button" class="ml-2 btn btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="twitter" name="twitter_status" value="1"
                                class="custom-control-input" checked>
                            <label class="custom-control-label" for="twitter">
                                Show / Hide</label>
                        </div>
                        <input type="text" name="twitter" class="form-control mt-2">

                    </div>
                    <div class="col-md-3 m-t-b-20">
                        <button type="button" class="ml-2 btn btn-facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="facebook" name="facebook_status" value="1"
                                class="custom-control-input" checked>
                            <label class="custom-control-label" for="facebook">
                                Show / Hide</label>
                        </div>
                        <input type="text" name="facebook" class="form-control mt-2">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h6>فهرست ها</h6>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="menu1" name="menu" value="music" class="custom-control-input"
                                checked>
                            <label class="custom-control-label" for="menu1">
                                music</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="video" name="menu" value="video" class="custom-control-input"
                                checked>
                            <label class="custom-control-label" for="video">
                                video</label>
                        </div>

                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="header-menu" name="menu" value="Header Menu"
                                class="custom-control-input" checked>
                            <label class="custom-control-label" for="header-menu">
                                Header Menu</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="Slider" name="menu" value="Slider" class="custom-control-input"
                                checked>
                            <label class="custom-control-label" for="Slider">
                                Slider</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="Photos" name="menu" value="Photos" class="custom-control-input"
                                checked>
                            <label class="custom-control-label" for="Photos">
                                Photos</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="PodCasts" name="menu" value="PodCasts"
                                class="custom-control-input" checked>
                            <label class="custom-control-label" for="PodCasts">
                                PodCasts</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="footer" name="menu" value="footer" class="custom-control-input"
                                checked>
                            <label class="custom-control-label" for="footer">
                                footer</label>
                        </div>


                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-4">
                        <h6>Logo</h6>
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"> Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('css')

<!-- begin::colorpicker -->
<link rel="stylesheet" href="{{asset('assets/vendors/colorpicker/css/bootstrap-colorpicker.min.css')}}" type="text/css">
<!-- end::colorpicker -->
@endsection
@section('js')
<!-- begin::colorpicker -->
<script src="{{asset('assets/vendors/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('assets/js/examples/colorpicker.js')}}"></script>
<!-- end::colorpicker -->

@endsection