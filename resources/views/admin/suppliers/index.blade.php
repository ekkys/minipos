@extends('layouts.main')

@section('title-page', 'Suppliers')

@section('container')
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
                    <th>Phone</th>
                    <th>Address</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
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
                ajax: '{{ url('suppliers/json') }}',
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
                    // {
                    //     data: 'action',
                    //     name: 'action',
                    //     orderable: false,
                    //     searchable: false
                    // }
                ]
            });
        });
    </script>  
@endpush

