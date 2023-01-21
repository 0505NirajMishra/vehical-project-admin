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
            'company_name' => 'tcs',
            'vehical_name' => 'all',
            'service_type' => 'all',
            'email' => 'admin@gmail.com',
            'customer_mobile' => '9876548965',
            'password' => Hash::make('12345678'),
            'customer_cpassword' => Hash::make('12345678'),
            'user_type'=>'Admin',
        ];
        User::create($data);
    }
}