<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'client_name' => 'Acme Corporation',
                'details' => 'A leading technology company specializing in innovative software solutions.',
                'client_image' => 'acme-corp.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'TechNova Solutions',
                'details' => 'Providing advanced IT consulting and software development services.',
                'client_image' => 'technova.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'GlobalConnect Industries',
                'details' => 'A multinational corporation focusing on telecommunications and networking.',
                'client_image' => 'globalconnect.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Phoenix Innovations',
                'details' => 'Pioneering research and development in AI and machine learning technologies.',
                'client_image' => 'phoenix.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Client::insert($clients);
    }
} 