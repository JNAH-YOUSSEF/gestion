<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile - Quick Livraison</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #f8f9fa;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --text-color: #2c3e50;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: var(--text-color);
        }
        
        .main-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            margin: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .profile-header {
            background: linear-gradient(135deg, var(--primary-color), #2c3e50);
            color: white;
            padding: 40px 20px;
            position: relative;
            overflow: hidden;
        }
        
        .profile-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
        }
        
        .profile-img {
            width: 140px;
            height: 140px;
            object-fit: cover;
            border: 6px solid rgba(255, 255, 255, 0.9);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 2;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .info-card {
            background: linear-gradient(135deg, #fff, #f8f9fa);
            border-left: 4px solid var(--primary-color);
        }
        
        .stat-card {
            text-align: center;
            padding: 30px 20px;
            background: linear-gradient(135deg, #fff, #f8f9fa);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .info-item {
            padding: 20px;
            border-bottom: 1px solid #eee;
            transition: background-color 0.3s ease;
        }
        
        .info-item:hover {
            background-color: #f8f9fa;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-color), #5dade2);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.1rem;
        }
        
        .sidebar {
            background: linear-gradient(180deg, #2c3e50, #34495e);
            min-height: 100vh;
            color: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            margin: 5px 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
            color: white;
            transform: translateX(-5px);
        }
        
        .nav-link i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
        }
        
        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .status-active {
            background-color: #d4edda;
            color: #155724;
        }
        
        .performance-bar {
            height: 8px;
            background-color: #e9ecef;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .performance-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--success-color), #2ecc71);
            border-radius: 4px;
            transition: width 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .main-container {
                margin: 10px;
                border-radius: 15px;
            }
            
            .profile-header {
                padding: 30px 15px;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <div class="row g-0">
        <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="p-4">
                    <div class="d-flex align-items-center text-white text-decoration-none mb-4">
                        <div class="rounded-circle p-2 me-3 d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                            <img src="{{ asset('storage/employes/quick.png') }}" alt="logo" style="width: 40px; height: 40px; object-fit: cover;" class="rounded-circle">
                        </div>
                        <div>
                            <h5 class="mb-0">Quick Livraison</h5>
                            <small class="text-light">Employee System</small>
                        </div>
                    </div>
                </div>
                <hr class="border-light mx-3">
                <nav class="nav flex-column px-2">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-comments"></i>
                        Messages
                    </a>
                </nav>
          </div>


        <!-- Main Content -->
        <main class="col-md-9 col-lg-10">
            <div class="main-container">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
                    <div>
                        <h2 class="fw-bold mb-1">Welcome back, {{ $employee->fullname }}</h2>
                        <p class="text-muted mb-0">{{ $employee->department }} • Today is Saturday, May 31, 2025</p>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-2"></i> {{ $employee->fullname }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('employee.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>


                <!-- Profile Section -->
                <div class="row px-4">
                    <div class="col-lg-8">
                        <!-- Profile Card -->
                        <div class="card mb-4">
                            <div class="profile-header text-center">
                                <img src="{{ asset('http://localhost:8000/storage/' . $employee->image) }}" 
                                     class="profile-img rounded-circle mb-3" 
                                     alt="Employee Photo">
                                <h3 class="mb-2">{{ $employee->fullname }}</h3>
                                <div class="status-badge status-active mb-2">
                                    <i class="fas fa-circle me-1"></i>
                                    Active Now
                                </div>
                                <p class="mb-0">{{ $employee->department }}</p>
                            </div>
                            <div class="card-body p-0">
                                <div class="info-item d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Phone Number</h6>
                                        <p class="text-muted mb-0">{{ $employee->phone }}</p>
                                    </div>
                                </div>
                                <div class="info-item d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Email Address</h6>
                                        <p class="text-muted mb-0">{{ $employee->email ?? 'Not provided' }}</p>
                                    </div>
                                </div>
                                <div class="info-item d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Address</h6>
                                        <p class="text-muted mb-0">{{ $employee->address }}, {{ $employee->city }}</p>
                                    </div>
                                </div>
                                <div class="info-item d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Employee ID</h6>
                                        <p class="text-muted mb-0">{{ $employee->registration_number ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="info-item d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Hire Date</h6>
                                        <p class="text-muted mb-0">{{ $employee->created_at ? $employee->created_at->format('F d, Y') : 'Not available' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Performance Card -->
                        <div class="card info-card mb-4">
                            <div class="card-header bg-transparent">
                                <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Monthly Performance</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Completed Deliveries</span>
                                        <span class="fw-bold">95%</span>
                                    </div>
                                    <div class="performance-bar">
                                        <div class="performance-fill" style="width: 95%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Customer Satisfaction</span>
                                        <span class="fw-bold">88%</span>
                                    </div>
                                    <div class="performance-bar">
                                        <div class="performance-fill" style="width: 88%"></div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>On-Time Performance</span>
                                        <span class="fw-bold">92%</span>
                                    </div>
                                    <div class="performance-bar">
                                        <div class="performance-fill" style="width: 92%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="card info-card">
                            <div class="card-header bg-transparent">
                                <h5 class="mb-0"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus me-2"></i>Request Leave
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-edit me-2"></i>Update Profile
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-download me-2"></i>Download Payslip
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Add some interactive elements
    document.addEventListener('DOMContentLoaded', function() {
        // Animate performance bars
        const performanceBars = document.querySelectorAll('.performance-fill');
        setTimeout(() => {
            performanceBars.forEach(bar => {
                bar.style.transition = 'width 1s ease-in-out';
            });
        }, 500);
    });
</script>
</body>
</html>