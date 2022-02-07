<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "Nurokta",
            "email" => "Nurokta543@gmail.com",
            "password" => bcrypt('123456'),
            "role" => "super-admin",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
    }
}
