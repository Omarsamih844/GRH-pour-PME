<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = [
            [
                'designation_name' => 'HR Manager',
                'designation_id' => 'HRM001',
                'salary_structure_id' => 2, // Manager
                'department_id' => 1, // HR
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'designation_name' => 'HR Executive',
                'designation_id' => 'HRE001',
                'salary_structure_id' => 1, // Executive
                'department_id' => 1, // HR
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'designation_name' => 'IT Manager',
                'designation_id' => 'ITM001',
                'salary_structure_id' => 2, // Manager
                'department_id' => 2, // IT
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'designation_name' => 'Senior Developer',
                'designation_id' => 'SD001',
                'salary_structure_id' => 3, // Senior Developer
                'department_id' => 2, // IT
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'designation_name' => 'Junior Developer',
                'designation_id' => 'JD001',
                'salary_structure_id' => 4, // Junior Developer
                'department_id' => 2, // IT
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'designation_name' => 'Finance Manager',
                'designation_id' => 'FM001',
                'salary_structure_id' => 2, // Manager
                'department_id' => 3, // Finance
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'designation_name' => 'Marketing Executive',
                'designation_id' => 'ME001',
                'salary_structure_id' => 1, // Executive
                'department_id' => 4, // Marketing
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Designation::insert($designations);
    }
} 