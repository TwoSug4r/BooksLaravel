<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(): View

    {
        $users = User::all(); //Получаем пользователей из модели
        return view('user.index', ['users' => $users]);
    }

    public function auth(){
        return view('user.auth');
    }

    /**

     * Show the profile for a given user.

     */
    public function show($id)
    {
        $user = User::find($id); // Получаем пользователя из модели
        if (!$user) {
            return "Пользователь не найден";
        }
        return view('user.show', ['user' => $user]); // Передаем в представление
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users|max:255',
            'name' => 'required|string|unique:users|max:16',
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), // Хешируем пароль
        ]);

        Auth::login($user);

        return redirect()->route('users.index')->with('success', 'Вы успешно вошли!');
    }
}
