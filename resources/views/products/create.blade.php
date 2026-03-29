@extends('layout')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary mb-3 rounded-0">
                <i class="fas fa-arrow-left"></i> Back to Vault
            </a>

            <div class="card shadow-lg border-0 rounded-0">
                <div class="card-header bg-navy text-white py-3">
                    <h4 class="mb-0 gold text-center serif-display">Add New Treasure to NileCart</h4>
                </div>
                <div class="card-body p-5 bg-light">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-0">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 

                        <div class="mb-4">
                            <label class="form-label fw-bold">Product Name</label>
                            <input type="text" name="name" class="form-control rounded-0" placeholder="e.g. Golden Statue" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Price (EGP)</label>
                            <input type="number" step="0.01" name="price" class="form-control rounded-0" placeholder="0.00" value="{{ old('price') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Category</label>
                            <select name="category" class="form-select rounded-0" required>
                                <option value="" selected disabled>Choose Category...</option>
                                <option value="Statues" {{ old('category') == 'Statues' ? 'selected' : '' }}>Statues</option>
                                <option value="Papyrus" {{ old('category') == 'Papyrus' ? 'selected' : '' }}>Papyrus</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Product Image</label>
                            <input type="file" name="image" class="form-control rounded-0" accept="image/*" required>
                            <small class="text-muted">High-quality images attract more explorers.</small>
                        </div>

                        <hr class="my-4">

                        <button type="submit" class="btn btn-gold w-100 py-3 fw-bold shadow">
                            <i class="fas fa-save me-2"></i> SEAL AND SAVE TO DATABASE
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-navy { background-color: #0a2f4f; }
    .gold { color: #d4af77; }
    .serif-display { font-family: 'Playfair Display', serif; }
    .btn-gold { 
        background-color: #d4af77; 
        color: #000; 
        border: none; 
        border-radius: 0;
        transition: 0.3s;
    }
    .btn-gold:hover { 
        background-color: #c5a069; 
        transform: translateY(-2px);
    }
    .form-control:focus, .form-select:focus {
        border-color: #d4af77;
        box-shadow: 0 0 0 0.25rem rgba(212, 175, 119, 0.25);
    }
</style>
@endsection