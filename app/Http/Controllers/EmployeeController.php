<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Leave;
use App\Models\Payroll;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    // Employee Dashboard
    public function dashboard()
    {
        $employee = Employee::where('email', Auth::user()->email)->first();
        
        // Count of tasks assigned to the employee
        $totalTasks = Task::where('employee_id', $employee->id)->count();
        
        // Count of completed tasks
        $completedTasks = Task::where('employee_id', $employee->id)
            ->whereIn('status', ['Completed On Time', 'Completed Late'])
            ->count();
            
        // Count of pending tasks
        $pendingTasks = Task::where('employee_id', $employee->id)
            ->where('status', 'Pending')
            ->count();
            
        // Count of leaves taken
        $leavesTaken = Leave::where('employee_id', $employee->id)
            ->where('status', 'Approved')
            ->count();
            
        // Get recent attendance records
        $recentAttendance = Attendance::where('employee_id', $employee->id)
            ->orderBy('date', 'desc')
            ->take(5)
            ->get();
            
        // Get recent tasks
        $recentTasks = Task::where('employee_id', $employee->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        return view('employee.dashboard', compact(
            'employee', 
            'totalTasks', 
            'completedTasks', 
            'pendingTasks', 
            'leavesTaken', 
            'recentAttendance',
            'recentTasks'
        ));
    }
    
    // Employee Profile
    public function profile()
    {
        $employee = Employee::where('email', Auth::user()->email)->first();
        return view('employee.profile', compact('employee'));
    }
    
    // Update Employee Profile
    public function updateProfile(Request $request)
    {
        $employee = Employee::where('email', Auth::user()->email)->first();
        
        $request->validate([
            'phone' => 'required|string',
            'location' => 'required|string|max:100',
        ]);
        
        $employee->update([
            'phone' => $request->phone,
            'location' => $request->location,
        ]);
        
        // Update user profile image if provided
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/uploads', $fileName);
            
            $employee->update([
                'employee_image' => $fileName
            ]);
        }
        
        notify()->success('Profile updated successfully.');
        return redirect()->back();
    }
    
    // Employee Tasks
    public function myTasks()
    {
        $employee = Employee::where('email', Auth::user()->email)->first();
        $tasks = Task::where('employee_id', $employee->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('employee.tasks', compact('tasks'));
    }
    
    // Employee Payslips
    public function myPayslips()
    {
        $employee = Employee::where('email', Auth::user()->email)->first();
        $payrolls = Payroll::where('employee_id', $employee->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('employee.payslips', compact('payrolls'));
    }
    
    // Employee Attendance
    public function myAttendance()
    {
        $employee = Employee::where('email', Auth::user()->email)->first();
        $attendances = Attendance::where('employee_id', $employee->id)
            ->orderBy('date', 'desc')
            ->paginate(10);
            
        return view('employee.attendance', compact('attendances'));
    }
} 