<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Admin',
                'email'=>'admin1@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'Manager',
                'email'=>'manager1@gmail.com',
                'role'=>'manager',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'Supervisor',
                'email'=>'supervisor1@gmail.com',
                'role'=>'supervisor',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'petugas',
                'email'=>'petugas1@gmail.com',
                'role'=>'petugas',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
