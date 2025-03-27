<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(): View

    {
        $users = User::all(); //Получаем пользователей из модели
        return view('user.index', ['users' => $users]);
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

    public function auth(){
        return view('user.auth');
    }
}
