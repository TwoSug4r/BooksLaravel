<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;


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
        $request->validate([
            'email' => 'required|unique:post|max:255',
            'name' => 'required|unique:post|string|max:16',
            'password' => ['required', Password::defaults()]
        ]);

        return redirect()->route('users.index')->with('success', 'Авторизация прошла успешно');;
    }
}
