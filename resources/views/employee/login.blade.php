<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f3f6;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            width: 350px;
            padding: 2rem;
            border-radius: 1rem;
            background: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .login-card img {
            width: 60px;
        }
    </style>
</head>
<body>

    <div class="login-card text-center">
        <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQ62lp7LCVPkIaeddwN9c_eAIRo0gwyC1LiA&s') }}" alt="Logo" class="mb-3">
        <h4 class="mb-4">Quick Livraison</h4>

        @if ($errors->any())
            <div class="alert alert-danger text-start">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employee.login') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Full Name" value="{{ old('fullname') }}" required>
                @error('fullname')
                    <div class="invalid-feedback text-start">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                @error('password')
                    <div class="invalid-feedback text-start">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

</body>
</html>
