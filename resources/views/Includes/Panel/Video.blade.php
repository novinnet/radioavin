@isset($post)

@if (count($post->captions))
<div class="col-md-12">
    @foreach ($post->captions as $caption)
    <div class="cap-wrapper">
        <span>زیرنویس : {{$caption->lang}}</span> <a href="#"
            onclick="deleteCaption(event,'{{$caption->id}}','{{route('Ajax.DeleteCaption')}}')"><i
                class="fas fa-times"></i></a>
    </div>
    @endforeach
</div>
@endif
<div class="col-md-12 row my-3">
    <label for="" class="col-md-2">زیرنویس</label>
    <div class="col-md-3 ">
        <input type="text" class="form-control" name="captions[][1]">
    </div>
    <div class="col-md-3">
        <input type="file" name="captions[][2]" id="" class="form-control" />
    </div>
</div>
<a href="#" onclick="addCaption(event)" class="d-block mr-2 mb-3">افزودن زیرنویس </a>
@if (count($post->files))
@foreach ($post->files as $file)

@if ($post->type == 'video')
<div class="position-relative file-wrapper">
    <a href="#" onclick="deleteFile(event,'{{$file->id}}','{{route('Ajax.DeleteFile')}}')"
        class="d-block mr-2 mb-3 delete-file"><i class="fa fa-times"></i> </a>
    <video width="320" height="240" controls>
        <source src="{{asset($file->url)}}" type="video/mp4">
    </video>
</div>
@else
<div class="position-relative file-wrapper">
    <a href="#" onclick="deleteFile(event,'{{$file->id}}','{{route('Ajax.DeleteFile')}}')"
        class="d-block mr-2 mb-3 delete-file"><i class="fa fa-times"></i> </a>
    <audio controls>
        <source src="horse.ogg" type="audio/ogg">
        <source src="{{asset($file->url)}}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
</div>
@endif
@endforeach
<div class="row upload-season-file mx-2 mb-2 pb-2">
    <div class="form-group col-md-9">
        <label for=""> فایل: </label>
        <input required type="file" name="file[1][1]" id="" class="form-control" />
    </div>
    <div class="col-md-3 form-group">
        <label for=""> کیفیت: </label>
        <select name="file[1][2]" id="" class=" custom-select  ">
            <option value="360">360</option>
            <option value="480">480</option>
            <option value="576">576</option>
            <option value="720">720</option>
            <option value="1028">1028</option>

        </select>
    </div>
</div>
<div class="row mx-2 clone">
    <div class="col-md-12">
        <a href="#" onclick="cloneFile(event)"><i class="fas fa-plus"></i></a>
    </div>
</div>
@else
<div class="row upload-season-file mx-2 mb-2 pb-2">
    <div class="form-group col-md-9">
        <label for=""> فایل: </label>
        <input required type="file" name="file[1][1]" id="" class="form-control" />
    </div>
    <div class="col-md-3 form-group">
        <label for=""> کیفیت: </label>
        <select name="file[1][2]" id="" class=" custom-select  ">
            <option value="360">360</option>
            <option value="480">480</option>
            <option value="576">576</option>
            <option value="720">720</option>
            <option value="1028">1028</option>

        </select>
    </div>
</div>
<div class="row mx-2 clone">
    <div class="col-md-12">
        <a href="#" onclick="cloneFile(event)"><i class="fas fa-plus"></i></a>
    </div>
</div>

@endif

@else
<div class="col-md-12 row my-3">
    <label for="" class="col-md-2">زیرنویس</label>
    <div class="col-md-3 ">
        <input type="text" class="form-control" name="captions[][1]">
    </div>
    <div class="col-md-3">
        <input type="file" name="captions[][2]" id="" class="form-control" />
    </div>
</div>
<a href="#" onclick="addCaption(event)" class="d-block mr-2 mb-3">افزودن زیرنویس </a>
<div class="row upload-season-file mx-2 mb-2 pb-2">
    <div class="form-group col-md-9">
        <label for=""> فایل: </label>
        <input required type="file" name="file[1][1]" id="" class="form-control" />
    </div>
    <div class="col-md-3 form-group">
        <label for=""> کیفیت: </label>
        <select name="file[1][2]" id="" class=" custom-select  ">
            <option value="360">360</option>
            <option value="480">480</option>
            <option value="576">576</option>
            <option value="720">720</option>
            <option value="1028">1028</option>

        </select>
    </div>
</div>
<div class="row mx-2 clone">
    <div class="col-md-12">
        <a href="#" onclick="cloneFile(event)"><i class="fas fa-plus"></i></a>
    </div>
</div>

@endisset