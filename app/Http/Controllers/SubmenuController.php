<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubmenuController extends Controller
{
    public function index()
    {
        request()->session()->flash('activeMenu', 'Admin');
        return view('submenu.submenus', [
            'user' => Auth::user(),
            'submenus' => Submenu::all()
        ]);
    }

    public function add()
    {
        request()->session()->flash('activeMenu', 'Admin');
        return view('submenu.add', [
            'user' => Auth::user(),
            'menus' => Menu::all(),
        ]);
    }

    public function save()
    {
        request()->session()->flash('activeMenu', 'Admin');
        request()->validate([
            'name' => 'required',
            'identifier' => Str::slug(request()->name, '-'),
            'icon' => 'required',
            'link' => 'required',
            'menu_id' => 'required'
        ]);

        Submenu::create([
            'name' => request()->name,
            'identifier' => Str::slug(request()->name, '-'),
            'icon' => request()->icon,
            'link' => request()->link,
            'menu_id' => request()->menu_id,
            'desc' => request()->desc,
        ]);

        $pesan = array(
            'title' => 'Tambah Submenu',
            'text' => 'Berhasil Menambahkan Submenu',
            'icon' => 'success'
        );

        return redirect(route('submenus'))->with('pesan', $pesan);
    }

    public function edit(Submenu $submenu)
    {
        request()->session()->flash('activeMenu', 'Admin');

        return view('submenu.edit', [
            'user' => Auth::user(),
            'menus' => Menu::all(),
            'submenu' => $submenu,
        ]);
    }

    public function update(Submenu $submenu)
    {
        request()->session()->flash('activeMenu', 'Admin');
        request()->validate([
            'name' => 'required',
            'identifier' => Str::slug(request()->name, '-'),
            'icon' => 'required',
            'link' => 'required',
            'menu_id' => 'required'
        ]);

        $submenu->update([
            'name' => request()->name,
            'identifier' => Str::slug(request()->name, '-'),
            'icon' => request()->icon,
            'link' => request()->link,
            'menu_id' => request()->menu_id,
            'desc' => request()->desc,
        ]);

        $pesan = array(
            'title' => 'Update Submenu',
            'text' => 'Berhasil Update Submenu',
            'icon' => 'success'
        );

        return redirect(route('submenus'))->with('pesan', $pesan);
    }

    public function drop(Submenu $submenu)
    {
        $submenu->delete();

        $pesan = array(
            'title' => 'Hapus Submenu',
            'text' => 'Berhasil Menghapus Submenu',
            'icon' => 'success'
        );
        return redirect(route('submenus'))->with('pesan', $pesan);
    }

    public function aktivasi(Submenu $submenu)
    {
        request()->session()->flash('activeMenu', 'Admin');

        if (request()->is_active) {
            $textStatusAktiv = 'Mengaktivkan';
            $submenu->update([
                'is_active' => 1,
            ]);
        } else {
            $textStatusAktiv = 'Menonaktivkan';
            $submenu->update([
                'is_active' => 0,
            ]);
        }

        $submenu->save();

        $pesan = array(
            'title' => 'Merubah Status Aktiv Submenu',
            'text' => 'Berhasil ' . $textStatusAktiv . ' Submenu',
            'icon' => 'success',
        );

        return redirect(route('submenus'))->with('pesan', $pesan);
    }
}
