@extends('adminlte::page')

@section('title')
    Home | Laravel Employes App
@endsection

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Dashboard</h1>
        <form method="POST" action="{{ route('employee.logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
            </button>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Full Name</span>
                    <span class="info-box-number">{{ $employee->fullname }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Email</span>
                    <span class="info-box-number">{{ $employee->email }}</span>
                </div>
            </div>
        </div>
        @if($employee)
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success"><i class="fas fa-building"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Departement</span>
                        <span class="info-box-number">{{ $employee->depart }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning"><i class="fas fa-city"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">City</span>
                        <span class="info-box-number">{{ $employee->city }}</span>
                    </div>
                </div>
            </div>

        @endif
    </div>
@endsection