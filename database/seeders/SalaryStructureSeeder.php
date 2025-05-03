<?php

namespace Database\Seeders;

use App\Models\SalaryStructure;
use Illuminate\Database\Seeder;

class SalaryStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salaryStructures = [
            [
                'salary_class' => 'Executive',
                'basic_salary' => 70000.00,
                'mobile_allowance' => 2000.00,
                'medical_expenses' => 5000.00,
                'houseRent_allowance' => 15000.00,
                'total_salary' => 92000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salary_class' => 'Manager',
                'basic_salary' => 50000.00,
                'mobile_allowance' => 1500.00,
                'medical_expenses' => 3000.00,
                'houseRent_allowance' => 10000.00,
                'total_salary' => 64500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salary_class' => 'Senior Developer',
                'basic_salary' => 40000.00,
                'mobile_allowance' => 1000.00,
                'medical_expenses' => 2500.00,
                'houseRent_allowance' => 8000.00,
                'total_salary' => 51500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salary_class' => 'Junior Developer',
                'basic_salary' => 25000.00,
                'mobile_allowance' => 800.00,
                'medical_expenses' => 1500.00,
                'houseRent_allowance' => 5000.00,
                'total_salary' => 32300.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        SalaryStructure::insert($salaryStructures);
    }
} 