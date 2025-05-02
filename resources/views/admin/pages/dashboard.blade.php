@extends('admin.master')

@section('content')
<style>
    /* Modern dashboard styling */
    .dashboard-card {
        border-radius: 15px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: none;
        overflow: hidden;
        height: 100%;
    }
    
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }
    
    .dashboard-card .card-body {
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .dashboard-card .inner h3 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #343a40;
    }
    
    .dashboard-card .inner p {
        font-size: 1rem;
        color: #6c757d;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 0;
    }
    
    .icon-container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    .dashboard-icon {
        color: white;
        font-size: 1.75rem;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card content-card">
                <div class="card-body">
                    <h4 class="mb-4">Welcome, {{ Auth::user()->name }}!</h4>
                    <p class="text-muted">This is your Employee Management System dashboard. Here you can manage all aspects of your employee data, departments, designations, and more.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Employee Stats -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="card-body">
                    <div class="stat-content">
                        <h3>{{ $totalEmployees ?? 0 }}</h3>
                        <p>Total Employees</p>
                    </div>
                    <div class="stat-icon icon-primary">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Department Stats -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="card-body">
                    <div class="stat-content">
                        <h3>{{ $totalDepartments ?? 0 }}</h3>
                        <p>Departments</p>
                    </div>
                    <div class="stat-icon icon-success">
                        <i class="fas fa-building"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Designation Stats -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="card-body">
                    <div class="stat-content">
                        <h3>{{ $totalDesignations ?? 0 }}</h3>
                        <p>Designations</p>
                    </div>
                    <div class="stat-icon icon-info">
                        <i class="fas fa-id-badge"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Stats -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="card-body">
                    <div class="stat-content">
                        <h3>{{ $totalUsers ?? 0 }}</h3>
                        <p>System Users</p>
                    </div>
                    <div class="stat-icon icon-warning">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="content-card">
                <div class="card-header">
                    <h5>Quick Access</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 mb-4">
                            <a href="{{ route('manageEmployee.addEmployee') }}" class="text-decoration-none">
                                <div class="feature-box">
                                    <div class="feature-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <h3>Add Employee</h3>
                                    <p>Create a new employee record</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <a href="{{ route('manageEmployee.ViewEmployee') }}" class="text-decoration-none">
                                <div class="feature-box">
                                    <div class="feature-icon" style="background: linear-gradient(45deg, #1cc88a, #13855c);">
                                        <i class="fas fa-list"></i>
                                    </div>
                                    <h3>View Employees</h3>
                                    <p>Manage existing employees</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <a href="{{ route('users.list') }}" class="text-decoration-none">
                                <div class="feature-box">
                                    <div class="feature-icon" style="background: linear-gradient(45deg, #36b9cc, #258391);">
                                        <i class="fas fa-users-cog"></i>
                                    </div>
                                    <h3>User Management</h3>
                                    <p>Manage system users</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <a href="{{ route('organization.department') }}" class="text-decoration-none">
                                <div class="feature-box">
                                    <div class="feature-icon" style="background: linear-gradient(45deg, #f6c23e, #dda20a);">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <h3>Departments</h3>
                                    <p>Manage company departments</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <a href="{{ route('organization.designationList') }}" class="text-decoration-none">
                                <div class="feature-box">
                                    <div class="feature-icon" style="background: linear-gradient(45deg, #e74a3b, #be2617);">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <h3>Designations</h3>
                                    <p>Manage job positions</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <a href="{{ route('salary.view') }}" class="text-decoration-none">
                                <div class="feature-box">
                                    <div class="feature-icon" style="background: linear-gradient(45deg, #6f42c1, #4e2a84);">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <h3>Salary Structures</h3>
                                    <p>Manage salary packages</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 mb-4">
            <div class="content-card h-100">
                <div class="card-header">
                    <h5>System Information</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="text-muted mb-2 font-weight-bold">Current Date & Time</h6>
                        <div class="d-flex align-items-center">
                            <div class="mr-3">
                                <i class="fas fa-calendar-alt fa-2x text-primary"></i>
                            </div>
                            <div>
                                <div id="dayOfWeek" class="font-weight-bold"></div>
                                <div id="ct7"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h6 class="text-muted mb-3 font-weight-bold">System Status</h6>
                        <div class="d-flex align-items-center mb-3">
                            <div class="mr-3">
                                <i class="fas fa-server fa-lg text-success"></i>
                            </div>
                            <div>
                                <div class="font-weight-bold">System Online</div>
                                <small class="text-muted">All services running</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="mr-3">
                                <i class="fas fa-database fa-lg text-info"></i>
                            </div>
                            <div>
                                <div class="font-weight-bold">Database Connected</div>
                                <small class="text-muted">Last updated just now</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection