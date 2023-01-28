<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        $data =  [
            'customer_name' => 'Niraj',
            'email' => 'admin@gmail.com',
            'customer_mobile' => '9876548965',
            'password' => Hash::make('123456'),
            'customer_cpassword' => Hash::make('123456'),
            'user_type'=>'Admin',
        ];
        User::create($data);
    }
}