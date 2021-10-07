<?php

namespace Database\Seeders;

use App\Models\Submenu;
use Illuminate\Database\Seeder;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $submenus = [
            [
                'name' => 'Dashboard 1',
                'identifier' => 'dashboard-1',
                'icon' => 'fas fa-tachometer-alt',
                'link' => '/dashboard/satu',
                'is_active' => 1,
                'desc' => 'Menu Dashboard (id: 2) , sub menu Dasboard 1 (id:1)',
                'menu_id' => 1
            ],
            [
                'name' => 'Dashboard 2',
                'identifier' => 'dashboard-2',
                'icon' => 'fas fa-tachometer-alt',
                'link' => '/dashboard/dua',
                'is_active' => 1,
                'desc' => 'Menu Dashboard (id: 2) , sub menu Dasboard 2 (id:2)',
                'menu_id' => 1
            ],
            [
                'name' => 'Tambah Pengguna',
                'identifier' => 'tambah-pengguna',
                'icon' => 'fas fa-user-plus',
                'link' => '/user/add',
                'is_active' => 1,
                'desc' => 'Menu Pengguna (id: 3) , sub menu tambah pengguna (id:3)',
                'menu_id' => 2
            ],
            [
                'name' => 'Daftar Pengguna',
                'identifier' => 'daftar-pengguna',
                'icon' => 'fas fa-users',
                'link' => '/users',
                'is_active' => 1,
                'desc' => 'Menu Pengguna (id: 3) , sub menu daftar pengguna (id:4)',
                'menu_id' => 2
            ],
            [
                'name' => 'Manajemen Menu',
                'identifier' => 'manajemen-menu',
                'icon' => 'fas fa-bars',
                'link' => '/menus',
                'is_active' => 1,
                'desc' => 'Menu Admin (id: 4) , sub menu Manajemen menu (id:5)',
                'menu_id' => 3
            ],
            [
                'name' => 'Manajemen Sub Menu',
                'identifier' => 'manajemen-sub-menu',
                'icon' => 'fab fa-elementor',
                'link' => '/submenus',
                'is_active' => 1,
                'desc' => 'Menu Admin (id: 4) , sub menu Manajemen submenu (id:6)',
                'menu_id' => 3
            ],
            [
                'name' => 'Manajemen Role',
                'identifier' => 'manajemen-role',
                'icon' => 'fas fa-scroll',
                'link' => '/roles',
                'is_active' => 1,
                'desc' => 'Menu Admin (id: 4) , sub menu Manajemen Role (id:6)',
                'menu_id' => 3
            ],
        ];

        foreach ($submenus as $submenu) {
            Submenu::create($submenu);
        }
    }
}
