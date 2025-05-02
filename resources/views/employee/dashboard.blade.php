<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quick Livraison Dashboard</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i> {{ $employee->fullname }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form method="POST" action="{{ route('employee.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        
        <a href="#" class="brand-link">
            <img src="data:image/png;base64,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" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Quick Livraison</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>List of Employees</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>


    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content pt-4">
            <div class="container-fluid">
                <div class="row">
                    <!-- Profile Card -->
                    <div class="col-md-4">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" 
                                         src="https://ui-avatars.com/api/?name={{ urlencode($employee->fullname) }}&background=random"
                                         alt="Employee profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{ $employee->fullname }}</h3>
                                <p class="text-muted text-center">{{ $employee->department }}</p>
                            </div>
                        </div>

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Employee Details</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                <p class="text-muted">{{ $employee->email }}</p>
                                <hr>
                                <strong><i class="fas fa-phone mr-1"></i> Phone</strong>
                                <p class="text-muted">{{ $employee->phone }}</p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                <p class="text-muted">{{ $employee->city }}, {{ $employee->address }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Stats and Activity -->
                    <div class="col-md-8">
        

                        <!-- Timeline -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-history"></i>
                                    Recent Activity
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="timeline">
                                    <div class="time-label">
                                        <span class="bg-red">Today</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-user bg-blue"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i>   {{ \Carbon\Carbon::parse($lastLoginTime)->diffForHumans() }}</span>
                                            <h3 class="timeline-header">Last login activity</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>