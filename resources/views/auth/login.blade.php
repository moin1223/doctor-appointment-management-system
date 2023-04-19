<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,300&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('css/form/login.css') }}>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 login-form">
                <h4>LOGIN FORM</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="row g-3 mt-3">
                    @csrf
                    <input type="hidden" name="device_token" id="device_token">
                    {{-- <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="moin@gmail.com"
                        @if (Cookie::has('email')) value="{{Cookie::get('email')}}" @endif>
                    </div> --}}
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="moin@gmail.com">
                    </div>
                    {{-- <div class="col-12">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4"
                            placeholder="******" @if (Cookie::has('password')) value="{{Cookie::get('password')}}" @endif>
                    </div> --}}
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4"
                            placeholder="******">
                    </div>
                    <div class="col-12 mt-4 d-flex justify-content-between">
                        {{-- <div class="form-check">
                          <input class="form-check-input" name="rememberme" type="checkbox" @if (Cookie::has('email'))checked  
                          @endif id="gridCheck">
                          <label class="form-check-label" for="gridCheck">
                            Remember Me
                          </label>
                        </div> --}}
                        <div class="mb-3">
                            <a class="ms-2 text-dark" href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="button form-control">Sign In</button>
                    </div>
                </form>
                <div class="mt-4">
                    <p>Don't have an account?<a class="ms-2" href="{{ route('register') }}">Create an Account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!---------------- jquery -------------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
