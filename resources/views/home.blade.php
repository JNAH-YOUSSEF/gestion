@extends('adminlte::page')

@section('title')
Home | Laravel Employes App 
@endsection

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
<div class="container">
    <div class="row my-5">
        <!-- Total Employees -->
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ \App\Models\Employe::count() }}</h3>
                    <p>Total Employees</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ url('admin/employes') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Departments Count -->
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ \App\Models\Employe::distinct('depart')->count('depart') }}</h3>
                    <p>Departments</p>
                </div>
                <div class="icon">
                    <i class="fas fa-building"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Cities Count -->
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ \App\Models\Employe::distinct('city')->count('city') }}</h3>
                    <p>Cities</p>
                </div>
                <div class="icon">
                    <i class="fas fa-city"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- New Employees This Month -->
        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ \App\Models\Employe::whereMonth('created_at', now()->month)->count() }}</h3>
                    <p>New This Month</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Employees by Department</h3>
                </div>
                <div class="card-body">
                    <canvas id="departmentChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Employees by City</h3>
                </div>
                <div class="card-body">
                    <canvas id="cityChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Replace the Map and Calendar section with this -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Online Store Visitors</h3>
                    <a href="#" class="text-primary">View Report</a>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <h2>820</h2>
                            <p class="text-muted">Visitors Over Time</p>
                        </div>
                        <div class="text-right">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 12.5%
                            </span>
                            <p class="text-muted">Since last week</p>
                        </div>
                    </div>
                    <canvas id="visitorsChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Employee Performance Overview -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Performance Overview</h3>
                </div>
                <div class="card-body">
                    <canvas id="performanceChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>

        <!-- Training Status -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Training Completion</h3>
                </div>
                <div class="card-body">
                    <canvas id="trainingChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(function() {
        // Department Chart
        var ctx1 = document.getElementById('departmentChart').getContext('2d');
        new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: {!! json_encode(\App\Models\Employe::distinct('depart')->pluck('depart')) !!},
                datasets: [{
                    data: {!! json_encode(\App\Models\Employe::select('depart', \DB::raw('count(*) as total'))
                        ->groupBy('depart')->pluck('total')) !!},
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }
        });

        // City Chart
        var ctx2 = document.getElementById('cityChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: {!! json_encode(\App\Models\Employe::distinct('city')->pluck('city')) !!},
                datasets: [{
                    label: 'Employees per City',
                    data: {!! json_encode(\App\Models\Employe::select('city', \DB::raw('count(*) as total'))
                        ->groupBy('city')->pluck('total')) !!},
                    backgroundColor: '#00a65a',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Visitors Chart
        var ctx3 = document.getElementById('visitorsChart').getContext('2d');
        new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                datasets: [{
                    label: 'This Week',
                    data: [100, 120, 170, 167, 180, 177, 160],
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#007bff'
                },
                {
                    label: 'Last Week',
                    data: [60, 80, 70, 65, 80, 80, 100],
                    borderColor: '#ced4da',
                    backgroundColor: 'rgba(206, 212, 218, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#ced4da'
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            borderDash: [2, 2]
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Performance Chart
        var ctxPerf = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctxPerf, {
            type: 'radar',
            data: {
                labels: ['Attendance', 'Task Completion', 'Team Collaboration', 'Skills', 'Communication'],
                datasets: [{
                    label: 'Current Month',
                    data: [95, 85, 90, 88, 92],
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.2)'
                }]
            }
        });

        // Training Chart
        var ctxTrain = document.getElementById('trainingChart').getContext('2d');
        new Chart(ctxTrain, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'In Progress', 'Not Started'],
                datasets: [{
                    data: [65, 25, 10],
                    backgroundColor: ['#00a65a', '#f39c12', '#dc3545']
                }]
            }
        });
    });
</script>
@endpush
@endsection