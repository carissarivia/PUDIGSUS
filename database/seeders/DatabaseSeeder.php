<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            "name"=> "Admin",
            "nim"=> "123123123",
            "password" => bcrypt("password"),
            "role" => "admin"
        ]);

    }
}
