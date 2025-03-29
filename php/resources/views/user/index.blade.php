<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <style>
       table {border-collapse: collapse; width: 100%; }
       th, td { border: 1px solid #ddd; padding: 7px; text-align: center; }
       th { background-color: #f2f2f2; }
       button {padding: 5px 10px; margin-right: 5px;}
    </style>
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


    <table>
        <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>DELETE</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td><form method="post" action="{{ route('users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">delete</button>
                    </form></td>
            @endforeach
        </tbody>
    </table>
</body>