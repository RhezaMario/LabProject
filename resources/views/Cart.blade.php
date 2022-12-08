@extends('template')

@section('contents')
<div class="p-10">
    <h1 class="text-center m-4">My Cart </h1>
</div>

<div class="container-sm d-flex flex-column flex-wrap gap-4 justify-content-center align-items-center ">
    <div class="row row-cols-3 gap-5">
        @foreach ($cartitems as $d)
            <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 18rem;">
                <div class="card-body">

                         <img src="{{asset('storage/'. $d->products->image_url)}}" class="" id="img" width="100%", height="200px" alt="default">
                         <h5 class="card-title mt-2"><b>{{$d->products->name}}</b></h5>
                         <p class="card-text"></p>Rp{{$d->products->price}}</p>
                         <p class="date">Qty: {{$d->quantity}}</p>
                         @php $total += $d->quantity * $d->products->price @endphp
                         @php $qty += $d->quantity @endphp
                         <form action="/CartDelete/{{$d->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class = "btn btn-danger" type="submit">Delete</button>
                        </form>
                        <br>
                            <button class = "btn btn-primary" onclick="window.location.href='/EditCart/{{$d->products->id}}'" >Edit Cart</button>


                </div>
            </div>
         @endforeach

     </div>


</div>
<div class="d-flex justify-content-end m-5">
    <div class="fs-4 pe-4">
        Total Price:{{$total}}
     </div>
     <div class="checkoutbutton">
        <button class= "btn btn-primary" onclick="window.location.href='/Checkout'">CheckOut({{$qty}})</button>
     </div>
</div>

@endsection
