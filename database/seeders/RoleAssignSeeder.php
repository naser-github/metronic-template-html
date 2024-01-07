<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAssignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SuperOperator
        $user = User::query()->findOrFail(1);
        $role = Role::query()->where('name', 'superOperator')->first();
        $user->assignRole($role);

        // test user
        $user = User::query()->findOrFail(2);
        $role = Role::query()->where('name', 'user')->first();
        $user->assignRole($role);
    }
}
