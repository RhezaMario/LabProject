@extends('template')
@section('contents')
<div class="text-center text-dark p-4 fs-1">
    <h1>Search Your Favourite Clothes!</h1>
</div>
<div class="ms-3 me-3">
    <form action="/Search" class="d-flex">
    @csrf
    <input class="form-control me-2" type="search" name="name" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
</div>

<div class="container-sm d-flex flex-column flex-wrap gap-4 justify-content-center align-items-center mt-5">
    <div class="row row-cols-3 gap-5">
        @foreach ($products as $p)
            <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 18rem;">
                <div class="card-body">
                        <img src="{{asset('storage/'. $p->image_url)}}" class="" id="img" width="100%", height="200px" alt="default">
                        <h5 class="card-title mt-2"><b>{{$p->name}}</b></h5>
                        <p class="card-text"></p>Rp{{$p->price}}</p>
                </div>
            </div>
        @endforeach
    </div>
        <div style="margin: 2rem">
            {{$products->links()}}
        </div>
</div>

@endsection
