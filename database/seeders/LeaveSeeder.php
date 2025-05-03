<?php

namespace Database\Seeders;

use App\Models\Leave;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Database\Seeder;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get employee data
        $employees = Employee::all();
        $departments = Department::all();
        $designations = Designation::all();

        if ($employees->count() > 0) {
            $leaves = [
                [
                    'employee_name' => 'John Doe',
                    'department_name' => 'Information Technology',
                    'designation_name' => 'IT Manager',
                    'employee_id' => 'EMP001',
                    'leave_type_id' => 2, // Sick Leave
                    'from_date' => '2023-06-10',
                    'to_date' => '2023-06-15',
                    'total_days' => 5,
                    'description' => 'Recovering from flu',
                    'status' => 'Approved',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'employee_name' => 'Jane Smith',
                    'department_name' => 'Human Resources',
                    'designation_name' => 'HR Manager',
                    'employee_id' => 'EMP002',
                    'leave_type_id' => 1, // Annual Leave
                    'from_date' => '2023-07-20',
                    'to_date' => '2023-08-03',
                    'total_days' => 14,
                    'description' => 'Family vacation',
                    'status' => 'Approved',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'employee_name' => 'Bob Johnson',
                    'department_name' => 'Information Technology',
                    'designation_name' => 'Senior Developer',
                    'employee_id' => 'EMP003',
                    'leave_type_id' => 5, // Bereavement Leave
                    'from_date' => '2023-09-05',
                    'to_date' => '2023-09-09',
                    'total_days' => 4,
                    'description' => 'Family emergency',
                    'status' => 'Approved',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'employee_name' => 'Sarah Williams',
                    'department_name' => 'Finance',
                    'designation_name' => 'Finance Manager',
                    'employee_id' => 'EMP004',
                    'leave_type_id' => 1, // Annual Leave
                    'from_date' => '2023-10-15',
                    'to_date' => '2023-10-22',
                    'total_days' => 7,
                    'description' => 'Personal time off',
                    'status' => 'Pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ];

            Leave::insert($leaves);
        }
    }
} 