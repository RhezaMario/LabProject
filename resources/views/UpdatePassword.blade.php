@extends('template')
@section('contents')
<link href="{{ asset('style/Sign.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<div class = "formulir">
    <div class="form">
        <div class="sign">
            <h1>Update Password</h1>
        </div>
        @if(session()->has('message'))
        <div class="text-green-600 mb-4">{{session()->get('message')}}</div>
        @endif
        <div class="formAsli">
            <form method="POST" action="/updatepassword/{{Auth::user()->id}}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="old_password">Old password</label>
                    <input type="password" class="form-control" placeholder="(5-20 letters)" id="old_password" name="old_password">
                    @error('old_password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                </div>

                <div class="form-group">
                    <label for="new_password">New password</label>
                    <input type="password" class="form-control" placeholder="(5-20 letters)" id="new_password" name="new_password" value="{{old('new_password')}}">
                    @error('new_password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                </div>

                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btnSubmit">Save Update</button>
                </div>
            </form>

        </div>

    </div>


</div>

@endsection
