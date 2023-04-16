<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
    public function create(array $input): User
    {
        Log::info($input['name']);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'route_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        Log::info('$input');
        Log::info($input);
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => 1,
            'phone' => $input['phone'],
            'vehicle_number' => $input['vehicle_number'],
            'route_number' => $input['route_number'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
