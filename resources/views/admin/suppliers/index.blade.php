@extends('layouts.main')

@section('title-page', 'Suppliers')

@section('container')
@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
   {{ session('success')}}
</div>
@endif

    <div class="row">
        <div class="col mb-3">
            <a class="btn btn-secondary" href="{{ route('suppliers.create') }}"><i class="bi bi-plus-circle"></i> Add Supplier</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table id="tbl_supplier" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Options</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#tbl_supplier').DataTable({
                "aLengthMenu": [
                    [5, 10, 25, 50, 100, 200, -1],
                    [5, 10, 25, 50, 100, 200, "All"]
                ],
                paging: true,
                processing: true,
                serverSide: true,
                ajax: '{{ route('suppliers.index') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'options',
                        name: 'options',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>  
@endsection

