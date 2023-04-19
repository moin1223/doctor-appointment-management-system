<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>forgot password Email</h1> 
    <p>You  can reset  password  form below link: </p>
    <a href="{{route('reset-password-show', $token)}}">Reset your password</a>
    
</body>
</html>