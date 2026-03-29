@extends('layout')

@section('content')
<div class="container my-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="gold fw-bold display-5"><i class="fas fa-scroll me-3"></i>Finalize Your Order</h2>
        <p class="text-muted">Complete your details to secure your Egyptian treasures.</p>
    </div>

    <form method="POST" action="{{ route('checkout.store') }}">
        @csrf
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-4 checkout-form-card">
                    <h4 class="fw-bold mb-4 text-navy"><i class="fas fa-map-marker-alt gold me-2"></i>Shipping Information</h4>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold small">FULL NAME</label>
                        <input type="text" name="customer_name" class="form-control custom-input" placeholder="Enter your full name" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small">PHONE NUMBER</label>
                            <input type="tel" name="phone" class="form-control custom-input" placeholder="01xxxxxxxxx" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small">CITY</label>
                            <select name="city" class="form-select custom-input">
                                <option value="Cairo">Cairo</option>
                                <option value="Giza">Giza</option>
                                <option value="Alexandria">Alexandria</option>
                                <option value="Luxor">Luxor (Home of Treasures)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small">FULL ADDRESS</label>
                        <textarea name="address" class="form-control custom-input" rows="3" placeholder="Street name, building number, apartment..."></textarea>
                    </div>

                    <h4 class="fw-bold mt-4 mb-3 text-navy"><i class="fas fa-credit-card gold me-2"></i>Payment Method</h4>
                    <div class="payment-option p-3 border rounded d-flex align-items-center mb-3 active-payment">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="cod" checked>
                            <label class="form-check-label fw-bold" for="cod">
                                Cash on Delivery (COD)
                            </label>
                        </div>
                        <i class="fas fa-money-bill-wave ms-auto gold fa-lg"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card border-0 shadow-lg summary-card sticky-top" style="top: 100px;">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4 border-bottom pb-2">Your Order Summary</h4>
                        
                        <div class="checkout-items mb-4" style="max-height: 200px; overflow-y: auto;">
                            @foreach(session('cart', []) as $item)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="small text-muted">{{ $item['qty'] ?? $item['quantity'] }}x {{ $item['name'] }}</span>
                                <span class="small fw-bold">{{ number_format($item['price'] * ($item['qty'] ?? $item['quantity']), 2) }} EGP</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>{{ number_format($total ?? 0, 2) }} EGP</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping Fee</span>
                            <span class="text-success fw-bold">FREE</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fs-5 fw-bold">Grand Total</span>
                            <span class="fs-4 fw-bold gold">{{ number_format($total ?? 0, 2) }} EGP</span>
                        </div>

                        <button type="submit" class="btn btn-place-order w-100 py-3 rounded-pill fw-bold fs-5">
                            CONFIRM ORDER <i class="fas fa-check-circle ms-2"></i>
                        </button>
                        
                        <p class="text-center text-muted small mt-3">
                            <i class="fas fa-shield-alt me-1"></i> Secure Transaction
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .checkout-form-card { background: #fff; border-radius: 15px; }
    .custom-input {
        border: 1px solid #eee;
        padding: 12px;
        border-radius: 10px;
        transition: 0.3s;
    }
    .custom-input:focus {
        border-color: var(--gold);
        box-shadow: 0 0 10px rgba(212, 175, 119, 0.2);
    }

    .btn-place-order {
        background: var(--navy);
        color: white;
        border: none;
        transition: 0.4s;
    }
    .btn-place-order:hover {
        background: var(--gold);
        color: var(--navy);
        box-shadow: 0 10px 20px rgba(212, 175, 119, 0.4);
    }

    .active-payment {
        border: 2px solid var(--gold) !important;
        background: rgba(212, 175, 119, 0.05);
    }

    body.dark-mode .checkout-form-card,
    body.dark-mode .summary-card {
        background: #1e1e1e !important;
        color: white;
        border: 1px solid #333 !important;
    }
    body.dark-mode .custom-input {
        background: #2a2a2a;
        border-color: #444;
        color: white;
    }
    body.dark-mode .text-navy { color: var(--gold) !important; }
    
    body.dark-mode .summary-card:hover {
        box-shadow: 0 0 30px rgba(212, 175, 119, 0.3) !important;
    }
</style>
@endsection