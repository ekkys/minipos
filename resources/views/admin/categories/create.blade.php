@extends('layouts.main')
@section('title-page', 'Create New Category')
    
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}" required autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mb-3 mt-2">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                            name="description" value="{{ old('description') }}" required autofocus>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            
                <button type="submit" class="btn btn-secondary">Save</button>
            </form>
        </div>
    </div>
@endsection