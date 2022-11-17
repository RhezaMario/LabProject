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
@if(session()->has('success')){
    <div class="notif">
        {{session('success')}}
    </div>
}
@endif
@if(session()->has('loginError')){
    <div class="notif">
        {{session('loginError')}}
    </div>
}
@endif
    <div class = "formulir">
        <div class="form">
            <div class="sign">
                <h1>Sign In</h1>
            </div>
            <div class="formAsli">
                <form method="POST" action="/SignIn">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control @error('email') is-invalid
                        @enderror" id="email" name="email" autofocus required>
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                        @enderror
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="(5-20 letters)" id="password" name="password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                        @enderror
                        <br>
                    </div>

                        <input type="checkbox" id="check" name="check" value="check">
                        <label for="checkbox"> Remember me</label>
                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" class="btnSubmit">Submit</button>
                    </div>

                    <div class="registered">
                        <br>
                        <h3>Not Registered yet? <a href="/SignUp" class = "redirect">Register Here</a></h3>
                    </div>


                </form>

            </div>

        </div>


    </div>


</body>
</html>
