@extends('admin.layout')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Create New Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="post" novalidate enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-12">
                        <label>Product Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label>Price</label>
                        <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label>Quantity</label>
                        <input type="number" name="qty" value="{{ old('qty') }}" class="form-control">
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
                           Submit
                       </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
