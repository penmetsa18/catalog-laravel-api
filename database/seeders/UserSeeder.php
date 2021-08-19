<?php

namespace Database\Seeders;

use App\Entities\User;
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
        $users = [
            [
                'name' => 'Bert Kint',
                'email' => 'bert@kadonation.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Tam Asse',
                'email' => 'tam@kadonation.com',
                'password' => Hash::make('password')
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
