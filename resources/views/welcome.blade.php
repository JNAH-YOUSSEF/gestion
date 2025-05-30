{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title')
    Welcome | Laravel Employees App
@endsection

@section('content')
<!-- Header with Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQ62lp7LCVPkIaeddwN9c_eAIRo0gwyC1LiA&s" class="me-2 logo-img" alt="Quick Livraison Logo">
        </a>
        
        <div class="navbar-nav ms-auto">
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn btn-outline-primary" href="#" id="authDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-1"></i>
                    @auth
                        {{ auth()->user()->name ?? 'Admin' }}
                    @elseauth('employee')
                        {{ auth('employee')->user()->name ?? 'Employee' }}
                    @else
                        Login
                    @endauth
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="authDropdown">
                    @guest
                        <li>
                            <a class="dropdown-item" href="{{ url('/login') }}">
                                <i class="fas fa-user-shield me-2"></i>Admin Login
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                    @endguest
                    
                    @guest('employee')
                        <li>
                            <a class="dropdown-item" href="{{ url('/employee/login') }}">
                                <i class="fas fa-user me-2"></i>Employee Login
                            </a>
                        </li>
                    @endguest
                    
                    @auth
                        <li>
                            <a class="dropdown-item" href="{{ url('admin/home') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                    
                    @auth('employee')
                        <li>
                            <a class="dropdown-item" href="{{ url('/employee/dashboard') }}">
                                <i class="fas fa-user-tie me-2"></i>Employee Dashboard
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('employee.logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-section bg-gradient-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-4">
                        Welcome to <span class="text-warning">Employee</span> Management System
                    </h1>
                    <p class="lead mb-4">
                        Streamline your workforce management with our comprehensive employee tracking and administration platform.
                    </p>
                    
                    <!-- Action Buttons -->
                    <div class="d-flex flex-wrap gap-3 mb-4">
                        @guest
                            <a href="{{ url('/login') }}" class="btn btn-warning btn-lg px-4">
                                <i class="fas fa-user-shield me-2"></i>Admin Login
                            </a>
                        @else
                            <a href="{{ url('admin/home') }}" class="btn btn-warning btn-lg px-4">
                                <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
                            </a>
                        @endguest
                        
                        @guest('employee')
                            <a href="{{ url('/employee/login') }}" class="btn btn-outline-light btn-lg px-4">
                                <i class="fas fa-user me-2"></i>Employee Login
                            </a>
                        @else
                            <a href="{{ url('/employee/dashboard') }}" class="btn btn-outline-light btn-lg px-4">
                                <i class="fas fa-user-tie me-2"></i>Employee Dashboard
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-image text-center">
                    <div class="feature-card bg-white bg-opacity-10 backdrop-blur rounded-4 p-4 mb-4">
                        <div class="row g-3">
                            <div class="col-4">
                                <div class="feature-item text-center">
                                    <div class="feature-icon bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 60px; height: 60px;">
                                        <i class="fas fa-users fa-lg"></i>
                                    </div>
                                    <h6 class="text-white">Manage Teams</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="feature-item text-center">
                                    <div class="feature-icon bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 60px; height: 60px;">
                                        <i class="fas fa-chart-line fa-lg"></i>
                                    </div>
                                    <h6 class="text-white">Track Progress</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="feature-item text-center">
                                    <div class="feature-icon bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 60px; height: 60px;">
                                        <i class="fas fa-clock fa-lg"></i>
                                    </div>
                                    <h6 class="text-white">Time Tracking</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="fas fa-user-shield fa-2x"></i>
                    </div>
                    <h5 class="card-title text-primary">Admin Panel</h5>
                    <p class="card-text text-muted">
                        Complete administrative control with employee management, reporting, and system configuration.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="fas fa-user-tie fa-2x"></i>
                    </div>
                    <h5 class="card-title text-success">Employee Portal</h5>
                    <p class="card-text text-muted">
                        Self-service portal for employees to manage their profiles, view schedules, and track performance.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="fas fa-chart-bar fa-2x"></i>
                    </div>
                    <h5 class="card-title text-warning">Analytics</h5>
                    <p class="card-text text-muted">
                        Comprehensive reporting and analytics to make data-driven decisions for your organization.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .min-vh-75 {
        min-height: 75vh;
    }

    .backdrop-blur {
        backdrop-filter: blur(10px);
    }

    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
    }

    .feature-icon {
        transition: transform 0.3s ease;
    }

    .hover-card:hover .feature-icon {
        transform: scale(1.1);
    }

    .navbar-brand {
        font-size: 1.5rem;
    }

    .logo-img {
        width: 60px;
        height: 60px;
        object-fit: contain;
        border-radius: 6px;
    }

    .dropdown-toggle::after {
        margin-left: 0.5rem;
    }

    @media (max-width: 768px) {
        .display-4 {
            font-size: 2rem;
        }
        
        .hero-section {
            padding: 3rem 0;
        }
        
        .d-flex.gap-3 {
            flex-direction: column;
        }
        
        .btn-lg {
            width: 100%;
        }
    }
</style>
@endsection