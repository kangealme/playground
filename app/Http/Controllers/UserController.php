<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function addUser()
    {
        request()->session()->flash('activeMenu', 'Pengguna');
        return view('user.add', [
            'user' => Auth::user(),
        ]);
    }

    public function addRole(User $user)
    {
        request()->session()->flash('activeMenu', 'Pengguna');
        $roleId = Role::where('name', request()->role)->first()->id;
        $user->update([
            'role_id' => $roleId,
        ]);
        $user->save();
        return back();
    }

    public function menu(User $user)
    {
        request()->session()->flash('activeMenu', 'Pengguna');

        return view('user.menu', [
            'user' => Auth::user(),
            'pengguna' => $user,
        ]);
    }

    public function profile(User $user)
    {
        request()->session()->flash('activeMenu', 'Pengguna');

        return view('user.profile', [
            'user' => Auth::user(),
            'pengguna' => $user,
        ]);
    }

    public function saveUser()
    {
        $validated = request()->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required',
            'phone' => 'required',
        ]);

        //upload photo
        $photo = request()->file('photo');

        if ($photo != null) {
            // jika foto ada

            $photoName = Carbon::now()->timestamp . '-' . Str::slug(request()->username, '-') . '.' . $photo->getClientOriginalExtension();
            $photoPath = 'assets/images/pengguna';

            $photo->move($photoPath, $photoName);
        } else {
            $photoName = 'default.png';
        }

        //mendapatkan status aktif pengguna
        if (request()->is_active == 'on') {
            $is_active = true;
        } else {
            $is_active = false;
        }

        //Menyimpan ke database
        User::create([
            'name' => request()->name,
            'username' => request()->username,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            'address' => request()->address,
            'phone' => request()->phone,
            'is_active' => $is_active,
            'photo' => $photoName,
        ]);

        return redirect(route('users'));
    }

    public function users()
    {
        request()->session()->flash('activeMenu', 'Pengguna');
        return view('user.users', [
            'users' => User::all(),
            'user' => Auth::user(),
        ]);
    }

    public function edit(User $user)
    {
        request()->session()->flash('activeMenu', 'Pengguna');

        return view('user.edit', [
            'user' => Auth::user(),
            'pengguna' => $user,
        ]);
    }

    public function update(User $user)
    {
        request()->session()->flash('activeMenu', 'Pengguna');
        request()->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:5',
            'phone' => 'required'
        ]);

        //cek apakah foto dirubah
        if (request()->photo) {
            //hapus foto lama
            File::delete('assets/images/pengguna/' . $user->photo);
            $photo = request()->file('photo');
            $photoName = Carbon::now()->timestamp . '-' . Str::slug(request()->username, '-') . '.' . $photo->getClientOriginalExtension();
            $photoPath = 'assets/images/pengguna';

            $photo->move($photoPath, $photoName);
        } else {
            $photoName = $user->photo;
        }

        //cek apakah user diaktivasi

        if (request()->is_active == 'on') {
            $is_active = 1;
        } else {
            $is_active = 0;
        }

        //update data

        $user->update([
            'name' => request()->name,
            'username' => request()->username,
            'email' => request()->email,
            'password' => request()->password,
            'phone' => request()->phone,
            'address' => request()->address,
            'photo' => $photoName,
            'is_active' => $is_active,
        ]);

        $user->save();

        $pesan = array(
            'title' => 'Info.',
            'text' => 'User ' . $user->username . ' Berhasil diupdate. ',
            'icon' => 'info'
        );

        return redirect(route('users'))->with('pesan', $pesan);
    }

    public function drop(User $user)
    {
        request()->session()->flash('activeMenu', 'Pengguna');
        $photoName = 'assets/images/pengguna/' . $user->photo;

        $user->delete();

        //hapus foto

        File::delete($photoName);

        $pesan = array(
            'title' => 'Info.',
            'text' => 'User ' . $user->username . ' Berhasil dihapus. ',
            'icon' => 'info'
        );

        return redirect(route('users'))->with('pesan', $pesan);
    }

    public function role(User $user)
    {
        request()->session()->flash('activeMenu', 'Pengguna');

        return view('user.role', [
            'user' => Auth::user(),
            'pengguna' => $user,
            'roles' => Role::all()
        ]);
    }

    public function is_active(User $user)
    {
        request()->session()->flash('activeMenu', 'Pengguna');

        $selector = 'is_active' . $user->username;

        if (request()->$selector == "on") {
            $is_active = 1;
        } else {
            $is_active = 0;
        }

        $user->update([
            'is_active' => $is_active,
        ]);
        $user->save();

        $pesan = array(
            'title' => 'Status Aktif',
            'text' => 'Merubah Status Aktif Pengguna',
            'icon' => 'success'
        );

        return redirect(route('users'))->with('pesan', $pesan);
    }
}
