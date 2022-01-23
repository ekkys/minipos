@extends('layouts.main')

@section('title-page', 'Categories')

@section('container')
@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
   {{ session('success')}}
</div>
@endif

    <div class="row">
        <div class="col mb-3">
            <a class="btn btn-secondary" href="{{ route('categories.create') }}"><i class="bi bi-plus-circle"></i> Add Category</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table id="tbl_category" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
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
            $('#tbl_category').DataTable({
                "aLengthMenu": [
                    [5, 10, 25, 50, 100, 200, -1],
                    [5, 10, 25, 50, 100, 200, "All"]
                ],
                paging: true,
                processing: true,
                serverSide: true,
                ajax: '{{ route('categories.index') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
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

