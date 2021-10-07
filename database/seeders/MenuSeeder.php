<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'role_id' => 1,
                'name' => 'Dashboard',
                'identifier' => 'dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'link' => '/dashboard',
                'desc' => 'Menu Dashboard'
            ],
            [
                'role_id' => 1,
                'name' => 'Pengguna',
                'identifier' => 'pengguna',
                'icon' => 'fas fa-users-cog',
                'link' => '/pengguna',
                'desc' => 'Menu Pengguna'
            ],
            [
                'role_id' => 1,
                'name' => 'Admin',
                'identifier' => 'admin',
                'icon' => 'fas fa-user-shield',
                'link' => '/admin',
                'desc' => 'Menu Manajemen Admin'
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
