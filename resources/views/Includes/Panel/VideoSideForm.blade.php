<div class="col-md-4">
    {{-- singer--}}
    
    
    <div class="row">
        <div class="form-group col-md-12">
            <label for=""> Singer: </label>
            <select name="singers[]" class="js-example-basic-single" multiple dir="rtl" required>
                @foreach ($singers as $singer)
                <option value="{{$singer->id}}"
                    {{isset($post) && $post->artists->pluck('id')->contains($singer->id) ? 'selected' : ''}}>
                    {{$singer->fullname}}</option>
                @endforeach
            </select>
        </div>
    </div>

     
   