@extends('layouts.layout')

@section('head')
    <title>Регистрация</title>
@endsection

@section('content')
    <div class="login">
        <p class="heading">Регистрация</p>
        <form action="{{ route('createUser') }}" method="post">
            @csrf

            <input name="last_name" type="text" maxlength="255" placeholder="Фамилия*" class="inputline" value="{{ old('last_name') ?? '' }}" required></br>
            @error('last_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <input name="name" type="text" maxlength="255" placeholder="Имя*" class="inputline" value="{{ old('name') ?? '' }}" required></br>
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <input name="patronymic" type="text" maxlength="255" placeholder="Отчество*" class="inputline" value="{{ old('patronymic') ?? '' }}" required></br>
            @error('patronymic')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <input name="login" type="text" maxlength="255" placeholder="Логин*" class="inputline" value="{{ old('login') ?? '' }}" required></br>
            @error('login')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <input name="email" type="email" maxlength="255" placeholder="Email*" class="inputline" value="{{ old('email') ?? '' }}" required></br>
            @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <input name="password" type="password" maxlength="255" placeholder="Пароль*" class="inputline" required></br>
            @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <button class="btn btn-primary mainbtn btn1" id="logup-button" type="submit">Зарегистрироваться</button></br>
            <div>Сообщение с обработчика</div>
            <a href="{{ route('login') }}" class="logup-link">Уже есть аккаунт? Войти</a>
        </form>
    </div>
@endsection
