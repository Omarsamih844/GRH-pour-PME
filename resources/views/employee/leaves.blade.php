@extends('employee.master')

@section('title', 'My Leave Requests')

@section('content')
<div class="container-fluid">
    <!-- Leave Balance Card -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My Leave Balance</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($leaveTypes as $leaveType)
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary"><i class="fas fa-calendar-minus"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">{{ $leaveType->name }}</span>
                                    <span class="info-box-number">
                                        {{ $leaveBalances[$leaveType->id] ?? 0 }} / {{ $leaveType->total_days }} days
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ (($leaveBalances[$leaveType->id] ?? 0) / $leaveType->total_days) * 100 }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Leave Requests Card -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">My Leave Requests</h3>
                        <a href="{{ route('leave.leaveForm') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle mr-1"></i> Apply for Leave
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Search and Filter Form -->
                    <form action="{{ route('searchMyLeave') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">All Status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="leave_type">Leave Type</label>
                                <select name="leave_type" id="leave_type" class="form-control">
                                    <option value="">All Types</option>
                                    @foreach($leaveTypes as $leaveType)
                                    <option value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search mr-1"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Leave Requests Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped data-table">
                            <thead>
                                <tr>
                                    <th>Leave Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Days</th>
                                    <th>Reason</th>
                                    <th>Applied On</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($leaves as $leave)
                                <tr>
                                    <td>{{ $leave->leaveType->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($leave->start_date)->format('d M, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($leave->end_date)->format('d M, Y') }}</td>
                                    <td>{{ $leave->days }}</td>
                                    <td>{{ Str::limit($leave->reason, 30) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($leave->created_at)->format('d M, Y') }}</td>
                                    <td>
                                        @if($leave->status == 'Pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($leave->status == 'Approved')
                                            <span class="badge badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No leave requests found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $leaves->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        // Initialize selects with request values if any
        if ($('#status').length > 0) {
            $('#status').val('{{ request('status') }}');
        }
        
        if ($('#leave_type').length > 0) {
            $('#leave_type').val('{{ request('leave_type') }}');
        }
    });
</script>
@endsection 