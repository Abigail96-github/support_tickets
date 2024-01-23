<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds to populate your database during a feature test.
     */
    public function run(): void
    {
        /**usersData array containing the details of multiple users
        and then loop through the array to create each user dynamically
        */
        $usersData =
        [
            [
                'id' => Str::uuid(), // Generate UUID
                'name' => 'John Doe',
                'email' => 'john@gmail.com',
                'password' => Hash::make('john@123')
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Lucy Doe',
                'email' => 'lucy@gmail.com',
                'password' => Hash::make('lucy@456')
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Abigai Hlongwani',
                'email' => 'gail.hlongwani@gmail.com',
                'password' => Hash::make('abi@123')
            ],
        ];

        foreach ($usersData as $userData) {
            User::create($userData);
        }

        echo "Users added successfully!";

    }
}

