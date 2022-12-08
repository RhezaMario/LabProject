@include('template')
<link href="{{ asset('style/Sign.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<div class = "formulir">
    <div class="form">
        <div class="sign">
            <h1>Update Profile</h1>
        </div>
        @if(session()->has('message'))
        <div class="text-green-600 mb-4">{{session()->get('message')}}</div>
        @endif
        <div class="formAsli">
            <form method="POST" action="/updateprofile">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">UserName</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="(5-20 letters)" id="name" name="name" value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                </div>

                <div class="form-group">
                    <label for="phonenumber">Phone Number:</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder = "(10-13 letters)"id="phone" name="phone" value="{{old('phone')}}">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                </div>

                <div class="form-group">
                    <label for="Address"><Address></Address>Address:</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="(min 5 letters)" id="address" name="address" value="{{old('address')}}">
                    @error('address')
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

        <div class="back">
            <h6><a href="Profile"  class="text-decoration-none text-danger">Back</a></h6>
        </div>

    </div>

</div>
