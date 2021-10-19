<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Input\Input;

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

    public function saveMenuAjax(Request $request)
    {
        $menu = Menu::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'identifier' => Str::slug($request->name, '-'),
            'icon' => $request->icon,
            'link' => $request->link,
            'desc' => $request->desc
        ]);

        if($menu)
        {
            return response()->json([
                'success' => true,
                'message' => 'Tambah Data Berhasil'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Tambah Data Gagal'
            ], 400);
        }
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
