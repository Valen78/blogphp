<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create();

        DB::table('users')->insert(
            [
                [
                    'name' => 'Alex',
                    'email' => 'alex@alex.fr',
                    'password' => Hash::make('toto'),
                    'role' => 'administrator'
                ],
                [
                    'name' => 'Jean',
                    'email' => 'jean@dupont.fr',
                    'password' => Hash::make('jeanjean'),
                    'role' => 'editor'
                ],
            ]

        );
    }
}
