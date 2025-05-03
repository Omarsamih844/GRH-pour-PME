<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'service_name' => 'Web Development',
                'description' => 'We create responsive and modern websites using the latest technologies.',
                'details' => 'Our expert team delivers fast, secure, and SEO-friendly web solutions tailored to your business needs.',
                'service_image' => 'web-development.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'Mobile App Development',
                'description' => 'Our experienced developers create powerful, feature-rich mobile applications.',
                'details' => 'We focus on intuitive UI/UX design and performance optimization for both iOS and Android platforms.',
                'service_image' => 'mobile-app.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'UI/UX Design',
                'description' => 'We create beautiful, intuitive interfaces that enhance user experience.',
                'details' => 'Our design team focuses on usability, accessibility, and creating engaging digital experiences.',
                'service_image' => 'ui-ux-design.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'Digital Marketing',
                'description' => 'Boost your online presence with our comprehensive digital marketing services.',
                'details' => 'We offer SEO, social media management, content marketing, and PPC campaigns.',
                'service_image' => 'digital-marketing.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Service::insert($services);
    }
} 