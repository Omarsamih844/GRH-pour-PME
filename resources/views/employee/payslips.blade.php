@extends('employee.master')

@section('title', 'My Payslips')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">My Payslips</h3>
        </div>
        <div class="card-body">
            <!-- Search and Filter Form -->
            <form action="{{ route('searchMyPayroll') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="month">Month & Year</label>
                        <input type="month" name="month" id="month" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search mr-1"></i> Search
                        </button>
                    </div>
                </div>
            </form>

            <!-- Salary Summary -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Basic Salary</span>
                            <span class="info-box-number">{{ $employee->salaryStructure->basic_salary ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-plus-circle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Allowances</span>
                            <span class="info-box-number">
                                @php
                                    $allowances = $employee->salaryStructure ? 
                                        $employee->salaryStructure->house_rent_allowance + 
                                        $employee->salaryStructure->medical_allowance + 
                                        $employee->salaryStructure->special_allowance + 
                                        $employee->salaryStructure->fuel_allowance + 
                                        $employee->salaryStructure->phone_bill_allowance : 0;
                                @endphp
                                {{ $allowances ?? 'N/A' }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box bg-primary">
                        <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Gross Salary</span>
                            <span class="info-box-number">
                                {{ ($employee->salaryStructure ? $employee->salaryStructure->basic_salary + $allowances : 'N/A') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payslips Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Salary</th>
                            <th>Bonus</th>
                            <th>Deductions</th>
                            <th>Net Salary</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payrolls as $payroll)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($payroll->month)->format('F Y') }}</td>
                            <td>
                                {{ $payroll->basic_salary + $payroll->house_rent_allowance + $payroll->medical_allowance + 
                                   $payroll->special_allowance + $payroll->fuel_allowance + $payroll->phone_bill_allowance }}
                            </td>
                            <td>{{ $payroll->bonus }}</td>
                            <td>
                                {{ $payroll->tax + $payroll->provident_fund + $payroll->leave_deduction + $payroll->other_deduction }}
                            </td>
                            <td><strong>{{ $payroll->net_salary }}</strong></td>
                            <td>
                                @if($payroll->status == 'Paid')
                                    <span class="badge badge-success">Paid</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('mySinglePayroll', [$employee->id, $payroll->month]) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('mySinglePayroll', [$employee->id, $payroll->month]) }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-print"></i> Print
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No payslips found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $payrolls->links() }}
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
    });
</script>
@endsection 