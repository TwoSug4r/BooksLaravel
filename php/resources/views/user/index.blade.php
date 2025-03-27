<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>
    <h1>List Users</h1>
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <a href="/">Welcome page</a><br>
    <a href="/users/auth">Authorization</a><br>
</body>