<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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

                  User::create([
                  'name'=>'khaled thabet',
                  'email'=>'k@gmail.com',
                'password'=>Hash::make('123456'),
                    'role_id'=>7
                  ]);

    }
}
