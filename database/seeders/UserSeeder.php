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
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@company.com',
            'phone' => '+998901234567',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'first_name' => 'Setora',
            'last_name' => 'Qobilova',
            'email' => 'setora@gmail.com',
            'phone' => '+998901234569',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('editor');

        $user = User::create([
            'first_name' => 'Sanjar',
            'last_name' => 'Eshqobilov',
            'email' => 'sanjar09@gmail.com',
            'phone' => '+998901234570',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('shop-manager');

        $user = User::create([
            'first_name' => 'Jamila',
            'last_name' => 'Toirova',
            'email' => 'jamila99@gmail.com',
            'phone' => '+998903214570',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('helpdesk-support');

        $user = User::create([
            'first_name' => 'Anton',
            'last_name' => 'Anatoliy',
            'email' => 'anton@gmail.com',
            'phone' => '+998901234568',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('customer');

        $users = User::factory()->count(10)->create();
        foreach ($users as $user) {
            $user->assignRole('customer');
        }
    }
}
