<?php

namespace App\Actions\Fortify;

use App\Models\ManagementAccess\DetailUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // NOTE: update this section for after create user, the system it will also auto create detail_user
        // return User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        // ]);


        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {

                // add to detail users untuk pendaftaran melalui landing atau fronsite nya
                $detail_user = new DetailUser;
                $detail_user->user_id = $user->id;
                $detail_user->type_user_id = 3;
                $detail_user->contact = NULL;
                $detail_user->address = NULL;
                $detail_user->photo = NULL;
                $detail_user->gender = NULL;
                $detail_user->save();

                // add role automatis saat user daftar lewat frontsite sebagai pasien
                // $user->role_user = 5; // 5 untuk id pasien di rolenya


                return redirect()->route('register_success');
            });
        });



    }
}
