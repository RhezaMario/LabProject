
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
            @can('admin')
            <form action="/Products/{{$products->id}}" method="POST">
                @csrf
                @method('delete')
                <button class = "btn btn-danger" type="submit">Delete</button>
            </form>
            @endcan
            @can('member')
            <form action="/AddCart/{{$products->id}}" method="POST">
                @csrf
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control @error('quantity') is-invalid @enderror"  id="quantity" name="quantity">
                @error('quantity')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                @if(session()->has('message'))
                    <div class="text-green-600 mb-4">{{session()->get('message')}}</div>
                @endif
                <input class= "btn btn-primary" type = "submit" value= "Add Cart">
            </form>
            @endcan

            <div class="border border-danger rounded bg-danger">
                <h6><a href="Home" class="text-decoration-none text-danger p-3 text-light" >Back</a></h6>
            </div>
        </div>
    </div>
@endsection
