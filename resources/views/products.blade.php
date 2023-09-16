@extends('layout')

@section('title')
    All Products
@endsection

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5">All Products</h1>

        <form action="{{ route('products') }}">
            <div class="row mb-4">
                <div class="col-3">
                    <input type="text" class="form-control" name="name" placeholder="Search by name">
                </div>
                <div class="col-3">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        {{-- Product Cards --}}
        <div class="row g-4">
            @if($products->isEmpty())
                <div class="col-12 text-center">
                    Sorry, No available records
                </div>
            @endif
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ $product->image }}"
                             class="card-img-top"
                             alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-primary fw-bold">Price: ${{ $product->price }}</span>
                                <span>qty: {{ $product->qty }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="py-5 text-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
