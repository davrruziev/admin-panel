<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@ecom.uz',
            'phone' => '+998901234567',
            'password' => Hash::make('secret123'),
        ]);


        User::create([
            'first_name' => 'Zafar',
            'last_name' => 'Qobilov',
            'email' => 'zafarqobilov@gmail.com',
            'phone' => '+998900123456',
            'password' => Hash::make('secret123'),
        ]);
    }
}
