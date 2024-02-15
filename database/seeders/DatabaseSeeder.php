<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::updateOrCreate([
            'name' => 'Admin User',
            'email' => '3rdparty+froggytalk@noones.team'
        ],[
            'password' => Hash::make('2N@@RU7r0Rt'),
        ]);
    }
}
