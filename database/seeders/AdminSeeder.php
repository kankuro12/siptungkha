<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = "Admin";
        $user->password = bcrypt('admin');
        $user->role = 0;
        $user->email = "admin@admin.com";
        $user->save();
    }
}
