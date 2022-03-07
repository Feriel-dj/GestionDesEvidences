<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'name' => ['required', 'string', 'max:255'],
            'Prénom' => ['required'],
            'Rang' =>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'role_id' =>['required'],
            'Drapeaux' => ['required|array|max:1'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'Prénom' => $input['Prénom'],
            'Rang' =>$input['Rang'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id'  =>$input['role_id'],
           //'Drapeaux'  =>$input['Drapeaux'],
           'Médecin_legiste' =>['Medecin_legiste'],
           'Examinateur_mobile' => ['Examinateur_mobile'],

        ]);
        
    }
}
