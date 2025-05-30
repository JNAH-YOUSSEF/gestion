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
                            <h5 class="mb-2"><i class="fas fa-exclamation-circle me-2"></i> Validation Errors:</h5>
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </div>
                    @endif

                    <form action="{{ route('employes.update', $employe->registration_number) }}" method="POST" class="mt-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Image Upload Section -->
                        <div class="form-group mb-4">
                            <label for="image">Profile Image</label>
                            
                            <!-- Current Image Preview -->
                            @if($employe->image)
                                <div class="mb-3">
                                    <p>Current Image:</p>
                                    <img src="{{ asset('storage/'.$employe->image) }}" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                </div>
                            @endif
                            
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="image">
                                <label class="custom-file-label" for="image" data-browse="Browse">
                                    {{ $employe->image ? 'Change image' : 'Choose file' }}
                                </label>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">Upload a new profile picture (JPEG, PNG, JPG - max 2MB)</small>
                            <div class="mt-2" id="image-preview"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" value="{{ old('fullname', $employe->fullname) }}" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" placeholder="Enter full name">
                                    @error('fullname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="registration_number">Registration Number</label>
                                    <input type="text" value="{{ old('registration_number', $employe->registration_number) }}" class="form-control @error('registration_number') is-invalid @enderror" name="registration_number" id="registration_number" placeholder="Registration Number">
                                    @error('registration_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="depart">Department</label>
                                    <input type="text" value="{{ old('depart', $employe->depart) }}" class="form-control @error('depart') is-invalid @enderror" name="depart" id="depart" placeholder="Department">
                                    @error('depart')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="hire_date">Hire Date</label>
                                    <input type="date" value="{{ old('hire_date', $employe->hire_date) }}" class="form-control @error('hire_date') is-invalid @enderror" name="hire_date" id="hire_date">
                                    @error('hire_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="tel" value="{{ old('phone', $employe->phone) }}" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Phone number">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="city">City</label>
                                    <input type="text" value="{{ old('city', $employe->city) }}" class="form-control @error('city') is-invalid @enderror" name="city" id="city" placeholder="City">
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" value="{{ old('address', $employe->address) }}" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Address">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-2"></i> Update
                            </button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    // Update the custom file input label with the selected file name
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : "{{ $employe->image ? 'Change image' : 'Choose file' }}";
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
        
        // Preview the selected image
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('image-preview').innerHTML = 
                    '<img src="' + event.target.result + '" class="img-thumbnail mt-2" style="max-width: 200px; max-height: 200px;">';
            }
            reader.readAsDataURL(file);
        } else {
            document.getElementById('image-preview').innerHTML = '';
        }
    });
</script>
@endsection