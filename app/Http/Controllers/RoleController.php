<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        request()->session()->flash('activeMenu', 'Admin');
        return view('role.roles', [
            'user' => Auth::user(),
            'roles' => Role::all(),
        ]);
    }

    public function addRole()
    {
        request()->session()->flash('activeMenu', 'Admin');

        return view('role.add', [
            'user' => Auth::user(),
            'role' => Role::all(),
        ]);
    }

    public function saveRole()
    {
        request()->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create([
            'name' => request()->name,
            'identifier' => Str::slug(request()->name, '-'),
            'desc' => request()->desc,
        ]);

        $pesan = array(
            'title' => 'Tambah Role',
            'text' => 'Berhasil Menambahkan Role',
            'icon' => 'success'
        );

        return redirect(route('roles'))->with('pesan', $pesan);
    }

    public function edit(Role $role)
    {
        request()->session()->flash('activeMenu', 'Admin');
        return view('role.edit', [
            'user' => Auth::user(),
            'roles' => Role::all(),
            'userRole' => $role,
        ]);
    }

    public function update()
    {
        request()->session()->flash('activeMenu', 'Admin');
        request()->validate([
            'name' => 'required',
            'identifier' => Str::slug(request()->name, '-'),
            'desc' => 'required'
        ]);

        Role::where('id', request()->id)->update([
            'name' => request()->name,
            'desc' => request()->desc
        ]);

        $pesan = array(
            'title' => 'Edit Role',
            'text' => 'Berhasil Merubah Role',
            'icon' => 'success'
        );

        return redirect(route('roles'))->with('pesan', $pesan);
    }

    public function drop(Role $role)
    {
        $role->delete();

        $pesan = array(
            'title' => 'Hapus Role',
            'text' => 'Berhasil Menghapus Role',
            'icon' => 'success'
        );

        return redirect(route('roles'))->with('pesan', $pesan);
    }

    public function role(User $user)
    {
        return view('user.role', [
            'user' => Auth::user(),
            'pengguna' => $user,
            'roles' => Role::all(),
        ]);
    }
}
