<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showAdmin() {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $specials = DB::select("SELECT * FROM `speciality`");
            $groups = DB::select("SELECT * FROM `group`");
            $items = DB::select("SELECT * FROM `item`");
            $cabinets = DB::select("SELECT * FROM `cabinet`");

            $users = DB::select("SELECT id_user, login FROM `user`");
            $roles = DB::select("SELECT * FROM `user_role`");

            return view('admin', [
                'specials' => $specials,
                'groups' => $groups,
                'items' => $items,
                'cabinets' => $cabinets,
                'users' => $users,
                'roles' => $roles,
            ]);
        }

        return redirect(route('login'));
    }

    public function addGroup(Request $request) {
        if (Auth::check() && !Auth::user()->isAdmin()) return redirect(route('login'));

        $data = $request->all();

        if (!isset($data['id_speciality']) || !isset($data['name_group'])) {
            return redirect(url()->previous())
                ->with(['msg' => 'Данные заполнены не все']);
        }

        DB::insert("INSERT INTO `group` (`id_speciality`, `name_group`) VALUES (?, ?)", [
            $data['id_speciality'],
            $data['name_group'],
        ]);

        return redirect(url()->previous())
            ->with(['msg' => 'Группа успешно добавлена']);
    }

    public function addSpeciality(Request $request) {
        if (Auth::check() && !Auth::user()->isAdmin()) return redirect(route('login'));

        $data = $request->all();

        if (!isset($data['name_speciality'])) {
            return redirect(url()->previous())
                ->with(['msg' => 'Данные заполнены не все']);
        }

        DB::insert("INSERT INTO `speciality` (`name_speciality`) VALUES (?)", [
            $data['name_speciality'],
        ]);

        return redirect(url()->previous())
            ->with(['msg' => 'Специальность успешно добавлена']);
    }

    public function addItem(Request $request) {
        if (Auth::check() && !Auth::user()->isAdmin()) return redirect(route('login'));

        $data = $request->all();

        if (!isset($data['name_item'])) {
            return redirect(url()->previous())
                ->with(['msg' => 'Данные заполнены не все']);
        }

        DB::insert("INSERT INTO `item` (`name_item`) VALUES (?)", [
            $data['name_item'],
        ]);

        return redirect(url()->previous())
            ->with(['msg' => 'Предмет успешно добавлен']);
    }

    public function addCabinet(Request $request) {
        if (Auth::check() && !Auth::user()->isAdmin()) return redirect(route('login'));

        $data = $request->all();

        if (!isset($data['name_cabinet'])) {
            return redirect(url()->previous())
                ->with(['msg' => 'Данные заполнены не все']);
        }

        DB::insert("INSERT INTO `cabinet` (`name_cabinet`) VALUES (?)", [
            $data['name_cabinet'],
        ]);

        return redirect(url()->previous())
            ->with(['msg' => 'Кабинет успешно добавлен']);
    }

    public function delSpeciality(Request $request) {
        if (Auth::check() && !Auth::user()->isAdmin()) return redirect(route('login'));

        $data = $request->all();

        if (!isset($data['id_speciality'])) {
            return redirect(url()->previous())
                ->with(['msg' => 'Данные заполнены не все']);
        }

        DB::delete("DELETE FROM `speciality` WHERE `speciality`.`id_speciality` = ?", [
            $data['id_speciality'],
        ]);

        return redirect(url()->previous())
            ->with(['msg' => 'Специальность успешно удалена']);
    }

    public function delGroup(Request $request) {
        if (Auth::check() && !Auth::user()->isAdmin()) return redirect(route('login'));

        $data = $request->all();

        if (!isset($data['id_group'])) {
            return redirect(url()->previous())
                ->with(['msg' => 'Данные заполнены не все']);
        }

        DB::delete("DELETE FROM `group` WHERE `group`.`id_group` = ?", [
            $data['id_group'],
        ]);

        return redirect(url()->previous())
            ->with(['msg' => 'Группа успешно удалена']);
    }

    public function delItem(Request $request) {
        if (Auth::check() && !Auth::user()->isAdmin()) return redirect(route('login'));

        $data = $request->all();

        if (!isset($data['id_item'])) {
            return redirect(url()->previous())
                ->with(['msg' => 'Данные заполнены не все']);
        }

        DB::delete("DELETE FROM `item` WHERE `item`.`id_item` = ?", [
            $data['id_item'],
        ]);

        return redirect(url()->previous())
            ->with(['msg' => 'Предмет успешно удален']);
    }

    public function delCabinet(Request $request) {
        if (Auth::check() && !Auth::user()->isAdmin()) return redirect(route('login'));

        $data = $request->all();

        if (!isset($data['id_cabinet'])) {
            return redirect(url()->previous())
                ->with(['msg' => 'Данные заполнены не все']);
        }

        DB::delete("DELETE FROM `cabinet` WHERE `cabinet`.`id_cabinet` = ?", [
            $data['id_cabinet'],
        ]);

        return redirect(url()->previous())
            ->with(['msg' => 'Кабинет успешно удален']);
    }

    public function changeRole(Request $request) {
        if (Auth::check() && !Auth::user()->isAdmin()) return redirect(route('login'));

        $data = $request->all();

        if (!isset($data['id_role']) || !isset($data['id_user'])) {
            return redirect(url()->previous())
                ->with(['msg' => 'Данные заполнены не все']);
        }

        DB::update("UPDATE `user` SET `id_role` = ? WHERE `user`.`id_user` = ?", [
            $data['id_role'],
            $data['id_user'],
        ]);

        return redirect(url()->previous())
            ->with(['msg' => 'Роль успешно изменена']);
    }
}
