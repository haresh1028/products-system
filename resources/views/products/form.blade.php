@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($product)) @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
        @if(isset($product) && $product->image)
            <img src="{{ asset('storage/'.$product->image) }}" class="mt-2" width="100">
        @endif
    </div>

    <div class="mb-3">
    <label class="form-label">Price ($)</label>
    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}"
           step="0.01" min="0.01" placeholder="Enter price in dollars" required>
</div>


    <div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category" class="form-select" required>
        <option value="">-- Select Category --</option>
        <option value="Electronics" {{ old('category', $product->category ?? '') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
        <option value="Computers" {{ old('category', $product->category ?? '') == 'Computers' ? 'selected' : '' }}>Computers</option>
        <option value="Mobiles" {{ old('category', $product->category ?? '') == 'Mobiles' ? 'selected' : '' }}>Mobiles</option>
        <option value="Home Appliances" {{ old('category', $product->category ?? '') == 'Home Appliances' ? 'selected' : '' }}>Home Appliances</option>
    </select>
</div>


    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="is_active" class="form-select">
            <option value="1" {{ isset($product) && $product->is_active ? 'selected' : '' }}>Active</option>
            <option value="0" {{ isset($product) && !$product->is_active ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">
        {{ isset($product) ? 'Update' : 'Create' }} Product
    </button>
</form>
