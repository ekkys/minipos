@extends('layouts.main')
@section('title-page', 'Edit Customer')
    
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('customers.update', $customer->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 mt-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $customer->name) }}" required autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 mt-2">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                        value="{{ old('phone', $customer->phone) }}" required autofocus>
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-secondary">Update</button>
                <button type="button" onclick="history.back()" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </div>
@endsection