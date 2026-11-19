@extends('layouts.layout')

@section('head')
    <title>Главная страница</title>
@endsection

@section('content')
    <div class="main">
        <div class="links">
            <p class="heading head-margin">Расписание для студентов и преподавателей</p>
            <a class="btn btn-primary mainbtn btn1" href="{{ route('table') }}" role="button">Я студент</a><br>
            <a class="btn btn-primary mainbtn" href="{{ route('register') }}" role="button">Я преподаватель</a>
        </div>
        <div><img class="img-main" src="{{ asset('assets/img/main.png') }}"></div>
    </div>
@endsection
