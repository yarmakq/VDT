<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ route('user.register') }}" >
        @csrf
        Логин <input type="text" name="name"> <br>
        Почта<input type="email" name="email"><br>
        Номер телефона<input type="text" name="phone"><br>
        Пароль<input type="password" name="password"><br>
        Подтвердите пароль <input type="password" name="password_confirmation"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>
