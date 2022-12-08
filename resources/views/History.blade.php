@extends('template')

@section('contents')
<div class="text-center text-dark p-4 fs-1">
    <h1>Check What You've Bought!</h1>
</div>

{{-- @for ($i = 0; $i < 2; $i++)
<div>
    <div class="bg-light text-dark fs-3 ps-4 pb-5">
    </div>


    @endfor --}}

@foreach ($transaction as $t)
    {{$t->transaction_date}}
    @foreach ($t->details as $r)
        <div class="text">
            @php $total += $r->quantity * $r->products->price @endphp
           <p> {{$r->quantity}} pc(s) {{$r->products->name}} Rp.{{$r->products->price}}
        </div>
    @endforeach
    <div class="total">
        <p> Total Price: {{$total}}
            @php $total = 0 @endphp
        <p>
    </div>
@endforeach



{{-- <div class="container-sm d-flex flex-column flex-wrap gap-4 justify-content-center align-items-center ">
    <div class="row row-cols-3 gap-5">
        @foreach ($Data as $d)

            <div class="card shadow-sm p-3 mb-5 bg-white rounded" style="width: 18rem;">
                <div class="card-body">

                         <img src="{{asset('storage/'. $d->image_url)}}" class="" id="img" width="100%", height="200px" alt="default">
                         <h5 class="card-title mt-2"><b>title</b></h5>
                         <p class="card-text"></p>Rp </p>
                         <p class="card-text"></p>Total Price </p>
                </div>
            </div>
         @endforeach
     </div>
</div> --}}
@endsection
