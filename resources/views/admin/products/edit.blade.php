@extends('layouts.main')
@section('title-page', 'Edit New Product')
    
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('products.update', $product->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">Name</span>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $product->name ) }}" required autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input id="description" type="hidden" name="description" value="{{ old('description', $product->description ) }}">
                    @error('description')
                     <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <trix-editor input="description"></trix-editor>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="price">Rp</span>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                        value="{{ old('price',  $product->price ) }}" required autofocus>
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="quantity">Quantity</span>
                    <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity"
                        value="{{ old('quantity',  $product->quantity ) }}" required autofocus>
                    @error('quantity')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                        <select class="form-control  @error('category_id') is-invalid @enderror" id="selectTwo" name="category_id">
                            <option selected>Choose Category</option>
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
                        <select class="form-control  @error('supplier_id') is-invalid @enderror" id="selectDua" name="supplier_id">
                            <option selected>Choose Supplier</option>
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
                <div class="mb-3">
                    <label for="image" class="form-label">Post Image</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                        @error('image')
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
    
    <script>
    //select two
    $(document).ready(function() {
        $('select.form-control').select2();
    });

    //menonaktifkan  fungsi attachment trix
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            console.log(image);
            console.log(imgPreview);

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

    }
    </script>
@endsection
