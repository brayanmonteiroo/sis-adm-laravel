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
            $superAdmin = User::create([
                'name' => 'Brayan',
                'email' => 'brayan@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            //Atribuir Papel para o usuário
            $superAdmin->assignRole('Super Admin');
        }

        if (!User::where('email', 'socorro@gmail.com')->first()){
            $admin = User::create([
                'name' => 'Socorro',
                'email' => 'socorro@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            //Atribuir Papel para o usuário
            $admin->assignRole('Admin');
        }

        if (!User::where('email', 'barbara@gmail.com')->first()){
            $professor = User::create([
                'name' => 'Barbara',
                'email' => 'barbara@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            //Atribuir Papel para o usuário
            $professor->assignRole('Professor');
        }

        if (!User::where('email', 'breno@gmail.com')->first()){
            $tutor = User::create([
                'name' => 'Breno',
                'email' => 'breno@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            //Atribuir Papel para o usuário
            $tutor->assignRole('Tutor');
        }

        if (!User::where('email', 'sidney@gmail.com')->first()){
            $aluno = User::create([
                'name' => 'Sidney',
                'email' => 'sidney@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            //Atribuir Papel para o usuário
            $aluno->assignRole('Aluno');
        }
    }
}
