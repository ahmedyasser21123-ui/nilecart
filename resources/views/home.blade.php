@extends('layout')

@section('content')
<div class="hero-section text-center d-flex align-items-center justify-content-center">
    <div class="container position-relative z-1">
        <h1 class="display-1 fw-bold gold mb-3 tracking-in-expand">NILECART</h1>
        <p class="lead text-white fs-3 mb-5 px-md-5">Discover Egypt’s Hidden Treasures & Ancient Crafts</p>
        <a href="{{ route('products.index') }}" class="btn btn-gold btn-lg px-5 py-3 rounded-pill fw-bold shadow-lg">
            DISCOVER TREASURES <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="text-center mb-5">
        <h2 class="gold fw-bold display-5">Our Collection</h2>
        <div class="divider mx-auto"></div>
    </div>

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-md-4">
                <div class="category-card shadow">
                    <div class="category-img" style="background-image: url('{{ asset('images/products/' . $product->image) }}');"></div>
                    <div class="category-overlay">
                        <h3 class="text-white">{{ $product->name }}</h3>
                        <p class="gold fw-bold fs-4">{{ number_format($product->price, 2) }} EGP</p>
                        <div class="d-flex gap-2 mt-2">
                             <a href="{{ route('cart.add', $product->id) }}" class="btn btn-gold btn-sm text-dark fw-bold">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-white fs-4 italic">The vault is currently empty. Visit Admin Dashboard to add treasures!</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    :root {
        --gold: #d4af77;
        --navy: #0a2f4f;
    }
    
    .hero-section {
        height: 90vh;
        background: linear-gradient(rgba(10, 47, 79, 0.7), rgba(10, 47, 79, 0.7)), 
                    url('https://placehold.jp/1920x1080.png?text=NileCart+Background') center/cover no-repeat;
        position: relative;
    }

    .btn-gold {
        background-color: var(--gold);
        color: var(--navy);
        border: none;
        transition: 0.4s;
    }

    .btn-gold:hover {
        background-color: white;
        transform: translateY(-5px);
    }

    .divider {
        width: 80px;
        height: 4px;
        background: var(--gold);
        margin-top: 10px;
    }

    .category-card {
        height: 450px;
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        transition: 0.5s ease-in-out;
    }

    .category-img {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        transition: 0.5s;
    }

    .category-overlay {
        position: absolute;
        inset: 0;
        background: rgba(10, 47, 79, 0.7);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.4s;
    }

    .category-card:hover .category-overlay {
        opacity: 1;
    }

    .category-card:hover .category-img {
        transform: scale(1.1);
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 0 30px rgba(212, 175, 119, 0.5) !important;
    }

    .btn-outline-gold {
        border: 2px solid var(--gold);
        color: var(--gold);
        font-weight: bold;
    }

    .btn-outline-gold:hover {
        background: var(--gold);
        color: var(--navy);
    }

    .tracking-in-expand {
        animation: tracking-in-expand 0.7s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
    }

    @keyframes tracking-in-expand {
        0% { letter-spacing: -0.5em; opacity: 0; }
        40% { opacity: 0.6; }
        100% { opacity: 1; }
    }
</style>
@endsection