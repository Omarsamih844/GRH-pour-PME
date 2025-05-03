<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'department_name' => 'Human Resources',
                'department_id' => 'HR001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Information Technology',
                'department_id' => 'IT001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Finance',
                'department_id' => 'FIN001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Marketing',
                'department_id' => 'MKT001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Department::insert($departments);
    }
} 