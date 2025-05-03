<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            [
                'employee_id' => 1, // John Doe
                'task_name' => 'Website Redesign',
                'from_date' => '2023-12-01',
                'to_date' => '2023-12-15',
                'total_days' => 15,
                'task_description' => 'Redesign the company website with a modern look and improved functionality',
                'status' => 'In Progress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 2, // Jane Smith
                'task_name' => 'Employee Onboarding Process',
                'from_date' => '2023-11-15',
                'to_date' => '2023-11-30',
                'total_days' => 15,
                'task_description' => 'Create a new employee onboarding process with improved documentation',
                'status' => 'Not Started',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 3, // Bob Johnson
                'task_name' => 'Mobile App Bug Fixes',
                'from_date' => '2023-11-10',
                'to_date' => '2023-11-20',
                'total_days' => 10,
                'task_description' => 'Fix reported bugs in the mobile application',
                'status' => 'In Progress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 4, // Sarah Williams
                'task_name' => 'Financial Report Preparation',
                'from_date' => '2023-12-01',
                'to_date' => '2023-12-10',
                'total_days' => 10,
                'task_description' => 'Prepare the quarterly financial report',
                'status' => 'Not Started',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 5, // Michael Brown
                'task_name' => 'Code Refactoring',
                'from_date' => '2023-12-10',
                'to_date' => '2023-12-20',
                'total_days' => 10,
                'task_description' => 'Refactor the legacy code to improve performance',
                'status' => 'Not Started',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Task::insert($tasks);
    }
} 