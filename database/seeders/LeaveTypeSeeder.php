<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leaveTypes = [
            [
                'leave_type_id' => 'AL001',
                'leave_days' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'leave_type_id' => 'SL001',
                'leave_days' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'leave_type_id' => 'ML001',
                'leave_days' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'leave_type_id' => 'PL001',
                'leave_days' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'leave_type_id' => 'BL001',
                'leave_days' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        LeaveType::insert($leaveTypes);
    }
} 