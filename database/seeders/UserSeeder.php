<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create uploads directory if it doesn't exist
        if (!File::exists(public_path('uploads'))) {
            File::makeDirectory(public_path('uploads'), 0777, true);
        }

        $users = [
            [
                'name' => 'Akik Hossain',
                'role' => 'Admin',
                'email' => 'akikhs00@gmail.com',
                'password' => bcrypt('akik87'),
                'image' => 'admin_' . date('Ymdhis') . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Doe',
                'role' => 'Manager',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('password'),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'role' => 'Manager',
                'email' => 'jane.smith@example.com',
                'password' => bcrypt('password'),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Johnson',
                'role' => 'Employee',
                'email' => 'bob.johnson@example.com',
                'password' => bcrypt('password'),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sarah Williams',
                'role' => 'Manager',
                'email' => 'sarah.williams@example.com',
                'password' => bcrypt('password'),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Brown',
                'role' => 'Employee',
                'email' => 'michael.brown@example.com',
                'password' => bcrypt('password'),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Download admin image
        $externalImageUrl = 'https://i.ibb.co/1sspJdY/Akik-Hossain.jpg';
        try {
            $imageContent = file_get_contents($externalImageUrl);
            file_put_contents(public_path('uploads/' . $users[0]['image']), $imageContent);
        } catch (\Exception $e) {
            // If download fails, use null for image
            $users[0]['image'] = null;
        }

        User::insert($users);
    }
} 