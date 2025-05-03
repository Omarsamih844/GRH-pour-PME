<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class EmployeeSeeder extends Seeder
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
        
        $employees = [
            [
                'name' => 'John Doe',
                'employee_id' => 'EMP001',
                'department_id' => 2, // IT
                'designation_id' => 3, // IT Manager
                'salary_structure_id' => 2, // Manager
                'date_of_birth' => '1985-05-15',
                'hire_date' => '2020-01-10',
                'email' => 'john.doe@example.com',
                'phone' => '123-456-7890',
                'location' => 'New York',
                'employee_image' => null,
                'joining_mode' => 'Full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'employee_id' => 'EMP002',
                'department_id' => 1, // HR
                'designation_id' => 1, // HR Manager
                'salary_structure_id' => 2, // Manager
                'date_of_birth' => '1988-08-22',
                'hire_date' => '2019-11-05',
                'email' => 'jane.smith@example.com',
                'phone' => '234-567-8901',
                'location' => 'Chicago',
                'employee_image' => null,
                'joining_mode' => 'Full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Johnson',
                'employee_id' => 'EMP003',
                'department_id' => 2, // IT
                'designation_id' => 4, // Senior Developer
                'salary_structure_id' => 3, // Senior Developer
                'date_of_birth' => '1990-02-28',
                'hire_date' => '2021-03-15',
                'email' => 'bob.johnson@example.com',
                'phone' => '345-678-9012',
                'location' => 'San Francisco',
                'employee_image' => null,
                'joining_mode' => 'Full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sarah Williams',
                'employee_id' => 'EMP004',
                'department_id' => 3, // Finance
                'designation_id' => 6, // Finance Manager
                'salary_structure_id' => 2, // Manager
                'date_of_birth' => '1986-11-12',
                'hire_date' => '2018-07-22',
                'email' => 'sarah.williams@example.com',
                'phone' => '456-789-0123',
                'location' => 'Boston',
                'employee_image' => null,
                'joining_mode' => 'Full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Brown',
                'employee_id' => 'EMP005',
                'department_id' => 2, // IT
                'designation_id' => 5, // Junior Developer
                'salary_structure_id' => 4, // Junior Developer
                'date_of_birth' => '1995-04-20',
                'hire_date' => '2022-01-10',
                'email' => 'michael.brown@example.com',
                'phone' => '567-890-1234',
                'location' => 'Seattle',
                'employee_image' => null,
                'joining_mode' => 'Full-time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Employee::insert($employees);
    }
} 