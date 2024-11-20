@extends('layouts.app')

@section('content')
<h1>Create New Product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="name">Product Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Save Product</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
