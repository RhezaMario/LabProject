<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('style/Sign.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <div class = "formulir">
        <div class="form">
            <div class="sign">
                <h1>Sign Up</h1>
            </div>

            <div class="formAsli">
                <form method="POST" action="/SignUp">
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
                        <label for="password">Password:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="(5-20 letters)" id="password" name="password" value="{{old('password')}}">
                        @error('password')
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
                        <button style="cursor:pointer" type="submit" class="btnSubmit">Submit</button>
                    </div>

                    <div class="registered">
                        <br>
                        <h3>Already Registered? <a href="/SignIn" class = "redirect">Sign In here</a></h3>
                    </div>


                </form>

            </div>

        </div>


    </div>


</body>
</html>
