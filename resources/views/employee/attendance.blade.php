@extends('employee.master')

@section('title', 'My Attendance History')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">My Attendance Records</h3>
                <a href="{{ route('attendance.giveAttendance') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle mr-1"></i> Record Attendance
                </a>
            </div>
        </div>
        <div class="card-body">
            <!-- Search and Filter Form -->
            <form action="{{ route('searchMyAttendance') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="month">Month</label>
                        <input type="month" name="month" id="month" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">All Status</option>
                            <option value="Present">Present</option>
                            <option value="Late">Late</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search mr-1"></i> Search
                        </button>
                    </div>
                </div>
            </form>

            <!-- Attendance Summary -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $attendances->where('status', 'Present')->count() }}</h3>
                            <p>Present Days</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $attendances->where('status', 'Late')->count() }}</h3>
                            <p>Late Days</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $attendances->where('status', 'Absent')->count() }}</h3>
                            <p>Absent Days</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendance Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Working Hours</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $attendance)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d M, Y') }}</td>
                            <td>{{ $attendance->check_in_time }}</td>
                            <td>{{ $attendance->check_out_time ?: 'Not checked out' }}</td>
                            <td>
                                @if($attendance->check_in_time && $attendance->check_out_time)
                                    @php
                                        $checkIn = \Carbon\Carbon::parse($attendance->date . ' ' . $attendance->check_in_time);
                                        $checkOut = \Carbon\Carbon::parse($attendance->date . ' ' . $attendance->check_out_time);
                                        $hours = $checkOut->diffInHours($checkIn);
                                        $minutes = $checkOut->copy()->subHours($hours)->diffInMinutes($checkIn);
                                    @endphp
                                    {{ $hours }} hrs {{ $minutes }} mins
                                @else
                                    N/A
                                @endif
                            </td>
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
                            <td colspan="5" class="text-center">No attendance records found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $attendances->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        // Initialize date picker if needed
        if ($('#month').length > 0) {
            $('#month').val('{{ request('month') }}');
        }
        
        if ($('#status').length > 0) {
            $('#status').val('{{ request('status') }}');
        }
    });
</script>
@endsection 