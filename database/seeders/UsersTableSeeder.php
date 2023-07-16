<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ricardo',
            'email' => 'rikrdoramirez@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'cedula'=>'84567865',
            'address'=>'Av. Universitaria',
            'phone' =>'79856932',
            'role'=>'Admin',
            'account_number'=>fake()->md5(),
        ]);

        User::factory()
        ->count(50)
        ->create();
    }
}
