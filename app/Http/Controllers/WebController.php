<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function showIndex() {
        return view('index');
    }

    public function showLk() {
        if (Auth::user()->isMethodist()) return redirect(route('methodist'));
        if (Auth::user()->isAdmin()) return redirect(route('admin'));

        if (Auth::check() && Auth::user()->isTeacher()) {
            $times = DB::select("SELECT
                id_lesson,
                DATE_FORMAT(start_time_lesson, '%H:%i') as start_time_lesson,
                DATE_FORMAT(end_time_lesson, '%H:%i') as end_time_lesson
            FROM `time_lesson`");

            $days = DB::select("SELECT * FROM `day_week`");

            $info = DB::select("SELECT
                s.id_day,
                s.id_lesson,

                s.name_meeting,
                i.name_item,
                g.name_group,
                c.name_cabinet,
                f.name_form

            FROM `user` as u

            JOIN `schedule` as s ON s.id_teacher = u.id_user
            JOIN `item` as i ON i.id_item = s.id_item
            JOIN `group` as g ON g.id_group = s.id_group
            JOIN `form` as f ON f.id_form = s.id_form
            JOIN `cabinet` as c ON c.id_cabinet = s.id_cabinet

            WHERE u.id_user = ?", [Auth::user()->id_user]);


            $data = [];//информация о вермени пары и о самой паре
            foreach ($times as $time) {
                $select = [];//массив пары

                foreach($info as $col) {
                    foreach($days as $day) {
                        if ($time->id_lesson === $col->id_lesson && $day->id_day === $col->id_day) {
                            $select[$day->id_day] = [
                                'id_day' => $day->id_day,
                                'name_meeting' => $col->name_meeting,
                                'name_form' => $col->name_form,
                                'name_item' => $col->name_item, //тут он заполняется в 4 строки: день,название пары,группа,номер кабинета
                                'name_group' => $col->name_group,
                                'name_cabinet' => $col->name_cabinet,
                            ];
                        }
                    }
                }

                $data[$time->id_lesson] = [
                    'id_lesson' => $time->id_lesson,
                    'start_time_lesson' => $time->start_time_lesson,
                    'end_time_lesson' => $time->end_time_lesson,
                    'select' => $select
                ];
            }

            return view('lk', [
                'user' => [
                    'first_name' => Auth::user()->last_name,
                    'name' => Auth::user()->name,
                    'patronymic' => Auth::user()->patronymic,
                ],
                'days' => $days,
                'data' => $data,
            ]);
        }

        return redirect(route('login'));
    }

    public function showTable(Request $request) {
        $data = $request->all();

        $times = DB::select("SELECT
                id_lesson,
                DATE_FORMAT(start_time_lesson, '%H:%i') as start_time_lesson,
                DATE_FORMAT(end_time_lesson, '%H:%i') as end_time_lesson
            FROM `time_lesson`");

        $days = DB::select("SELECT * FROM `day_week`");
        $groups = DB::select("SELECT * FROM `group`");

        $info = [];
        if (isset($data['id_group'])) {
            $info = DB::select("SELECT
                s.id_day,
                s.id_lesson,

                null as name_meeting,
                i.name_item,
                f.name_form,
                u.last_name,
                name,
                patronymic,
                c.name_cabinet

            FROM `user` as u

            JOIN `schedule` as s ON s.id_teacher = u.id_user
            JOIN `item` as i ON i.id_item = s.id_item
            JOIN `form` as f ON f.id_form = s.id_form
            JOIN `group` as g ON g.id_group = s.id_group
            JOIN `cabinet` as c ON c.id_cabinet = s.id_cabinet

            WHERE s.id_group = ?", [$data['id_group']]);

            $meetingInfo = DB::select("SELECT
                s.id_schedule,
                s.id_day,
                s.id_lesson,

                s.name_meeting,
                null as name_item,
                f.name_form,
                u.last_name,
                name,
                patronymic,
                null as name_cabinet

                FROM `user` as u

                JOIN `schedule` as s ON s.id_teacher = u.id_user
                JOIN `form` as f ON f.id_form = s.id_form
                JOIN `group` as g ON g.id_group = s.id_group

                WHERE s.id_group = ? AND name_meeting IS NOT NULL", [$data['id_group']]);

            $info = array_merge($info, $meetingInfo);
        }

        $data = [];//информация о вермени пары и о самой паре
        foreach ($times as $time) {
            $select = [];//массив пары

            foreach($info as $col) {
                foreach($days as $day) {
                    if ($time->id_lesson === $col->id_lesson && $day->id_day === $col->id_day) {
                        $select[$day->id_day] = [
                            'id_day' => $day->id_day,
                            'name_meeting' => $col->name_meeting,
                            'name_form' => $col->name_form,
                            'last_name' => $col->last_name,
                            'name' => $col->name,
                            'patronymic' => $col->patronymic,
                            'name_item' => $col->name_item, //тут он заполняется в 4 строки: день,название пары,группа,номер кабинета
                            'name_cabinet' => $col->name_cabinet,
                        ];
                    }
                }
            }

            $data[$time->id_lesson] = [
                'id_lesson' => $time->id_lesson,
                'start_time_lesson' => $time->start_time_lesson,
                'end_time_lesson' => $time->end_time_lesson,
                'select' => $select
            ];
        }

        return view('table', [
            'groups' => $groups,
            'days' => $days,
            'data' => $data,
        ]);
    }
}
