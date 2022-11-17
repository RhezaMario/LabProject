@extends('CustomerHeader')
<link href="{{ asset('style/CustomerHome.css') }}" rel="stylesheet">
@section('navbar-user')
    <div class="p-10">
        <h1 class="text-center"> Find your best clothes here! </h1>
    </div>

    <div class="container-sm d-flex flex-column flex-wrap gap-4 justify-content-center align-items-center ">
        <div class="row row-cols-3 gap-5">
            @foreach ($productData as $p)

                <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 24rem;">
                     <div class="card-body">

                             <img src="{{ asset('storage/') . $p->image_url}}" class="w-75" id="img2" width="30%", height="30#">
                             <h5 class="card-title">{{$p->name}}</h5>
                             <p class="card-text">{{$p->price}}</p>
                             <p class="date">{{$p->description}}</p>
                     </div>
                </div>
             @endforeach
         </div>
         {{$productData->links() }}
    </div>



@endsection

