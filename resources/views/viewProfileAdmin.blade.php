<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('style/viewProfile.css') }}" rel="stylesheet" href="">
</head>
<body>
    @include('AdminHeader')

    <div class = "profiles">
        <div class="prof">
            <div class="sign">
                <h1>My Profile</h1>
            </div>
            <div class="status">
                <h2>admin</h2>
            </div>
            <div class="information">

                    <div class="form-group">
                        <h4>{{ $profile->name }}</h2>
                    </div>

                    <div class="form-group">
                        <h5>{{ $profile->email }}</h3>
                    </div>

                    <div class="form-group">
                        <h5>{{ $profile->address }}</h3>
                    </div>

                    <div class="form-group">
                        <h5>{{ $profile->phone }}</h3>
                        <br>
                    </div>

            </div>

            <div class="edit">
                <div class="edit2">
                    <h6><a href="" class = "redirect">Edit Password</a></h6>
                </div>
            </div>


        </div>


    </div>

</body>
</html>
