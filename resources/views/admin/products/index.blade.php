@extends('admin.layout')

@section('content')
    <div class="container py-5">
       <div class="d-flex justify-content-between align-items-center mb-5">
           <h1 class="mb-0">Products</h1>

           <a href="{{ route('admin.products.create') }}" class="btn btn-primary px-3">Create Product</a>
       </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price ($)</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>
                      <div class="d-flex gap-3">
                          <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-secondary">
                              Edit
                          </a>
                          <form action="{{ route('admin.products.destroy', ['id' => $product->id])  }}" method="post">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger">
                                  Delete
                              </button>
                          </form>
                      </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No Available products</td>
                <tr>
            @endforelse
            </tbody>
        </table>

        <div>
            {{ $products->links() }}
        </div>
    </div>
@endsection
