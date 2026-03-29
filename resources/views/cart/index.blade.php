@extends('layout')

@section('content')
<div class="container my-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="gold fw-bold display-5"><i class="fas fa-shopping-basket me-3"></i>Your Sacred Collection</h2>
        <p class="text-muted fs-5">Review your treasures before they set sail.</p>
    </div>

    @php 
        $currentCart = session('cart', []);
        $totalSum = 0; 
    @endphp

    @if(count($currentCart) > 0)
    <div class="row g-4">
        <div class="col-lg-8">
            @foreach($currentCart as $id => $details)
            @php $totalSum += $details['price'] * ($details['quantity'] ?? $details['qty'] ?? 1); @endphp
            <div class="card mb-3 cart-item-card border-0 shadow-sm overflow-hidden">
                <div class="card-body p-0">
                    <div class="row g-0 align-items-center">
                        {{-- صورة المنتج --}}
                        <div class="col-3 col-md-2">
                            <img src="https://placehold.jp/24/0a2f4f/d4af77/200x200.png?text=Treasure" class="img-fluid h-100" style="object-fit: cover; min-height: 100px;">
                        </div>
                        
                        <div class="col-6 col-md-7 px-3">
                            <h5 class="fw-bold text-navy mb-1">{{ $details['name'] }}</h5>
                            <p class="gold mb-0 fw-bold">{{ number_format($details['price'], 2) }} EGP</p>
                        </div>

                        <div class="col-3 col-md-3 text-end pe-3">
                            <div class="mb-2">
                                <span class="badge bg-navy-light text-navy px-3 py-2 rounded-pill">
                                    Qty: {{ $details['quantity'] ?? $details['qty'] ?? 1 }}
                                </span>
                            </div>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0 text-decoration-none small">
                                    <i class="fas fa-trash-alt me-1"></i> Remove
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-lg summary-card sticky-top" style="top: 100px;">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4 border-bottom pb-2 gold">Order Summary</h4>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Items Subtotal</span>
                        <span class="fw-bold">{{ number_format($totalSum, 2) }} EGP</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Shipping</span>
                        <span class="text-success fw-bold">FREE</span>
                    </div>
                    <hr class="my-4">
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fs-5 fw-bold">Total Amount</span>
                        <span class="fs-4 fw-bold gold">{{ number_format($totalSum, 2) }} EGP</span>
                    </div>
                    
                    <a href="{{ route('checkout') }}" class="btn btn-checkout w-100 py-3 rounded-pill fw-bold mb-3">
                        PROCEED TO CHECKOUT <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    
                    <div class="text-center">
                        <a href="{{ route('products.index') }}" class="text-navy text-decoration-none small fw-bold">
                            <i class="fas fa-chevron-left me-1"></i> Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <div class="empty-cart-icon mb-4">
            <i class="fas fa-box-open fa-5x gold opacity-50"></i>
        </div>
        <h3 class="fw-bold">Your cart is as empty as a lost tomb...</h3>
        <p class="text-muted">Fill it with Egypt's finest treasures.</p>
        <a href="{{ route('products.index') }}" class="btn btn-navy-action px-5 py-3 rounded-pill mt-3">START EXPLORING</a>
    </div>
    @endif
</div>

<style>
    .cart-item-card { transition: 0.3s ease; background: #fff; }
    .cart-item-card:hover { 
        transform: translateX(10px); 
        box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important; 
    }

    .btn-checkout {
        background: var(--navy);
        color: white;
        border: none;
        transition: 0.4s;
    }
    .btn-checkout:hover {
        background: var(--gold);
        color: var(--navy);
        animation: pulse-gold 1.5s infinite;
    }

    @keyframes pulse-gold {
        0% { box-shadow: 0 0 0 0 rgba(212, 175, 119, 0.7); }
        70% { box-shadow: 0 0 0 15px rgba(212, 175, 119, 0); }
        100% { box-shadow: 0 0 0 0 rgba(212, 175, 119, 0); }
    }

    .bg-navy-light { background-color: #f0f4f8; }
    .text-navy { color: var(--navy); }
    .btn-navy-action { background: var(--navy); color: white; border: none; transition: 0.3s; }
    .btn-navy-action:hover { background: var(--gold); color: var(--navy); }

    body.dark-mode .cart-item-card, 
    body.dark-mode .summary-card {
        background: #1e1e1e !important;
        border: 1px solid #333 !important;
        color: white;
    }
    body.dark-mode .cart-item-card:hover {
        border-left: 4px solid var(--gold) !important;
        box-shadow: 0 0 20px rgba(212, 175, 119, 0.2) !important;
    }
    body.dark-mode .bg-navy-light { background: #0a2f4f; color: var(--gold) !important; }
    body.dark-mode .text-navy { color: var(--gold) !important; }
</style>
@endsection