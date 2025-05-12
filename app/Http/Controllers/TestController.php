<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TestController extends Controller
{
    public function testAuth()
    {
        if (Auth::check()) {
            return 'Logged in as: ' . Auth::user()->name . ' (Role: ' . Auth::user()->role . ')';
        } else {
            return 'Not logged in';
        }
    }
    
    public function loginAsEmployee()
    {
        $employee = User::where('role', 'employee')->first();
        if ($employee) {
            Auth::login($employee);
            return redirect()->route('employee.dashboard');
        }
        
        return 'No employee user found';
    }
    
    public function loginAsAdmin()
    {
        $admin = User::where('role', 'Admin')->first();
        if ($admin) {
            Auth::login($admin);
            return redirect()->route('dashboard');
        }
        
        return 'No admin user found';
    }
} 