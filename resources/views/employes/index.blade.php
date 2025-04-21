@extends('adminlte::page')

@section('title')
List of Employes | Laravel Employes App 
@endsection

@section('content_header')
    <h1 class="text-center text-primary">List of Employes</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card my-5 shadow border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center text-uppercase rounded-top-4">
                    <h3 class="m-0">Employes</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-hover align-middle table-bordered shadow-sm rounded">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Department</th>
                                    <th>Hired</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($employes as $employe)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employe->fullname }}</td>
                                        <td>{{ $employe->depart }}</td>
                                        <td>{{ $employe->hire_date }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('employes.show', $employe->registration_number) }}" class="btn btn-sm btn-outline-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('employes.edit', $employe->registration_number) }}" class="btn btn-sm btn-outline-warning mx-2" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('employes.destroy', $employe->registration_number) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deleteEmp(event, this)" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'csv', 'pdf', 'print', 'colvis']
            });
        });

        function deleteEmp(event, button) {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                position: "top",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
@endsection
