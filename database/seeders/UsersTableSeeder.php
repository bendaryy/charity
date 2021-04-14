<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            "name"=>'admin',
            'email'=>'admin@admin.com',
            "password"=>bcrypt('Charity123!@#')
        ]);
        $user->attachRole('admin');
    }
}
