<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Thank u for registiration, {{$user->username}},
    This is your verification link:
        <a href="http://127.0.0.1:8000/email-verification/{{$user->token}}">Link</a>
</body>
</html>
