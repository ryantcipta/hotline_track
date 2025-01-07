<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = [
            [
                'username'=>'admin1',
                'name'=>'AkunAdmin',
                'email'=>'admin@gmail.com',
                'level'=>'admin',
                'password'=>Hash::make('123456')
            ],
            

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
