@extends('layouts.layout')

@section('head')
    <title>Кабинет администратора</title>
@endsection

@section('content')
    <p class="heading">Администратор</p>

    <div class="green-msg">{{ session('msg') }}</div>

    <p class="heading2">Добавление</p>
    <div class="adding">
        <form action="{{ route('addGroup') }}" method="post" class="adding_block">
            @csrf

            <p class="heading1">Добавить новую группу</p>

            <div class="forms">
                <select class="selBlock_inner" id="d" name="id_speciality">
                    <option selected disabled>Специальность</option>
                    @foreach($specials as $special)
                        <option value="{{ $special->id_speciality }}">{{ $special->name_speciality }}</option>
                    @endforeach
                </select>
                <input class="inputline" maxlength="255" type="text" id="num_input" placeholder="Номер группы" name="name_group">
                <button type="submit" class="btn1 btn btn-primary">Добавить группу</button>
            </div>
        </form>

        <form action="{{ route('addSpeciality') }}" method="post" class="adding_block">
            @csrf

            <p class="heading1">Добавить новую специальность</p>

            <div class="forms">
                <div class="form">
                    <input class="inputline" maxlength="255" type="text" id="lesson_input" placeholder="Название специальности" name="name_speciality">
                    <button type="submit" class="btn1 btn btn-primary">Добавить специальность</button>
                </div>
            </div>
        </form>

        <form action="{{ route('addItem') }}" method="post" class="adding_block">
            @csrf

            <p class="heading1">Добавить новый предмет</p>

            <div class="forms">
                <div class="form">
                    <input class="inputline" maxlength="255" type="text" id="lesson_input" placeholder="Название предмета" name="name_item">
                    <button type="submit" class="btn1 btn btn-primary">Добавить предмет</button>
                </div>
            </div>
        </form>

        <form action="{{ route('addCabinet') }}" method="post" class="adding_block">
            @csrf

            <p class="heading1">Добавить новую аудиторию</p>

            <div class="forms">
                <div class="form">
                    <input name="name_cabinet" maxlength="255" type="text" placeholder="Номер аудитории" class="inputline">
                    <button type="submit" class="btn1 btn btn-primary">Добавить аудиторию</button>
                </div>
            </div>
        </form>
    </div>
    <br><br>

    <p class="heading2">Изменение</p>

    <form action="{{ route('changeRole') }}" method="post" class="adding_block">
        @csrf

        <p class="heading1">Изменить роль пользователя</p>

        <div class="forms">
            <select class="selBlock_inner" id="d" name="id_user">
                <option selected disabled>Пользователь</option>
                @foreach($users as $user)
                    <option value="{{ $user->id_user }}">{{ $user->login }}</option>
                @endforeach
            </select>
            <select class="selBlock_inner" id="d" name="id_role">
                <option selected disabled>Роль</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id_role }}">{{ $role->name_role }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn1 btn btn-primary">Изменить роль</button>
        </div>
    </form>
    <br><br>

    <p class="heading2">Удаление</p>

    <div class="deleteForm">
        <p class="heading1 ">Удалить специальность</p>
        <form action="{{ route('delSpeciality') }}" method="post" class="deleteForm_inner">
            @csrf
            @method('DELETE')

            <div class="deleteForm_selBlock">
                <select class="selBlock_inner" id="d" name="id_speciality">
                    <option selected disabled>Специальность</option>
                    @foreach($specials as $special)
                        <option value="{{ $special->id_speciality }}">{{ $special->name_speciality }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn1 btn btn-primary">Удалить специальность</button>
            </div>
        </form>

        <p class="heading1 ">Удалить группу</p>
        <form action="{{ route('delGroup') }}" method="post" class="deleteForm_inner">
            @csrf
            @method("DELETE")

            <div class="deleteForm_selBlock">
                <select class="selBlock_inner" id="teacher" name="id_group">
                    <option selected disabled>Группа</option>
                    @foreach($groups as $group)
                        <option value="{{ $group->id_group }}">{{ $group->name_group }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn1 btn btn-primary">Удалить групппу</button>
            </div>
        </form>

        <p class="heading1 ">Удалить предмет</p>
        <form action="{{ route('delItem') }}" method="post" class="deleteForm_inner">
            @csrf
            @method("DELETE")

            <div class="deleteForm_selBlock">
                <select class="selBlock_inner" name="id_item">
                    <option selected disabled>Предмет</option>
                    @foreach($items as $item)
                        <option value="{{ $item->id_item }}">{{ $item->name_item }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn1 btn btn-primary">Удалить предмет</button>
            </div>
        </form>

        <p class="heading1 ">Удалить аудиторию</p>
        <form action="{{ route('delCabinet') }}" method="post" class="deleteForm_inner">
            @csrf
            @method("DELETE")

            <div class="deleteForm_selBlock">
                <select class="selBlock_inner" id="cabinet" name="id_cabinet">
                    <option selected>Аудитория</option>
                    @foreach($cabinets as $cabinet)
                        <option value="{{ $cabinet->id_cabinet }}">{{ $cabinet->name_cabinet }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn1 btn btn-primary">Удалить кабинет</button>
            </div>
        </form>
    </div>
@endsection
