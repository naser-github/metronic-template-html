<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Super Operator
        $user = new User();
        $user->name = 'Super Operator';
        $user->unique_id = null;
        $user->email = 'superOperator@gmail.com';
        $user->phone = '01798435813';
        $user->password = Hash::make('123456');
        $user->save();

        // tests user
        $user = new User();
        $user->name = 'Test User';
        $user->unique_id = null;
        $user->email = 'testUser@gmail.com';
        $user->phone = '01711123456';
        $user->password = Hash::make('123456');
        $user->save();
    }
}
