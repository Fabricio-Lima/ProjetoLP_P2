<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'nome'           => 'Admin',
                'cpf'            => 00000000000,
                'rg'             => 000000000,
                'celular'        => 00000000000,
                'telefone'       => 0000000000,
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'nome'           => 'User',
                'cpf'            => 11111111111,
                'rg'             => 111111111,
                'celular'        => 11111111111,
                'telefone'       => 1111111111,
                'email'          => 'user@user.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
