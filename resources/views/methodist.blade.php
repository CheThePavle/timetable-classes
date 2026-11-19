@extends('layouts.layout')

@section('head')
    <title>Кабинет методиста</title>
@endsection

@section('content')

    <p class="heading">Составить расписание</p>
    <p class="description">Выбрать группу:</p>

    <form action="{{ route('methodist') }}" method="get" class="func">
        <div class="selects">
            <div class="sel-block">
                <select name="id_group" class="form-select" id="group" required>
                    <option selected disabled>Группа</option>
                    @foreach($groups as $group)
                        <option {{ isset($_GET['id_group']) && $_GET['id_group'] == $group->id_group ? 'selected' : '' }} value="{{ $group->id_group }}">{{ $group->name_group }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="accept">
            <input class="btn btn-primary" type="submit" value="Показать">
        </div>
    </form>

<div class="overflow">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Время</th>
            @foreach($days as $day)
                <th scope="col">{{ $day->name_day }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <th scope="row">{{ $item['id_lesson'] }}</th>
                <td>{{ $item['start_time_lesson'] }}-{{ $item['end_time_lesson'] }}</td>
                @foreach($days as $day)
                    @if(isset($item['select'][$day->id_day]))
                        <td class="cursor_pointer" onclick="select({{ $item['id_lesson'] }}, {{ $day->id_day }}, this, {{ $item['select'][$day->id_day]['id_schedule'] }})">
                            @if(isset($item['select'][$day->id_day]['name_meeting']))
                                <p id="name">{{ $item['select'][$day->id_day]['name_meeting'] }} ({{ $item['select'][$day->id_day]['name_form'] }})</p>
                                <p id="subtxt">{{ $item['select'][$day->id_day]['last_name'] }} {{ $item['select'][$day->id_day]['name'] }} {{ $item['select'][$day->id_day]['patronymic'] }}</p>
                                @if(isset($item['select'][$day->id_day]['name_cabinet']))
                                    (<span id="num">{{ $item['select'][$day->id_day]['name_cabinet'] }}</span>)
                                @endif
                            @else
                                <p id="name">{{ $item['select'][$day->id_day]['name_item'] }} ({{ $item['select'][$day->id_day]['name_form'] }})</p>
                                <p id="subtxt">{{ $item['select'][$day->id_day]['last_name'] }} {{ $item['select'][$day->id_day]['name'] }} {{ $item['select'][$day->id_day]['patronymic'] }}</p>
                                (<span id="num">{{ $item['select'][$day->id_day]['name_cabinet'] }}</span>)
                            @endif
                        </td>
                    @else
                        <td class="cursor_pointer" onclick="select({{ $item['id_lesson'] }}, {{ $day->id_day }}, this)"></td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="red-msg">{{ session('msg') }}</div>
</div>

    <p class="description">Задать параметры ячейки:</p>
    <form action="{{ route('schedule') }}" method="post" class="func" id="form_schedule">
        @csrf

        <input type="hidden" name="id_lesson" id="id_lesson">
        <input type="hidden" name="id_day" id="id_day">

        <input type="hidden" name="id_group" value="{{ isset($_GET['id_group']) ? $_GET['id_group'] : '' }}">

        <input type="hidden" name="id_schedule" id="id_schedule">

        <div class="sel-block">
            <select class="form-select" id="id_teacher" name="id_teacher">
                <option value="0" selected disabled>Преподаватель</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id_user }}">{{ $teacher->last_name }} {{ $teacher->name }} {{ $teacher->patronymic }}</option>
                @endforeach
            </select>
        </div>

        <div class="sel-block">
            <select class="form-select" id="id_form" name="id_form" onchange="selectMeeting(this)">
                <option value="0" selected disabled>Тип занятия</option>
                @foreach($forms as $form)
                    <option value="{{ $form->id_form }}">{{ $form->name_form }}</option>
                @endforeach
            </select>
        </div>

        <div class="sel-block" id="noSelectMeeting">
            <select class="form-select" id="id_item" name="id_item">
                <option value="0" selected disabled>Название предмета</option>
                @foreach($items as $item)
                    <option value="{{ $item->id_item }}">{{ $item->name_item }}</option>
                @endforeach
            </select>
        </div>
        <div class="sel-block d-none" id="selectMeeting">
            <input class="inputline" maxlength="255" type="text" id="id_meeting" placeholder="Название мероприятия" name="name_meeting">
        </div>

        <div class="sel-block">
            <select class="form-select" id="id_cabinet" name="id_cabinet">
                <option value="0" selected disabled>Аудитория</option>
                @foreach($cabinets as $cabinet)
                    <option value="{{ $cabinet->id_cabinet }}">{{ $cabinet->name_cabinet }}</option>
                @endforeach
            </select>
        </div>

        <div id="clean">
            <button class="btn_clean btn-primary" type="button" onclick="clean()"><img id="id_clean" src="{{ asset('assets/img/eraser.png') }}" height="38px"></button>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/methodist_table.js') }}"></script>
@endsection
