@extends('admin.master')

@section('content')
<div class="table-card">
    <div class="card-header">
        <h4>User Management</h4>
        <div>
            @if(isset($employee) && $employee)
                <a href="{{ route('users.create', ['employeeId' => $employee->id]) }}"
                   class="btn btn-success rounded-pill">
                   <i class="fa-solid fa-plus me-2"></i>Create New User
                </a>
            @else
                <p class="text-danger mb-0">Please create an employee first to add users</p>
            @endif
        </div>
    </div>

    <div class="card-body p-0">
        <div class="d-flex justify-content-end p-4 pb-0">
            <form action="{{ route('searchUser') }}" method="get" class="table-search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search users..." name="search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="p-4">
            <div class="table-responsive">
                <table class="table modern-table table-centered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge badge-pill table-badge {{ $user->role == 'admin' ? 'badge-info' : 'badge-success' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td>
                                <a class="table-action-btn btn-info" href="{{ route('users.profile.view', $user->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="table-action-btn btn-dark" href="{{route('edit',$user->id)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="table-action-btn btn-danger" href="{{route('delete',$user->id)}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    @if($users->count() == 0)
    <div class="text-center p-4">
        <div class="alert alert-info">No users found</div>
    </div>
    @endif
    
    <div class="card-footer">
        <div class="table-pagination">
            <!-- Pagination links would go here -->
        </div>
    </div>
</div>
@endsection