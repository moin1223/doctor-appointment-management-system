<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $users = array(
                array(
                    'id' => '1',
                    'first_name' => 'Hasan',
                    'last_name' => 'khan',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('password'),
                    'role' => 'admin',
                ),

            );

            foreach ($users as $user) {
                $r = $user['role'];
                unset($user['role']);

                $u = User::create($user);

                $role = Role::where('name', $r)->first();

                if ($role) {
                    $u->assignRole($role);
                }
            }

        }

    }

}
