@extends('layouts.main')
@section('title-page', 'Create New Product')
    
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="code" value="{{  uniqid('MP', true) }}" hidden>
                    <span class="input-group-text" id="name">Name</span>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}" required autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="description">Description</span>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        value="{{ old('description') }}" required autofocus>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="price">Rp</span>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                        value="{{ old('price') }}" required autofocus>
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="quantity">Quantity</span>
                    <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity"
                        value="{{ old('quantity') }}" required autofocus>
                    @error('quantity')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="category_id">Category</span>
                        <select class="form-control  @error('category_id') is-invalid @enderror" id="inputGroupSelect01" name="category_id">
                            <option selected>Choose...</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                    @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="supplier_id">supplier_id</span>
                        <select class="form-control  @error('supplier_id') is-invalid @enderror" id="inputGroupSelect01" name="supplier_id">
                            <option selected>Choose...</option>
                            @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                          </select>
                    @error('supplier_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-secondary">Save</button>
                <button type="button" onclick="history.back()" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </div>
@endsection