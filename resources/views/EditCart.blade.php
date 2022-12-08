@extends('template')

@section('contents')
    <div class="container">
        <div class="container-sm d-flex flex-column flex-wrap gap-4 justify-content-center align-items-center ">
            <div class="row row-cols-3 gap-5">
                <img src="{{asset('storage/'. $products->image_url)}}" alt="">
            </div>
            <h5> {{$products->name}}</h5>
            <h5>{{$products->price}}</h5>
            <h5>{{$products->description}}</h5>
            <form action="/updatecart/{{$products->id}}" method="POST">
                @csrf
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control @error('quantity') is-invalid @enderror"  id="quantity" name="name">
                @error('quantity')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                @if(session()->has('message'))
                    <div class="text-green-600 mb-4">{{session()->get('message')}}</div>
                @endif
                <button class= "btn btn-primary" type = "submit" value= "Update Cart">Update Cart</button>
            </form>
        </div>
@endsection
