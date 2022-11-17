@extends('AdminHeader')

@section('navbar-admin')
    <div class="container">
        <div class="container-sm d-flex flex-column flex-wrap gap-4 justify-content-center align-items-center ">
            <div class="row row-cols-3 gap-5">
                <img src="{{asset('storage/'. $products->image_url)}}" alt="">
            </div>
            <h5> {{$products->name}}</h5>
            <h5>{{$products->price}}</h5>
            <h5>{{$products->description}}</h5>
        </div>
@endsection
