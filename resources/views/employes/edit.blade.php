@extends('adminlte::page')

@section('title')
Update employer | Laravel Employes App 
@endsection

@section('content_header')
    <h1 class="text-center text-primary">Update employer</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card my-5 shadow border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center text-uppercase rounded-top-4">
                    <h3 class="m-0">Update employer</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h5 class="mb-2"><i class="fas fa-exclamation-circle me-2"></i> Erreurs de validation :</h5>
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('employes.update',$employe->registration_number) }}" method="POST" class="mt-3">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="fullname">Full Name</label>
                            <input type="text" value="{{ old('fullname',$employe->fullname) }}" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" placeholder="Enter full name">
                            @error('fullname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="registration_number">Registration Number</label>
                            <input type="text" value="{{ old('registration_number',$employe->registration_number) }}" class="form-control @error('registration_number') is-invalid @enderror" name="registration_number" id="registration_number" placeholder="Registration Number">
                            @error('registration_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="depart">Department</label>
                            <input type="text" value="{{ old('depart',$employe->depart) }}" class="form-control @error('depart') is-invalid @enderror" name="depart" id="depart" placeholder="Department">
                            @error('depart')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="hire_date">Hire Date</label>
                            <input type="date" value="{{ old('hire_date',$employe->hire_date) }}" class="form-control @error('hire_date') is-invalid @enderror" name="hire_date" id="hire_date">
                            @error('hire_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="tel" value="{{ old('phone',$employe->phone) }}" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Phone number">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" value="{{ old('address',$employe->address) }}" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Address">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="city">City</label>
                            <input type="text" value="{{ old('city',$employe->city) }}" class="form-control @error('city') is-invalid @enderror" name="city" id="city" placeholder="City">
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
