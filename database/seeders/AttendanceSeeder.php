<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attendances = [
            // John Doe's attendance
            [
                'name' => 'John Doe',
                'department_name' => 'Information Technology',
                'designation_name' => 'IT Manager',
                'employee_id' => 'EMP001',
                'select_date' => '2023-11-01',
                'month' => 'November',
                'check_in' => '09:00:00',
                'late' => 'No',
                'check_out' => '17:30:00',
                'overtime' => 'No',
                'duration_minutes' => 510, // 8.5 hours in minutes
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Doe',
                'department_name' => 'Information Technology',
                'designation_name' => 'IT Manager',
                'employee_id' => 'EMP001',
                'select_date' => '2023-11-02',
                'month' => 'November',
                'check_in' => '08:45:00',
                'late' => 'No',
                'check_out' => '17:15:00',
                'overtime' => 'No',
                'duration_minutes' => 510, // 8.5 hours in minutes
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Jane Smith's attendance
            [
                'name' => 'Jane Smith',
                'department_name' => 'Human Resources',
                'designation_name' => 'HR Manager',
                'employee_id' => 'EMP002',
                'select_date' => '2023-11-01',
                'month' => 'November',
                'check_in' => '09:10:00',
                'late' => 'Yes',
                'check_out' => '17:45:00',
                'overtime' => 'No',
                'duration_minutes' => 515, // 8.58 hours in minutes
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'department_name' => 'Human Resources',
                'designation_name' => 'HR Manager',
                'employee_id' => 'EMP002',
                'select_date' => '2023-11-02',
                'month' => 'November',
                'check_in' => '08:55:00',
                'late' => 'No',
                'check_out' => '18:00:00',
                'overtime' => 'Yes',
                'duration_minutes' => 545, // 9.08 hours in minutes
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Bob Johnson's attendance
            [
                'name' => 'Bob Johnson',
                'department_name' => 'Information Technology',
                'designation_name' => 'Senior Developer',
                'employee_id' => 'EMP003',
                'select_date' => '2023-11-01',
                'month' => 'November',
                'check_in' => '09:05:00',
                'late' => 'No',
                'check_out' => '17:40:00',
                'overtime' => 'No',
                'duration_minutes' => 515, // 8.58 hours in minutes
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Johnson',
                'department_name' => 'Information Technology',
                'designation_name' => 'Senior Developer',
                'employee_id' => 'EMP003',
                'select_date' => '2023-11-02',
                'month' => 'November',
                'check_in' => '09:15:00',
                'late' => 'Yes',
                'check_out' => '18:15:00',
                'overtime' => 'Yes',
                'duration_minutes' => 540, // 9 hours in minutes
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Attendance::insert($attendances);
    }
} 