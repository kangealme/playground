<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Muhammad Bahrul Ilmi',
                'username' => 'kangealme',
                'email' => 'kangealme@gmail.com',
                'password' => bcrypt('miracle85'),
                'address' => 'Jl. Abusono No. 41 Kel. Ngampel Kec. Mojoroto Kota Kediri',
                'phone' => '081259484666',
                'photo' => '1629362596-kangealme.png',
                'is_active' => true,
                'role_id' => 1,
            ],
            [
                'name' => 'Doddy Kuswono',
                'username' => 'dodikus',
                'email' => 'dodikus@gmail.com',
                'password' => bcrypt('miracle85'),
                'address' => 'Bojonegoro',
                'phone' => '081000000000',
                'photo' => 'default.png',
                'is_active' => true,
                'role_id' => 2,
            ],
            [
                'name' => 'Friez Sando Winarno Ivan',
                'username' => 'fries',
                'email' => 'fries@gmail.com',
                'password' => bcrypt('miracle85'),
                'address' => 'Nganjuk',
                'phone' => '081000000000',
                'photo' => 'default.png',
                'is_active' => true,
                'role_id' => 3,
            ],
            [
                'name' => 'Muhammad Qoyyim Faddly',
                'username' => 'qoy',
                'email' => 'qoy@gmail.com',
                'password' => bcrypt('miracle85'),
                'address' => 'Nganjuk',
                'phone' => '081000000000',
                'photo' => 'default.png',
                'is_active' => true,
                'role_id' => 4,
            ],
            [
                'name' => 'Satrio Adi Winugroho',
                'username' => 'adot',
                'email' => 'adot@gmail.com',
                'password' => bcrypt('miracle85'),
                'address' => 'Trenggalek',
                'phone' => '081000000000',
                'photo' => 'default.png',
                'is_active' => true,
                'role_id' => 4,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
