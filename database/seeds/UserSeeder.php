<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', config('user.admin.email'))->first()) {
            User::create([
                'email' => config('user.admin.email'),
                'password' => bcrypt(config('user.admin.password')),
                'role' => config('user.role.admin'),
            ]);
        }

        echo 'Admin account was created';
    }
}
