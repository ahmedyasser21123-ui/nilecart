@extends('layout')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-secondary">
                    <i class="fas fa-chevron-left me-1"></i> Back to Dashboard
                </a>
            </div>

            <div class="card shadow-lg border-0 rounded-0">
                <div class="card-header bg-navy text-white py-4 border-0">
                    <h4 class="mb-0 gold text-center serif-display text-uppercase" style="letter-spacing: 2px;">
                        <i class="fas fa-plus-circle me-2"></i> Add New Treasure
                    </h4>
                </div>

                <div class="card-body p-5 bg-white">
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-0 border-0 mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li><i class="fas fa-exclamation-triangle me-2"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-bold text-navy">Product Name</label>
                                <input type="text" name="name" class="form-control rounded-0 border-gold-focus" 
                                       placeholder="e.g. Anubis Statue" value="{{ old('name') }}" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-navy">Price (EGP)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-0">£</span>
                                    <input type="number" step="0.01" name="price" class="form-control rounded-0 border-gold-focus" 
                                           placeholder="0.00" value="{{ old('price') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-navy">Category / Segment</label>
                                <select name="category" class="form-select rounded-0 border-gold-focus" required>
                                    <option value="" selected disabled>Select Category</option>
                                    <option value="Statues" {{ old('category') == 'Statues' ? 'selected' : '' }}>Statues</option>
                                    <option value="Papyrus" {{ old('category') == 'Papyrus' ? 'selected' : '' }}>Papyrus</option>
                                    <option value="Jewelry" {{ old('category') == 'Jewelry' ? 'selected' : '' }}>Jewelry</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-bold text-navy">Product Image</label>
                                <div class="border p-3 text-center bg-light">
                                    <input type="file" name="image" class="form-control rounded-0" accept="image/*" required>
                                    <small class="text-muted d-block mt-2">Recommended size: 800x800px (Max 2MB)</small>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4" style="border-top: 1px solid #d4af77;">

                        <div class="d-grid">
                            <button type="submit" class="btn btn-gold btn-lg py-3 fw-bold shadow-sm">
                                <i class="fas fa-check-double me-2"></i> CONFIRM AND SAVE TREASURE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-navy { background-color: #0a2f4f !important; }
    .text-navy { color: #0a2f4f; }
    .gold { color: #d4af77 !important; }
    .serif-display { font-family: 'Playfair Display', serif; }
    
    .btn-gold { 
        background-color: #d4af77; 
        color: #000; 
        border: none; 
        border-radius: 0;
        transition: all 0.3s ease;
    }
    
    .btn-gold:hover { 
        background-color: #c5a069; 
        color: #000;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important;
    }

    .border-gold-focus:focus {
        border-color: #d4af77;
        box-shadow: 0 0 0 0.25rem rgba(212, 175, 119, 0.15);
    }

    .form-control, .form-select {
        padding: 0.75rem;
    }
</style>
@endsection