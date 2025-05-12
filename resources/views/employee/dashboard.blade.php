@extends('employee.master')

@section('title', 'Employee Dashboard')

@section('content')
<style>
    .dashboard-stats {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        flex: 1 0 250px;
        margin: 0.75rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
    }
    
    .stat-card .card-body {
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .stat-content h3 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .stat-content p {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0;
        color: #6c757d;
    }
    
    .stat-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 1.5rem;
        color: white;
    }
    
    .icon-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
    }
    
    .icon-success {
        background: linear-gradient(45deg, #1cc88a, #13855c);
    }
    
    .icon-warning {
        background: linear-gradient(45deg, #f6c23e, #dda20a);
    }
    
    .icon-danger {
        background: linear-gradient(45deg, #e74a3b, #be2617);
    }
    
    .recent-activity {
        margin-top: 2rem;
    }
    
    .activity-card {
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 1.5rem;
    }
    
    .activity-card .card-header {
        font-weight: 600;
        background-color: #f8f9fa;
    }
    
    .welcome-card {
        background: linear-gradient(135deg, #7179ea, #4e54c8);
        color: white;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        margin-bottom: 2rem;
    }
    
    .welcome-card .card-body {
        padding: 2.5rem;
    }
    
    .welcome-text h4 {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .table tbody tr {
        transition: background-color 0.2s ease;
    }
    
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    .badge-status {
        padding: 0.5rem 0.75rem;
        font-weight: 600;
        border-radius: 50px;
    }
    
    .badge-pending {
        background-color: #f6c23e;
        color: #fff;
    }
    
    .badge-completed {
        background-color: #1cc88a;
        color: #fff;
    }
    
    .badge-late {
        background-color: #e74a3b;
        color: #fff;
    }
    
    .btn-block {
        display: block;
        width: 100%;
    }
    
    .me-2 {
        margin-right: 0.5rem;
    }
</style>

<div class="container-fluid py-4">
    <!-- Welcome Message -->
    <div class="row">
        <div class="col-12">
            <div class="welcome-card">
                <div class="card-body">
                    <div class="welcome-text">
                        <h4>Welcome Back, {{ $employee->name }}</h4>
                        <p>Employee ID: {{ $employee->employee_id }} | Department: {{ $employee->department->name }} | Designation: {{ $employee->designation->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="dashboard-stats">
        <div class="stat-card">
            <div class="card-body">
                <div class="stat-content">
                    <h3>{{ $totalTasks }}</h3>
                    <p>Total Tasks</p>
                </div>
                <div class="stat-icon icon-primary">
                    <i class="fas fa-tasks"></i>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="card-body">
                <div class="stat-content">
                    <h3>{{ $completedTasks }}</h3>
                    <p>Completed Tasks</p>
                </div>
                <div class="stat-icon icon-success">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="card-body">
                <div class="stat-content">
                    <h3>{{ $pendingTasks }}</h3>
                    <p>Pending Tasks</p>
                </div>
                <div class="stat-icon icon-warning">
                    <i class="fas fa-hourglass-half"></i>
                </div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="card-body">
                <div class="stat-content">
                    <h3>{{ $leavesTaken }}</h3>
                    <p>Leaves Taken</p>
                </div>
                <div class="stat-icon icon-danger">
                    <i class="fas fa-calendar-minus"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row recent-activity">
        <div class="col-md-6">
            <div class="activity-card">
                <div class="card-header">
                    <h5>Recent Attendance</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentAttendance as $attendance)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d M, Y') }}</td>
                                    <td>{{ $attendance->check_in_time }}</td>
                                    <td>{{ $attendance->check_out_time ?: 'Not checked out' }}</td>
                                    <td>
                                        @if($attendance->status == 'Present')
                                            <span class="badge badge-success">Present</span>
                                        @elseif($attendance->status == 'Late')
                                            <span class="badge badge-warning">Late</span>
                                        @else
                                            <span class="badge badge-danger">Absent</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No recent attendance records</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end mt-3">
                        <a href="{{ route('attendance.myAttendance') }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="activity-card">
                <div class="card-header">
                    <h5>Recent Tasks</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentTasks as $task)
                                <tr>
                                    <td>{{ $task->task_title }}</td>
                                    <td>{{ \Carbon\Carbon::parse($task->end_date)->format('d M, Y') }}</td>
                                    <td>
                                        @if($task->status == 'Pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($task->status == 'Completed On Time')
                                            <span class="badge badge-success">Completed</span>
                                        @else
                                            <span class="badge badge-danger">Late</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">No recent tasks</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end mt-3">
                        <a href="{{ route('myTask') }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="{{ route('attendance.giveAttendance') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-clock mr-2"></i> Record Attendance
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="{{ route('leave.leaveForm') }}" class="btn btn-success btn-block">
                                <i class="fas fa-calendar-plus mr-2"></i> Apply for Leave
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="{{ route('myTask') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-tasks mr-2"></i> Check Tasks
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="{{ route('myPayroll') }}" class="btn btn-info btn-block">
                                <i class="fas fa-file-invoice-dollar mr-2"></i> View Payslips
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 