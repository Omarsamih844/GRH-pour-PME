<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('employee.dashboard') }}" class="brand-link">
        <img src="{{ asset('assests/image/default.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">EMPLOYEE PORTAL</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ isset(auth()->user()->employee) && auth()->user()->employee->employee_image ? url('/uploads/' . auth()->user()->employee->employee_image) : asset('assests/image/default.png') }}" 
                     class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('employee.profile') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('employee.dashboard') }}" class="nav-link {{ request()->routeIs('employee.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <!-- Profile -->
                <li class="nav-item">
                    <a href="{{ route('employee.profile') }}" class="nav-link {{ request()->routeIs('employee.profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>My Profile</p>
                    </a>
                </li>
                
                <!-- Attendance -->
                <li class="nav-item">
                    <a href="#attendance-menu" data-toggle="collapse" class="nav-link {{ request()->routeIs('employee.attendance') || request()->routeIs('attendance.giveAttendance') || request()->routeIs('attendance.myAttendance') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Attendance
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <div class="collapse {{ request()->routeIs('employee.attendance') || request()->routeIs('attendance.giveAttendance') || request()->routeIs('attendance.myAttendance') ? 'show' : '' }}" id="attendance-menu">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('attendance.giveAttendance') }}" class="nav-link {{ request()->routeIs('attendance.giveAttendance') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Give Attendance</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('attendance.myAttendance') }}" class="nav-link {{ request()->routeIs('attendance.myAttendance') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Attendance History</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <!-- Leave -->
                <li class="nav-item">
                    <a href="#leave-menu" data-toggle="collapse" class="nav-link {{ request()->routeIs('leave.leaveForm') || request()->routeIs('leave.myLeave') || request()->routeIs('leave.myLeaveBalance') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Leave
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <div class="collapse {{ request()->routeIs('leave.leaveForm') || request()->routeIs('leave.myLeave') || request()->routeIs('leave.myLeaveBalance') ? 'show' : '' }}" id="leave-menu">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('leave.leaveForm') }}" class="nav-link {{ request()->routeIs('leave.leaveForm') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Apply Leave</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('leave.myLeave') }}" class="nav-link {{ request()->routeIs('leave.myLeave') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Leave Requests</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('leave.myLeaveBalance') }}" class="nav-link {{ request()->routeIs('leave.myLeaveBalance') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Leave Balance</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <!-- Tasks -->
                <li class="nav-item">
                    <a href="{{ route('myTask') }}" class="nav-link {{ request()->routeIs('myTask') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>My Tasks</p>
                    </a>
                </li>
                
                <!-- Payroll -->
                <li class="nav-item">
                    <a href="{{ route('myPayroll') }}" class="nav-link {{ request()->routeIs('myPayroll') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>My Payslips</p>
                    </a>
                </li>
                
                <!-- Provident Fund -->
                <li class="nav-item">
                    <a href="{{ route('employeeProvident') }}" class="nav-link {{ request()->routeIs('employeeProvident') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Provident Fund</p>
                    </a>
                </li>
                
                <!-- Notice Board -->
                <li class="nav-item">
                    <a href="{{ route('show.notice') }}" class="nav-link {{ request()->routeIs('show.notice') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Notice Board</p>
                    </a>
                </li>
                
                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside> 