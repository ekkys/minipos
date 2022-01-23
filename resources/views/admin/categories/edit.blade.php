@extends('layouts.main')
@section('title-page', 'Edit Category')
    
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 mt-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $category->name) }}" required autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mb-3 mt-2">
                        <label for="description" class="form-label">description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                            name="description" value="{{ old('description', $category->description) }}" required autofocus>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary">Update</button>
            </form>
        </div>
    </div>
@endsection