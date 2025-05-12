@extends('employee.master')

@section('title', 'My Tasks')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Task Statistics -->
        <div class="col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $tasks->where('status', 'Pending')->count() }}</h3>
                    <p>Pending Tasks</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $tasks->where('status', 'Completed On Time')->count() }}</h3>
                    <p>Completed On Time</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $tasks->where('status', 'Completed Late')->count() }}</h3>
                    <p>Completed Late</p>
                </div>
                <div class="icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tasks Card -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">My Tasks</h3>
        </div>
        <div class="card-body">
            <!-- Filter Form -->
            <form action="{{ route('employee.tasks') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">All Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed On Time">Completed On Time</option>
                            <option value="Completed Late">Completed Late</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="priority">Priority</label>
                        <select name="priority" id="priority" class="form-control">
                            <option value="">All Priorities</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter mr-1"></i> Filter
                        </button>
                    </div>
                </div>
            </form>

            <!-- Tasks Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Start Date</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tasks as $task)
                        <tr>
                            <td>{{ $task->task_title }}</td>
                            <td>{{ Str::limit($task->task_description, 50) }}</td>
                            <td>
                                @if($task->priority == 'High')
                                    <span class="badge badge-danger">High</span>
                                @elseif($task->priority == 'Medium')
                                    <span class="badge badge-warning">Medium</span>
                                @else
                                    <span class="badge badge-info">Low</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($task->start_date)->format('d M, Y') }}</td>
                            <td>
                                @php
                                    $deadline = \Carbon\Carbon::parse($task->end_date);
                                    $now = \Carbon\Carbon::now();
                                    $isPastDue = $now->gt($deadline) && $task->status == 'Pending';
                                @endphp
                                <span class="{{ $isPastDue ? 'text-danger font-weight-bold' : '' }}">
                                    {{ $deadline->format('d M, Y') }}
                                    @if($isPastDue)
                                        <i class="fas fa-exclamation-circle text-danger"></i>
                                    @endif
                                </span>
                            </td>
                            <td>
                                @if($task->status == 'Pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($task->status == 'Completed On Time')
                                    <span class="badge badge-success">Completed On Time</span>
                                @else
                                    <span class="badge badge-danger">Completed Late</span>
                                @endif
                            </td>
                            <td>
                                @if($task->status == 'Pending')
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#taskDetailsModal{{ $task->id }}">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    
                                    @php
                                        $deadline = \Carbon\Carbon::parse($task->end_date);
                                        $now = \Carbon\Carbon::now();
                                        $isLate = $now->gt($deadline);
                                    @endphp
                                    
                                    @if($isLate)
                                        <a href="{{ route('taskCompleteLate', $task->id) }}" class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Are you sure you want to mark this task as completed late?')">
                                            <i class="fas fa-check"></i> Complete (Late)
                                        </a>
                                    @else
                                        <a href="{{ route('taskComplete', $task->id) }}" class="btn btn-sm btn-success"
                                           onclick="return confirm('Are you sure you want to mark this task as completed?')">
                                            <i class="fas fa-check"></i> Complete
                                        </a>
                                    @endif
                                @else
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#taskDetailsModal{{ $task->id }}">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                @endif
                            </td>
                        </tr>
                        
                        <!-- Task Details Modal -->
                        <div class="modal fade" id="taskDetailsModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="taskDetailsModalLabel{{ $task->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="taskDetailsModalLabel{{ $task->id }}">Task Details: {{ $task->task_title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Title:</strong> {{ $task->task_title }}</p>
                                                <p><strong>Priority:</strong> 
                                                    @if($task->priority == 'High')
                                                        <span class="badge badge-danger">High</span>
                                                    @elseif($task->priority == 'Medium')
                                                        <span class="badge badge-warning">Medium</span>
                                                    @else
                                                        <span class="badge badge-info">Low</span>
                                                    @endif
                                                </p>
                                                <p><strong>Status:</strong> 
                                                    @if($task->status == 'Pending')
                                                        <span class="badge badge-warning">Pending</span>
                                                    @elseif($task->status == 'Completed On Time')
                                                        <span class="badge badge-success">Completed On Time</span>
                                                    @else
                                                        <span class="badge badge-danger">Completed Late</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($task->start_date)->format('d M, Y') }}</p>
                                                <p><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($task->end_date)->format('d M, Y') }}</p>
                                                <p><strong>Assigned On:</strong> {{ \Carbon\Carbon::parse($task->created_at)->format('d M, Y') }}</p>
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                                <p><strong>Description:</strong></p>
                                                <div class="p-3 bg-light rounded">
                                                    {{ $task->task_description }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        @if($task->status == 'Pending')
                                            @php
                                                $deadline = \Carbon\Carbon::parse($task->end_date);
                                                $now = \Carbon\Carbon::now();
                                                $isLate = $now->gt($deadline);
                                            @endphp
                                            
                                            @if($isLate)
                                                <a href="{{ route('taskCompleteLate', $task->id) }}" class="btn btn-danger"
                                                   onclick="return confirm('Are you sure you want to mark this task as completed late?')">
                                                    <i class="fas fa-check"></i> Complete (Late)
                                                </a>
                                            @else
                                                <a href="{{ route('taskComplete', $task->id) }}" class="btn btn-success"
                                                   onclick="return confirm('Are you sure you want to mark this task as completed?')">
                                                    <i class="fas fa-check"></i> Complete On Time
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No tasks found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $tasks->links() }}
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
        
        if ($('#priority').length > 0) {
            $('#priority').val('{{ request('priority') }}');
        }
    });
</script>
@endsection 