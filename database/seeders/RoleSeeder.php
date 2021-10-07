<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'identifier' => 'admin',
                'desc' => 'User Admin',
            ],
            [
                'name' => 'Approval',
                'identifier' => 'approval',
                'desc' => 'User Approval',
            ],
            [
                'name' => 'Validator',
                'identifier' => 'validator',
                'desc' => 'User Validator',
            ],
            [
                'name' => 'Operator',
                'identifier' => 'operator',
                'desc' => 'User Operator',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
