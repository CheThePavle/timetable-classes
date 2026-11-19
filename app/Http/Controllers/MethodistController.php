<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MethodistController extends Controller
{
    public function showMethodist(Request $request) {
        if (Auth::check() && Auth::user()->isMethodist()) {
            $data = $request->all();

            $times = DB::select("SELECT
                id_lesson,
                DATE_FORMAT(start_time_lesson, '%H:%i') as start_time_lesson,
                DATE_FORMAT(end_time_lesson, '%H:%i') as end_time_lesson
            FROM `time_lesson`");

            $days = DB::select("SELECT * FROM `day_week`");
            $groups = DB::select("SELECT * FROM `group`");
            $teachers = DB::select("SELECT id_user, last_name, name, patronymic FROM `user` WHERE id_role = ?", [1]);
            $forms = DB::select("SELECT * FROM `form`");
            $items = DB::select("SELECT * FROM `item`");
            $cabinets = DB::select("SELECT * FROM `cabinet`");

            $info = [];
            if (isset($data['id_group'])) {
                $info = DB::select("SELECT
                s.id_schedule,
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
                                'id_schedule' => $col->id_schedule,
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

            return view('methodist', [
                'groups' => $groups,
                'days' => $days,
                'data' => $data,
                'teachers' => $teachers,
                'forms' => $forms,
                'items' => $items,
                'cabinets' => $cabinets,
            ]);
        }

        return redirect(route('login'));
    }

    public function schedule(Request $request) { // универсальный обработчик на добавление или удаление
        $data = $request->all();

        if (isset($data['id_schedule'])) { // на удаление
            if ($data['id_schedule'] != 0) DB::delete("DELETE FROM `schedule` WHERE `schedule`.`id_schedule` = ?", [$data['id_schedule']]);
            return redirect(url()->previous());
        }

        // проверка не более 4 пар для одной группы
        $checkGroup4 = DB::select("SELECT COUNT(id_schedule) as schedule FROM `schedule`
            WHERE id_day = ? AND id_group = ?", [
            $data['id_day'],
            $data['id_group'],
        ]);
        if ($checkGroup4[0]->schedule > 3) {
            return redirect(url()->previous())
                ->with(['msg' => 'Не более 4 пар в день для группы']);
        }

        // проверка один преподаватель один день
        $checkTeacherItemDay = DB::select("SELECT g.name_group
            FROM `schedule` as s
            JOIN `group` as g ON g.id_group = s.id_group
            JOIN item as i ON i.id_item = s.id_item
            WHERE s.id_day = ? AND s.id_lesson = ? AND s.id_teacher = ?", [
            $data['id_day'],
            $data['id_lesson'],
            $data['id_teacher'],
        ]);
        if (count($checkTeacherItemDay) > 0 && $data['id_form'] != 3) {
            return redirect(url()->previous())
                ->with(['msg' => 'У этого преподавателя уже стоит пара с другой группой ' . $checkTeacherItemDay[0]->name_group]);
        }

        DB::insert("INSERT INTO `schedule` (`id_day`, `id_lesson`, `id_cabinet`, `id_group`, `id_form`, `id_item`, `id_teacher`, `name_meeting`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [
            $data['id_day'],
            $data['id_lesson'],
            isset($data['id_cabinet']) ? $data['id_cabinet'] : null,
            $data['id_group'],
            $data['id_form'],
            isset($data['id_item']) ? $data['id_item'] : null,
            $data['id_teacher'],
            isset($data['name_meeting']) ? $data['name_meeting'] : null,
        ]);

        return redirect(url()->previous());
    }
}
