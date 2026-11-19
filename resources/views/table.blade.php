@extends('layouts.layout')

@section('head')
    <title>Расписание занятий</title>
@endsection

@section('content')
    <p class="heading">Расписание</p>

    <form action="{{ route('table') }}" method="get" class="func">
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
                        <td>
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
                        <td></td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
