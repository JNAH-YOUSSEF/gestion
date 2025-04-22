@extends('adminlte::page')

@section('title', 'Employee Statistics')

@section('content_header')
    <h1 class="text-center text-primary fw-bold mb-4">📊 Employee Statistics Dashboard</h1>
@endsection

@section('content')
<div class="container-fluid">
    
    <!-- STAT CARDS -->
    <div class="row justify-content-center g-4 mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center bg-primary text-white">
                    <h5 class="card-title">Total Employees</h5>
                    <h2 class="display-6 fw-bold">{{ $totalEmployees }}</h2>
                </div>
            </div>
        </div>
    
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center bg-success text-white">
                    <h5 class="card-title">New Hires (30 Days)</h5>
                    <h2 class="display-6 fw-bold">{{ $recentHires }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- EMPLOYEES BY CITY -->
    <div class="row justify-content-center mb-4">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-info text-white fw-bold">
                    Employees by City
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($employeesByCity as $city)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>{{ $city->city }}</strong>
                                <span class="badge bg-secondary rounded-pill">{{ $city->count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Employees by Department List -->
        {{-- <div class="col-md-6">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-warning text-white fw-bold">
                    Employees by Department
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($employeesByDepartment as $department)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>{{ $department->depart }}</strong>
                                <span class="badge bg-primary rounded-pill">{{ $department->count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div> --}}

    <!-- CHART SECTION -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-dark text-white fw-bold">
                    Employees by Department (Chart)
                </div>
                <div class="card-body">
                    <canvas id="departmentChart" style="height: 350px;"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('departmentChart').getContext('2d');
    const departmentChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($employeesByDepartment->pluck('depart')),
            datasets: [{
                label: 'Number of Employees',
                data: @json($employeesByDepartment->pluck('count')),
                backgroundColor: [
                    '#007bff', '#17a2b8', '#28a745', '#ffc107', '#dc3545'
                ],
                borderColor: '#333',
                borderWidth: 1,
                borderRadius: 5,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
                tooltip: { enabled: true }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>
@endsection
