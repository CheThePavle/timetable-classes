<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function showRegister() { // страница регистрации
        if (Auth::check()) return redirect(route('lk'));

        return view('register');
    }

    public function showLogin() { // страница авторизации
        if (Auth::check()) return redirect(route('lk'));

        return view('login');
    }

    public function register(Request $request) { // обработчик регистрации
        $data = $request->all();

        $fields = Validator::make($data, [
            'last_name' => 'required|max:255',
            'name' => 'required|max:255',
            'patronymic' => 'required|max:255',
            'login' => 'required|min:4|max:255|unique:user,login',
            'email' => 'required|email|max:255|unique:user,email',
            'password' => 'required|min:8|max:20',
        ]);
        if ($fields->fails()) {
            return redirect(url()->previous()) // вернуться на прошлую страницу
                ->withErrors($fields) // вернуть ошибки валидации
                ->withInput(); // вернуть значения переданных полей, чтобы можно было пользоваться old() в blade
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        User::create($data);

        return redirect(route('login'))
            ->with(['msg' => 'Успешная регистрация']); // сохраняет данные в сессию и отправляет на страницу, будет храниться в session('msg'), после первого запуска, автоматически сообщение стирается
    }

    public function login(Request $request) {// обработчик авторизации
        $data = $request->all();

        $fields = Validator::make($data, [
            'login' => 'required',
            'password' => 'required',
        ]);
        if ($fields->fails()) {
            return redirect(url()->previous()) // вернуться на прошлую страницу
            ->withErrors($fields) // вернуть ошибки валидации
            ->withInput(); // вернуть значения переданных полей, чтобы можно было пользоваться old() в blade
        }

        $user = User::where('login', $data['login']) // SELECT * FROM user WHERE login = $data['login']
            ->first();
        if (!$user) {
            return redirect(url()->previous())
                ->with(['msg' => 'Неверный логин'])
                ->withInput();
        }

        $check_password = password_verify($data['password'], $user['password']);
        if (!$check_password) {
            return redirect(url()->previous())
                ->with(['msg' => 'Неверный пароль'])
                ->withInput();
        }

        Auth::login($user); // создаем сессию с данными нашего пользователя

        if ($user->isTeacher()) return redirect(route('lk'));
        if ($user->isMethodist()) return redirect(route('methodist'));
        if ($user->isAdmin()) return redirect(route('admin'));

        return redirect(route('index'));
    }

    public function logout() {// обработчик выхода
        if (Auth::check()) Auth::logout();
        return redirect(route('login'));
    }
}
