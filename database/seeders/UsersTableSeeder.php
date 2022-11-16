<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data-users.json");
        $data = json_decode($json);

        $users = [
            [
                'id'             => $data->admin->id,
                'nome'           => $data->admin->nome,
                'cpf'            => $data->admin->cpf,
                'rg'             => $data->admin->rg,
                'celular'        => $data->admin->celular,
                'telefone'       => $data->admin->telefone,
                'email'          => $data->admin->email,
                'password'       => bcrypt($data->admin->password),
                'remember_token' => null,
            ],
            [
                'id'             => $data->user->id,
                'nome'           => $data->user->nome,
                'cpf'            => $data->user->cpf,
                'rg'             => $data->user->rg,
                'celular'        => $data->user->celular,
                'telefone'       => $data->user->telefone,
                'email'          => $data->user->email,
                'password'       => bcrypt($data->user->password),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
