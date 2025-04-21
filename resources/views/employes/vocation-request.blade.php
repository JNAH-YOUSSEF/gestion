@extends('adminlte::page')

@section('title')
  Vacation Request
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center p-3">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-white text-center rounded-top-4 border-bottom">
                    <h2 class="text-primary fw-bold mb-0">Vacation Request</h2>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h5 class="text-muted">Employee Name</h5>
                        <h4 class="fw-semibold text-dark">
                            <i class="fas fa-user me-2 text-primary"></i>{{ $employe->fullname }}
                        </h4>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted">Start Date</h6>
                            <p class="text-dark fs-6">{{ $vacation->start_date ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">End Date</h6>
                            <p class="text-dark fs-6">{{ $vacation->end_date ?? 'N/A' }}</p>
                        </div>
                        <div class="col-12 mt-3">
                            <h6 class="text-muted">Reason</h6>
                            <p class="text-dark fs-6">{{ $vacation->reason ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-4">
                        <h6 class="text-muted">Signature</h6>
                        <div class="border rounded-3 p-3 bg-light text-center" style="height: 120px;">
                            <em class="text-muted">Signature Area (e.g., image or digital input)</em>
                            {{-- You can replace this with an actual signature image or input field --}}
                        </div>
                    </div>

                    <div class="mt-5 d-flex justify-content-between align-items-center">
                        <a id="backList" href="{{ route('employes.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="fas fa-arrow-left me-2" id="back" ></i>Back
                        </a>

                        <a id="printLink" onclick="
                                document.getElementById('printLink').style.display= 'none' ;
                                document.getElementById('backList').style.display= 'none' ;  
                                setTimeout(function(){
                                    document.getElementById('backList').style.display= 'inline' ;  
                                    document.getElementById('printLink').style.display= 'inline' ;  

                                 },2000)
                                
                                window.print();
                                "
                                 class="btn btn-primary rounded-pill px-4">
                            <i class="fas fa-print me-2" ></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
