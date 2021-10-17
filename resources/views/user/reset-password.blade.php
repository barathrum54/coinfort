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
<form action="{{url("/reset-password")}}" method="post">
    @csrf
    <input type="email" name="email" required>
    <button type="submit">Send Mail</button>
</form>
</body>
</html>
