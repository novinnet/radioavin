     
<div class="card">
    <div class=" card-body ">
   
<ul class="nav nav-pills ">
        <li class="nav-item">
            <a href="{{route('Panel.VideoList')}}" class="nav-link 
            @if(\Request::route()->getName() == "Panel.VideoList") {{'active'}}
             @endif">لیست</a>
        </li>
        <li class="nav-item">
            <a href="{{route('Panel.AddVideo')}}" class="nav-link
   @if(\Request::route()->getName() == "Panel.AddVideo") {{'active'}}
    @endif">جدید <i class="fas fa-plus"></i></a>
        </li>
</ul>
     
    </div>
</div>
