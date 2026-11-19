@extends('layouts.layout')

@section('head')
    <title>Авторизация</title>
@endsection

@section('content')
    <div class="login">
        <form action="{{ route('auth') }}" method="post">
            @csrf

            <p class="heading">Вход</p>
            <input name="login" type="text" maxlength="255"  placeholder="Логин" class="inputline" value="{{ old('login') ?? '' }}" required></br>
            <input name="password" type="password" maxlength="255" placeholder="Пароль" class="inputline" required></br>
            <button class="btn btn-primary mainbtn btn1" id="login-button" type="submit">Войти</button></br>
            <div>{{ session('msg') }}</div>

            <a href="/register" class="logup-link">Еще нет аккаунта? Зарегистрироваться</a>
        </form>
    </div>
@endsection
