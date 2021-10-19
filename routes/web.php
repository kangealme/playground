<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\UserController;
use App\Models\Submenu;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login_form'])->name('login');
    Route::get('/login', [AuthController::class, 'login_form'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Dashboard
    Route::get('/dashboard/satu', [HomeController::class, 'dashboardSatu'])->name('dashboard.satu');
    Route::get('/dashboard/dua', [HomeController::class, 'dashboardDua'])->name('dashboard.dua');

    //pengguna
    Route::get('/user/add/', [UserController::class, 'addUser'])->name('user.add');
    Route::post('/user/add', [UserController::class, 'saveUser'])->name('user.save');
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::get('/user/profile/{user:username}', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/edit/{user:username}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{user:username}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/del/{user:username}', [UserController::class, 'drop'])->name('user.del');
    Route::post('/user/addRole/{user:username}', [UserController::class, 'addRole'])->name('user.addRole');
    Route::get('/user/menu/{user:username}', [UserController::class, 'menu'])->name('user.menu');
    Route::get('/user/role/{user:username}', [UserController::class, 'role'])->name('user.role');
    Route::put('/user/is_active/{user:username}', [UserController::class, 'is_active'])->name('user.is_active');

    //Role
    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::get('/role/add', [RoleController::class, 'addRole'])->name('role.add');
    Route::post('/role/add', [RoleController::class, 'saveRole'])->name('role.save');
    Route::get('/role/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role/update', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/role/delete/{role:identifier}', [RoleController::class, 'drop'])->name('role.del');

    //Menu
    Route::get('/menus', [MenuController::class, 'index'])->name('menus');
    Route::get('/menu/add', [MenuController::class, 'addMenu'])->name('menu.add');
    Route::post('/menu/save', [MenuController::class, 'saveMenu'])->name('menu.save');
    Route::post('/menu/ajax/save', [MenuController::class, 'saveMenuAjax'])->name('menu.ajax.save');
    Route::get('/menu/edit/{menu:identifier}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/update/{menu:identifier}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/delete/{menu:identifier}', [MenuController::class, 'drop'])->name('menu.delete');

    //SubMenu
    Route::get('/submenus', [SubmenuController::class, 'index'])->name('submenus');
    Route::get('/submenu/add', [SubmenuController::class, 'add'])->name('submenu.add');
    Route::post('/submenu/save', [SubmenuController::class, 'save'])->name('submenu.save');
    Route::get('/submenu/edit/{submenu:identifier}', [SubmenuController::class, 'edit'])->name('submenu.edit');
    Route::put('/submenu/update/{submenu:identifier}', [SubmenuController::class, 'update'])->name('submenu.update');
    Route::delete('/submenu/delete/{submenu:identifier}', [SubmenuController::class, 'drop'])->name('submenu.delete');
    Route::put('/submenu/aktivasi/{submenu:identifier}', [SubmenuController::class, 'aktivasi'])->name('submenu.aktivasi');
});
