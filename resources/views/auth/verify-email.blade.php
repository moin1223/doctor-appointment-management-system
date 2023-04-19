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
                <span>
                    'Thanks for signing up! Before getting started, could you verify your email address by clicking on
                    the link we just emailed to you? If you didn't receive the email, we will gladly send you another.'

                </span>
                @if (session('status') == 'verification-link-sent')
                <div class="my-3">
                    <span class="text-success">A new verification link has been sent to the email address you provided during registration.</span>
                </div>
               @endif
            <div class="my-3"> 
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-outline-primary outline-0">
                        log out
                    </button>
                </form>

            </div>
          
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit" class="button form-control">
                        Resend Verification Email
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
