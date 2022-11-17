@extends('AdminHeader')

@section('navbar-admin')
     <div class="p-10">
        <h1 class="text-center"> Find your best clothes here! </h1>
    </div>

    <div class="container-sm d-flex flex-column flex-wrap gap-4 justify-content-center align-items-center ">
        <div class="row row-cols-3 gap-5">
            @foreach ($Data as $d)

                <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 24rem;">
                     <div class="card-body">

                             <img src="{{asset('storage/'.$d->image_url)}}" class="w-75" id="img" width="100px", height="150px" alt="default">
                             <h5 class="card-title">{{$d->name}}</h5>
                             <p class="card-text">{{$d->price}}</p>
                             <p class="date">{{$d->description}}</p>
                             <a href="{{url('AdminHome/'.$d->name)}}">more</a>
                             </div>
                             </div>
             @endforeach
         </div>
         {{$Data->links() }}
    </div>
@endsection
