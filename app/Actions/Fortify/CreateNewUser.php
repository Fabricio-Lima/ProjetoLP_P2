<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nome' => ['required', 'string', 'max:255'],
            'rg' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:255'],
            'telefone' => ['string', 'max:255'],
            'celular' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'nome' => $input['nome'],
            'rg' => $input['rg'],
            'cpf' => $input['cpf'],
            'telefone' => $input['telefone'],
            'celular' => $input['celular'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $user->roles()->attach(2);
        return $user;
    }
}
