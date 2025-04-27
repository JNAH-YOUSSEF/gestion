@extends('layouts.app')


@section('title')
    Welcome | laravel Employes App
@endsection

@section('content')
    <div class="container">
        <diV class="row my-5">
            <div class="container">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="p-2">Welcome Back</h3>
                        </div>
                        <div class="card-body">
                            @guest
                               <a href="{{ url('/login') }}" class="btn btn-outline-primary">
                                    Login Admin
                               </a> 
                            @endguest
                            @auth
                                <a href="{{ url('admin/home') }}" class="btn btn-outline-primary">
                                    Home
                                </a>
                            @endauth


                             <!-- Employee Login button, show only if employee is not authenticated -->
                             @guest('employee')
                             <a href="{{ url('/employee/login') }}" class="btn btn-outline-success">
                                 Login Employee
                             </a> 
                           @endguest

                         <!-- If employee is authenticated, show Employee Dashboard and Logout -->
                         @auth('employee')
                             <a href="{{ url('/employee/dashboard') }}" class="btn btn-outline-success">
                                 Employee Dashboard
                             </a>
                         @endauth
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </diV>
    </div>
@endsection