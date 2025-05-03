<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create users first
        $this->call(UserSeeder::class);
        
        // Create departments and salary structures
        $this->call(DepartmentSeeder::class);
        $this->call(SalaryStructureSeeder::class);
        
        // Create designations (depends on departments and salary structures)
        $this->call(DesignationSeeder::class);
        
        // Create employees (depends on departments, designations, and salary structures)
        $this->call(EmployeeSeeder::class);
        
        // Create leave types
        $this->call(LeaveTypeSeeder::class);
        
        // Create leaves (depends on employees and leave types)
        $this->call(LeaveSeeder::class);
        
        // Create attendances (depends on employees)
        $this->call(AttendanceSeeder::class);
        
        // Create services
        $this->call(ServiceSeeder::class);
        
        // Create clients
        $this->call(ClientSeeder::class);
        
        // Create tasks (depends on employees)
        $this->call(TaskSeeder::class);
    }
}
