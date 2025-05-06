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
     */
    public function run(): void
    {
        if (!User::where('email', 'brayan@gmail.com')->first()){
            User::create([
                'name' => 'Brayan',
                'email' => 'brayan@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }

        if (!User::where('email', 'socorro@gmail.com')->first()){
            User::create([
                'name' => 'Socorro',
                'email' => 'socorro@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }

        if (!User::where('email', 'barbara@gmail.com')->first()){
            User::create([
                'name' => 'Barbara',
                'email' => 'barbara@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
    }
}
