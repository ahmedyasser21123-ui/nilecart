@extends('layout')

@section('content')
<div class="container my-5 pb-5">
    <div class="d-flex justify-content-between align-items-center mb-5 border-bottom pb-3">
        <h2 class="gold fw-bold m-0"><i class="fas fa-pyramid me-3"></i>Egyptian Treasures</h2>
        <span class="text-muted fs-5">Authentic Crafts from the Nile</span>
    </div>

    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="card h-100 shadow-sm border-0 product-card">
                
                <button class="btn-like-heart" onclick="this.classList.toggle('active')">
                    <i class="fas fa-heart"></i>
                </button>

                <div class="card-img-wrapper">
                    <img src="{{ asset('images/products/' . $product->image) }}" 
                         class="card-img-top" 
                         alt="{{ $product->name }}"
                         onerror="this.src='https://placehold.jp/24/0a2f4f/d4af77/400x300.png?text=NileCart+Treasure'">
                </div>
                
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-navy mb-3 text-uppercase">{{ $product->name }}</h5>
                    <p class="card-text text-muted flex-grow-1 fs-6">
                        {{ Str::limit($product->description, 90) }}
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                        <span class="fw-bold gold fs-4">{{ number_format($product->price, 2) }} <small>EGP</small></span>
                        
                        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-navy px-4 rounded-pill add-to-cart-btn">
                            <i class="fas fa-cart-plus me-2"></i> Add
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    body.dark-mode .product-card:hover {
        box-shadow: 0 0 25px 5px rgba(212, 175, 119, 0.4) !important;
        border: 1px solid var(--gold) !important;
        transition: 0.3s ease-in-out;
    }

    .product-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 15px;
        background: #fff;
        position: relative;
    }

    .product-card:hover { transform: translateY(-10px); }

    .card-img-wrapper {
        height: 220px;
        overflow: hidden;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        background-color: #f8f9fa;
    }

    .card-img-top { width: 100%; height: 100%; object-fit: cover; }

    .btn-like-heart {
        position: absolute; top: 15px; right: 15px;
        background: rgba(255, 255, 255, 0.9);
        border: none; border-radius: 50%;
        width: 38px; height: 38px;
        display: flex; align-items: center; justify-content: center;
        color: #ddd; z-index: 10; transition: 0.3s;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .btn-like-heart.active { color: #ff4757; background: white; transform: scale(1.1); }

    .btn-navy { background-color: var(--navy); color: white; border: none; }
    .btn-navy:hover { background-color: var(--gold); color: var(--navy); }

    body.dark-mode .product-card { background-color: #1a1a1a; }
    body.dark-mode .text-navy { color: var(--gold) !important; }
    body.dark-mode .border-top { border-color: #333 !important; }
    body.dark-mode .btn-like-heart { background: rgba(0, 0, 0, 0.5); color: #444; }
</style>
@endsection



