@extends('Layout.Panel')

@section('content')

@include('Includes.Panel.modals')

@include('Includes.Panel.albummenu')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h5 class="text-center"> Albums</h5>
            <hr>
        </div>
        <table id="example1" class="table table-striped table-bordered w-100">
            <thead>
                <tr>
                    <th></th>
                    <th> Name </th>
                    <th>Songs</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($albums as $key=>$album)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        <a href="#" class="text-primary">{{$album->name}}</a>
                    </td>
                    <td>
                        {{count($album->posts)}}
                    </td>
                 
                    <td>
                        {{\Carbon\Carbon::parse($album->created_at)->format('d F Y')}}
                    </td>
                    <td>
                        <a href="{{route('Panel.EditAlbum',$album)}}" class="btn btn-sm btn-info">Edit</a>
                    </td>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('css')

@endsection

@section('js')
<script>
    $('.deleteposts').click(function(e){
            e.preventDefault()
           
        });
    })
</script>

@endsection