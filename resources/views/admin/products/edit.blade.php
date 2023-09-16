@extends('admin.layout')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Edit Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="post" novalidate enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row g-4">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="col-12">
                        <label>Product Name</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label>Price</label>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control">
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label>Quantity</label>
                        <input type="number" name="qty" value="{{ old('qty', $product->qty) }}" class="form-control">
                        @error('qty')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end gap-3">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary px-3">
                            Cancel
                        </a>

                       <button class="btn btn-primary px-3">
                           Update
                       </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
