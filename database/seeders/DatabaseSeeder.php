<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::create('users',function (Blueprint $table){
            $table->id();
            $table->string('name',30);
            $table->string('nik',16)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email-verified')->nullable();
            $table->string('password',100);
            $table->string('foto_profile');
            $table->string('telepon');
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
