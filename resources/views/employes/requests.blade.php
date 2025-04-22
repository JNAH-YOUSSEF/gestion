{{-- filepath: c:\Users\Ce Pc\Documents\gestion\resources\views\employes\requests.blade.php --}}
@extends('adminlte::page')

@section('title', 'Employee Requests')

@section('content_header')
    <h1 class="text-center text-primary fw-bold mb-4">📋 Employee Requests</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-primary text-white fw-bold">
                    List of Requests
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr>
                                    <td>{{ $request['type'] }}</td>
                                    <td>
                                        <span class="badge bg-{{ $request['status'] == 'Approved' ? 'success' : 'warning' }}">
                                            {{ $request['status'] }}
                                        </span>
                                    </td>
                                    <td>{{ $request['date'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection