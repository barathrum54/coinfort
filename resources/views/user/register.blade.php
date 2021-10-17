<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if(Session::get("success"))
    <p>{{Session::get("success")}}</p>
@endif
<form action="{{url("/register")}}" method="post">
    @csrf
    username
    <input type="text" name="username" required>
    password
    <input type="password" name="password" required>
    descriptions
    <input type="text" name="descriptions" required>
    email
    <input type="email" name="email" required>
    <button type="submit">Register</button>
</form>
</body>
</html>
