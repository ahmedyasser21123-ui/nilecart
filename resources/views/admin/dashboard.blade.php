@extends('layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="serif-display gold mb-0">NileCart Vault</h2>
            <p class="text-muted">Manage your ancient treasures and inventory</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-gold px-4 py-2">
            <i class="fas fa-plus-circle me-2"></i> ADD NEW TREASURE
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 rounded-0" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-0 bg-navy text-white">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0 text-center">
                    <thead class="table-light text-dark">
                        <tr>
                            <th class="py-3">Image</th>
                            <th class="py-3">Product Name</th>
                            <th class="py-3">Category</th>
                            <th class="py-3">Price</th>
                            <th class="py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('images/products/' . $product->image) }}" 
                                             alt="{{ $product->name }}" 
                                             class="rounded shadow-sm" 
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <img src="https://placehold.jp/24/0a2f4f/ffffff/60x60.png?text=No+Img" class="rounded">
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $product->name }}</td>
                                <td><span class="badge bg-outline-gold">{{ $product->category }}</span></td>
                                <td class="gold fw-bold">{{ number_format($product->price, 2) }} EGP</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-info rounded-0 px-3">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this treasure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-0 px-3">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-5 text-muted italic">
                                    <i class="fas fa-box-open d-block mb-2 fa-2x"></i>
                                    The vault is currently empty. Start adding some treasures!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-navy { background-color: #0a2f4f; }
    .gold { color: #d4af77; }
    .serif-display { font-family: 'Playfair Display', serif; font-weight: 700; }
    .btn-gold { background-color: #d4af77; color: #000; font-weight: bold; border-radius: 0; border: none; }
    .btn-gold:hover { background-color: #c5a069; color: #000; }
    .table-dark { background-color: #1a1a1a; --bs-table-bg: #1a1a1a; }
    .bg-outline-gold { border: 1px solid #d4af77; color: #d4af77; }
    .table-hover tbody tr:hover { background-color: rgba(212, 175, 119, 0.1) !important; }
</style>
@endsection