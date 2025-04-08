<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" lang="eng">
        <title>Login</title>
    </head>
    <body>
        <h1>Write your name,email and password:</h1>
        <form action="{{ route('user.register') }}" method="post">
            @csrf
            <label for="email">Enter your email:</label>
            <input type="email" id="email" name="email"><br>
            @error('email')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror
            <label for="name">Enter your name:</label>
            <input type="text" id="name" name="name"><br>
            @error('name')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror
            <label for="password">Enter your password:</label>
            <input type="password" id="password" name="password"><br>
            @error('password')
                <span style="color: red;">{{ $message }}</span><br>
            @enderror
            <label>
                <input type="checkbox" name="remember" checked> Запомнить меня
            </label><br>
            <button type="submit">Auth</button>
        </form>
    </body>
</html>