<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Workspace;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array<string, string> $input
     *
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],

            'workspace_name' => [
                'required',
                'string',
                'max:150',
            ],

            'password' => $this->passwordRules(),
        ])->validate();

        return DB::transaction(function () use ($input) {

            // إنشاء مساحة العمل أولاً
            $workspace = Workspace::create([
                'name' => $input['workspace_name'],
            ]);

            // إنشاء المستخدم وربطه بمساحة العمل
            return User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'workspace_id' => $workspace->id,
            ]);
        });
    }
}
