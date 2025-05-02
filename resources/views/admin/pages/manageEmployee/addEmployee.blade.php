@extends('admin.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-container">
                <div class="form-header">
                    <h5>CREATE NEW EMPLOYEE</h5>
                </div>
                <form action="{{ route('manageEmployee.addEmployee.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="name">Employee Name</label>
                                <input required placeholder="Enter Full Name" type="text" id="name" name="name" class="form-control" />
                                @error('name')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="employee_id">Employee ID</label>
                                <input required placeholder="Enter Employee ID" type="text" id="employee_id" name="employee_id" class="form-control" />
                                @error('employee_id')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="department_id">Department</label>
                                <select class="form-control" id="department_id" name="department_id">
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="date_of_birth">Date of Birth</label>
                                <input required type="date" id="date_of_birth" name="date_of_birth" class="form-control" />
                                @error('date_of_birth')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="designation_id">Designation</label>
                                <select required class="form-control" id="designation_id" name="designation_id">
                                    @foreach ($designations as $designation)
                                    <option value="{{$designation->id}}">{{ $designation->designation_name }}</option>
                                    @endforeach
                                </select>
                                @error('designation_id')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="hire_date">Hire Date</label>
                                <input required type="date" id="hire_date" name="hire_date" class="form-control" />
                                @error('hire_date')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input required placeholder="Enter Email Address" type="email" id="email" name="email" class="form-control" />
                                @error('email')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone</label>
                                <input required placeholder="Enter Phone Number" type="text" id="phone" name="phone" class="form-control" />
                                @error('phone')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="employee_image">Profile Image</label>
                                <input type="file" id="employee_image" name="employee_image" class="form-control" />
                                @error('employee_image')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="salary_structure_id">Salary Grade</label>
                                <select required class="form-control" id="salary_structure_id" name="salary_structure_id">
                                    @foreach ($salaries as $salary)
                                    <option value="{{ $salary->id}}">{{ $salary->salary_class }}</option>
                                    @endforeach
                                </select>
                                @error('salary_structure_id')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="location">Location</label>
                                <input required placeholder="Enter Work Location" type="text" id="location" name="location" class="form-control" />
                                @error('location')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="joining_mode">Mode of Joining</label>
                                <select required id="joining_mode" name="joining_mode" class="form-control">
                                    <option value="interview">Interview</option>
                                    <option value="referral">Referral</option>
                                    <option value="walk-in">Walk-in</option>
                                </select>
                                @error('joining_mode')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-submit">
                        <button type="submit" class="btn btn-success submit-btn">
                            <i class="fas fa-save mr-2"></i> Create Employee
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection