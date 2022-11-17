<link href="{{ asset('style/Sign.css') }}" rel="stylesheet">
@extends('AdminHeader')

@section('navbar-admin')
     <div class="p-10">
        <h1 class="text-center"> Add Items </h1>
    </div>
    <div class="formAsli">
        <form method="POST" action="/AddItem" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name" name="name" value="{{old('name')}}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <br>
            </div>

            <div class="form-group">
                <label for="image_url">Image File:</label>
                <input type="file" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url">
                @error('image_url')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <br>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <br>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
                @error('price')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <br>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" >
                @error('stock')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <br>
            </div>
            <div class="form-group">
                <button style="cursor:pointer" type="submit" class="btnSubmit">Submit</button>
            </div>
        </form>
    </div>
    @endsection
