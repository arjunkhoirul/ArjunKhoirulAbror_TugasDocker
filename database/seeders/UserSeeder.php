<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::create([
            'name' => 'Gavra',
            'phone' => '090998980',
            'email' => 'gavra@gmail.com',
            'password' => bcrypt('123'),
        ]);

        $admin->assignRole('Admin');

        $user = User::create([
            'name' => 'Rio',
            'phone' => '090998980',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123'),
        ]);

        $user->assignRole('Petugas');

        $petugas = User::create([
            'name' => 'Fahmi',
            'phone' => '090998980',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('123'),
        ]);

        $petugas->assignRole('User');
    }
}
