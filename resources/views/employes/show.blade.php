@extends('adminlte::page')

@section('title')
Show Employer | Laravel Employes App 
@endsection

@section('content_header')
    <h1 class="text-center fw-bold text-dark mb-4">👤 Employer Details</h1>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h3 class="m-0 fw-bold">
                        <i class="fas fa-user-circle me-2"></i>{{ $employe->fullname }}
                    </h3>
                </div>
                <hr>
                <div class="card-header  text-white text-center rounded-top-4">
                        <a href="{{ route('vacation.request' , $employe->registration_number) }}" class="btn btn-outline-dark">
                              Vacation Request
                        </a>
                        <a href="#" class="btn btn-outline-danger">
                            Work Certificate
                      </a>
                </div>
                <div class="card-body p-4 bg-light">
                    <div class="row g-4">
                        @php
                            $info = [
                                ['icon' => 'fa-id-badge', 'label' => 'Registration Number', 'value' => $employe->registration_number],
                                ['icon' => 'fa-building', 'label' => 'Department', 'value' => $employe->depart],
                                ['icon' => 'fa-calendar-plus', 'label' => 'Hire Date', 'value' => $employe->hire_date],
                                ['icon' => 'fa-envelope', 'label' => 'Email', 'value' => $employe->email ?? 'N/A'],
                                ['icon' => 'fa-phone', 'label' => 'Phone', 'value' => $employe->phone ?? 'N/A'],
                                ['icon' => 'fa-map-marker-alt', 'label' => 'Address', 'value' => $employe->address ?? 'N/A'],
                            ];
                        @endphp

                        @foreach ($info as $item)
                        <div class="col-md-6">
                            <div class="bg-white p-3 rounded-3 shadow-sm h-100 border">
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas {{ $item['icon'] }} me-2 text-primary"></i>
                                    <strong class="text-secondary small text-uppercase">{{ $item['label'] }}</strong>
                                </div>
                                <p class="mb-0 fs-6 text-dark">{{ $item['value'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-4 text-end">
                        <a href="{{ route('employes.index') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
