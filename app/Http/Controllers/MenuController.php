<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    public function index()
    {
        request()->session()->flash('activeMenu', 'Admin');

        return view('menu.menus', [
            'user' => Auth::user(),
            'menus' => Menu::all(),
            'roles' => Role::all(),
        ]);
    }

    public function addMenu()
    {
        request()->session()->flash('activeMenu', 'Admin');

        return view('menu.add', [
            'user' => Auth::user(),
            'roles' => Role::all(),
        ]);
    }

    public function saveMenu()
    {
        request()->validate([
            'role_id' => 'required',
            'name' => 'required',
            'icon' => 'required',
            'link' => 'required',
        ]);

        Menu::create([
            'role_id' => request()->role_id,
            'name' => request()->name,
            'identifier' => Str::slug(request()->name),
            'icon' => request()->icon,
            'link' => request()->link,
            'desc' => request()->desc,
        ]);

        $pesan = array(
            'title' => 'Tambah Menu',
            'text' => 'Berhasil Menambahkan Menu',
            'icon' => 'success'
        );

        return redirect(route('menus'))->with('pesan', $pesan);
    }

    public function edit(Menu $menu)
    {
        request()->session()->flash('activeMenu', 'Admin');

        return view('menu.edit', [
            'user' => Auth::user(),
            'roles' => Role::all(),
            'menu' => $menu,
        ]);
    }

    public function update(Menu $menu)
    {
        request()->session()->flash('activeMenu', 'Admin');
        request()->validate([
            'role_id' => 'required',
            'name' => 'required',
            'icon' => 'required',
            'link' => 'required',
        ]);

        $menu->update([
            'role_id' => request()->role_id,
            'name' => request()->name,
            'identifier' => Str::slug(request()->name),
            'icon' => request()->icon,
            'link' => request()->link,
            'desc' => request()->desc,
        ]);

        $pesan = array(
            'title' => 'Update Menu',
            'text' => 'Berhasil Update Menu',
            'icon' => 'success'
        );

        return redirect(route('menus'))->with('pesan', $pesan);
    }

    public function drop(Menu $menu)
    {
        $menu->delete();

        $pesan = array(
            'title' => 'Hapus Menu',
            'text' => 'Berhasil Menghapus Menu',
            'icon' => 'success'
        );

        return redirect(route('menus'))->with('pesan', $pesan);
    }
}
