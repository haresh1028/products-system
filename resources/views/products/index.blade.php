@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Product Listing</h2>

    <!-- Search Form -->
    <form method="GET" class="row g-3 mb-4">

        <div class="col-md-12 text-end">
            <a href="{{ route('products.create') }}" class="btn btn-success">+ Add Product</a>
        </div>
    </form>

    <!-- Summary -->
    <div class="alert alert-info d-flex justify-content-between">
        <div><strong>Total Active Products:</strong> {{ $totalCount }}</div>
        <div><strong>Total Price:</strong> ₹{{ number_format($totalPrice, 2) }}</div>
    </div>

    <!-- Table -->
    <table class="table table-bordered table-striped" id="products-table">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Category</th>
                <th width="200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="50" class="img-thumbnail">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->category }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline delete-form">
    @csrf @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>

                        <form action="{{ route('products.toggle', $product) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-secondary">
                                {{ $product->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#products-table').DataTable({
                responsive: true,
                paging: true,
                info: true,
                ordering: true,
                searching: true, // optional but defaults true
                columnDefs: [{
                    orderable: false,
                    targets: 5
                }]
            });

        });
    </script>
    
@endsection
