@extends('layouts.layout')

@section('head')
    <title>Кабинет преподавателя</title>
@endsection

@section('content')
    <p class="heading">Расписание преподавателя</p>

    <p class="heading1" id="teacher_name">{{ $user['first_name'] }} {{ $user['name'] }} {{ $user['patronymic'] }}</p>
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
                                <p id="subtxt">{{ $item['select'][$day->id_day]['name_group'] }}</p>
                                @if(isset($item['select'][$day->id_day]['name_cabinet']))
                                    (<span id="num">{{ $item['select'][$day->id_day]['name_cabinet'] }}</span>)
                                @endif
                            @else
                                <p id="name">{{ $item['select'][$day->id_day]['name_item'] }} ({{ $item['select'][$day->id_day]['name_form'] }})</p>
                                <p id="subtxt">{{ $item['select'][$day->id_day]['name_group'] }}</p>
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
