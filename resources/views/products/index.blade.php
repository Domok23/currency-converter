@extends('layouts.app')

@section('content')
<h1>Product List</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create Product</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $product }})">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDelete(product) {
    Swal.fire({
        title: 'Are you sure?',
        text: `You are about to delete '${product.name}'`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/products/${product.id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Deleted!', data.message, 'success').then(() => {
                        location.reload();
                    });
                }
            });
        }
    });
}
</script>
@endsection
