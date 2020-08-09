@extends('Layout.Panel')

@section('content')

@include('Includes.Panel.modals')

 @include('Includes.Panel.artistmenu')
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h5 class="text-center">Artist List</h5>
            <hr>
        </div>
        <table id="example1" class="table table-striped table-bordered w-100">
            <thead>
                <tr>
                   >
                    <th></th>
                    <th> Name </th>
                    <th>BirthDay</th>
                    <th>Rate</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($artists as $key=>$artist)
                <tr>
                   
                    <td>{{$key+1}}</td>
                    <td>
                        <a href="#" class="text-primary">{{$artist->fullname}}</a>
                    </td>
               

                    <td>
                    
                       {{\Carbon\Carbon::parse($artist->birthday)->format('d F Y')}}
                    </td>
                    <td>
                        6.1 از 10
                    </td>
                    <td>
                        <a href="{{route('Panel.EditArtist',$artist)}}" class="btn btn-sm btn-info">Edit</a>
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
          
    })
</script>

@endsection