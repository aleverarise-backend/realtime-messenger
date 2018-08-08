<?php

use App\User;
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
        User::create([
            'name'     => 'Alejandro',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name'     => 'Sharon',
            'email'    => 'sharon@admin.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name'     => 'Maria Eden',
            'email'    => 'maria@admin.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
