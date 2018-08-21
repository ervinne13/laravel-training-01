<?php

use App\Modules\User\Models\Role;
use App\Modules\User\Models\UserRole;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'    => 'admin@gmail.com',
            'name'     => 'John Doe',
            'password' => Hash::make('secret'),
        ]);

        UserRole::insert(['user_id' => 1, 'role_code' => 'ACCTG']);
        UserRole::insert(['user_id' => 1, 'role_code' => 'PO_MAN']);
        UserRole::insert(['user_id' => 1, 'role_code' => 'SI_MAN']);

        $possibleRoles = ['ACCTG', 'PO_MAN', 'SI_MAN'];

        factory(User::class, 5)
                ->create()
                ->each(function($user) use ($possibleRoles) {
                    $roleIndex = random_int(0, 2);
                    $role = Role::findOrFail($possibleRoles[$roleIndex]);
                    $user->roles()->save($role);
                });
    }

}
