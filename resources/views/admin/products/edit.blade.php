@extends('layout')

@section('content')
<div class="container my-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-navy py-4 text-center border-0" style="background-color: #0a2f4f;">
                    <h2 class="gold fw-bold mb-0 text-uppercase tracking-in-expand" style="color: #d4af77;">
                        <i class="fas fa-edit me-2"></i> Edit Treasure
                    </h2>
                </div>

                <div class="card-body p-5 bg-white">
                
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT') 

                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #0a2f4f;">Product Name</label>
                            <input type="text" name="name" class="form-control rounded-pill border-gold" value="{{ $product->name }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold" style="color: #0a2f4f;">Price (EGP)</label>
                                <input type="number" step="0.01" name="price" class="form-control rounded-pill border-gold" value="{{ $product->price }}" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold" style="color: #0a2f4f;">Category</label>
                                <select name="category" class="form-select rounded-pill border-gold" required>
                                    <option value="Statues" {{ $product->category == 'Statues' ? 'selected' : '' }}>Statues</option>
                                    <option value="Papyrus" {{ $product->category == 'Papyrus' ? 'selected' : '' }}>Papyrus</option>
                                    <option value="Jewelry" {{ $product->category == 'Jewelry' ? 'selected' : '' }}>Jewelry</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #0a2f4f;">Current Image</label>
                            <div class="mb-2">
                                <img src="{{ asset('images/products/' . $product->image) }}" width="120" class="rounded shadow-sm">
                            </div>
                            <input type="file" name="image" class="form-control rounded-pill border-gold">
                            <small class="text-muted italic">Leave blank to keep the current image</small>
                        </div>

                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-gold btn-lg py-3 rounded-pill fw-bold shadow">
                                UPDATE TREASURE <i class="fas fa-save ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .border-gold { border: 1px solid #d4af77; }
    .btn-gold { background-color: #d4af77; color: #0a2f4f; border: none; transition: 0.4s; }
    .btn-gold:hover { background-color: #0a2f4f; color: #d4af77; transform: translateY(-3px); }
</style>
@endsection