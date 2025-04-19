@extends('layouts.app')*


@section('title')
    home | laravel Employes App
@endsection

@section('content')
    <div class="container">
        <diV class="row my-5">
            <div class="container">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="p-2">Home</h3>
                        </div>
                        <div class="card-body">
                            
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </diV>
    </div>
@endsection