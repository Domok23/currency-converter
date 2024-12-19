@extends('layouts.app')

@section('content')
<h1>Edit Product</h1>
<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="name">Product Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price', $product->price) }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}" required>
    </div>
    <button type="submit" class="btn btn-success">Update Product</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
