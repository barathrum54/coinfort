<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{url("/reset-password/new-password")}}" method="post">
    @csrf
    <input type="hidden" name="token" value="{{$user->reset_password_token}}">
    <input type="email" name="email">
    <input type="password" name="password">
    <button type="submit">Send</button>
</form>
</body>
</html>
