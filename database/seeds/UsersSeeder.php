<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of available roles
        $roles = [
            'ADMIN' => 'Application administrator',
            'CUSTOMER' => 'Casual customer',
        ];

        // Initialize empty roles to be inserted to the database
        $rolesDb = [];

        // Iterate each available role to be assigned to roles in database
        $now = date('Y/m/d');
        $count = 1;

        foreach ($roles as $key => $value) {
            $rolesDb[] = [
                'id' => $count,
                'role' => $key,
                'description' => $value,
                'created_at' => $now,
            ];

            $count++;
        }

        $usersDb = [
            [
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
            ],
            [
                'id' => 2,
                'name' => 'Customer Example',
                'email' => 'yusufinthehouse@gmail.com',
                'password' => Hash::make('customer'),
            ]
        ];

        $userRolesDb = [
            [
                'user_id' => 1,
                'role_id' => 1,
            ],
            [
                'user_id' => 2,
                'role_id' => 2,
            ],
        ];

        // Insert to the database
        DB::beginTransaction();

        DB::table('roles')->insert($rolesDb);

        DB::table('users')->insert($usersDb);

        DB::table('user_roles')->insert($userRolesDb);

        DB::commit();

    }
}
