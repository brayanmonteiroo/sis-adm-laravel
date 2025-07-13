<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'super-admin@gmail.com')->first()) {
            $superAdmin = User::create([
                'name' => 'Usuário Super Admin',
                'email' => 'super-admin@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $superAdmin->assignRole('Super Admin');
        }

        if (!User::where('email', 'admin@gmail.com')->first()) {
            $admin = User::create([
                'name' => 'Usuário Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $admin->assignRole('Admin');
        }

        if (!User::where('email', 'professor@gmail.com')->first()) {
            $teacher = User::create([
                'name' => 'Usuário Professor',
                'email' => 'professor@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $teacher->assignRole('Professor');
        }

        if (!User::where('email', 'tutor@gmail.com')->first()) {
            $tutor = User::create([
                'name' => 'Usuário Tutor',
                'email' => 'tutor@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $tutor->assignRole('Tutor');
        }

        if (!User::where('email', 'aluno@gmail.com')->first()) {
            $student = User::create([
                'name' => 'Usuário Aluno',
                'email' => 'aluno@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $student->assignRole('Aluno');
        }
    }
}
