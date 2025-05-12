@extends('employee.master')

@section('title', 'My Profile')

@section('content')
<style>
    .profile-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 2rem;
    }
    
    .profile-header {
        background: linear-gradient(135deg, #7179ea, #4e54c8);
        padding: 2.5rem;
        color: white;
        position: relative;
    }
    
    .profile-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        object-fit: cover;
        margin-bottom: 1rem;
    }
    
    .profile-name {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .profile-position {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 1rem;
    }
    
    .profile-details {
        padding: 2rem;
    }
    
    .details-section {
        margin-bottom: 2rem;
    }
    
    .section-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #444;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #eee;
    }
    
    .detail-item {
        margin-bottom: 1rem;
    }
    
    .detail-label {
        font-weight: 600;
        color: #555;
        display: block;
        margin-bottom: 0.25rem;
    }
    
    .detail-value {
        color: #666;
    }
    
    .profile-actions {
        padding: 1.5rem;
        border-top: 1px solid #eee;
        text-align: right;
    }
    
    .edit-btn {
        background-color: #4e73df;
        color: white;
        border: none;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .edit-btn:hover {
        background-color: #2e59d9;
        box-shadow: 0 4px 10px rgba(46, 89, 217, 0.2);
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="profile-container">
                <div class="profile-header text-center">
                    <img src="{{ isset($employee->employee_image) ? url('/uploads/' . $employee->employee_image) : asset('assests/image/default.png') }}" 
                         alt="{{ $employee->name }}" class="profile-img">
                    <h2 class="profile-name">{{ $employee->name }}</h2>
                    <p class="profile-position">{{ $employee->designation->name }} at {{ $employee->department->name }}</p>
                    <div class="employee-id-badge">
                        <span class="badge bg-light text-dark">Employee ID: {{ $employee->employee_id }}</span>
                    </div>
                </div>
                
                <div class="profile-details">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="details-section">
                                <h3 class="section-title">Personal Information</h3>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Full Name</span>
                                    <span class="detail-value">{{ $employee->name }}</span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Email Address</span>
                                    <span class="detail-value">{{ $employee->email }}</span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Phone Number</span>
                                    <span class="detail-value">{{ $employee->phone }}</span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Date of Birth</span>
                                    <span class="detail-value">{{ \Carbon\Carbon::parse($employee->date_of_birth)->format('d F, Y') }}</span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Location</span>
                                    <span class="detail-value">{{ $employee->location }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="details-section">
                                <h3 class="section-title">Employment Details</h3>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Department</span>
                                    <span class="detail-value">{{ $employee->department->name }}</span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Designation</span>
                                    <span class="detail-value">{{ $employee->designation->name }}</span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Joining Date</span>
                                    <span class="detail-value">{{ \Carbon\Carbon::parse($employee->hire_date)->format('d F, Y') }}</span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Employment Type</span>
                                    <span class="detail-value">{{ $employee->joining_mode }}</span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Employee ID</span>
                                    <span class="detail-value">{{ $employee->employee_id }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="profile-actions">
                    <button type="button" class="btn edit-btn" data-toggle="modal" data-target="#editProfileModal">
                        <i class="fas fa-edit me-2"></i> Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('employee.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" value="{{ $employee->name }}" readonly>
                            <small class="text-muted">Name cannot be changed. Contact HR for name changes.</small>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" value="{{ $employee->email }}" readonly>
                            <small class="text-muted">Email cannot be changed. Contact HR for email changes.</small>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ $employee->location }}">
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label for="profile_image">Profile Image</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                            <small class="text-muted">Upload a new profile image (optional)</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 