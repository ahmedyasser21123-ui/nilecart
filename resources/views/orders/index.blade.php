@extends('layout')

@section('content')
<div class="container my-5">
    <h2 class="gold mb-4"><i class="fas fa-box-open me-2"></i>My Orders</h2>

    @forelse($orders as $order)
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-navy text-white d-flex justify-content-between align-items-center" style="background-color: #0a2f4f;">
            <span><strong>Order #{{ $order->id }}</strong> — {{ $order->created_at->format('d M Y H:i') }}</span>
            <span class="badge bg-warning text-dark">Total: {{ number_format($order->total, 2) }} EGP</span>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <p class="mb-1"><strong>Customer:</strong> {{ $order->customer_name }}</p>
            </div>

            <h6 class="fw-bold border-bottom pb-2">Order Items:</h6>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Product Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                         
                            $items = json_decode($order->items, true);
                        @endphp
                        
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td class="text-center">{{ number_format($item['price'], 2) }} EGP</td>
                            <td class="text-center">x {{ $item['qty'] }}</td>
                            <td class="text-end fw-bold">{{ number_format($item['price'] * $item['qty'], 2) }} EGP</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-info text-center">
        No orders found yet. <a href="{{ route('products.index') }}">Start Shopping!</a>
    </div>
    @endforelse
</div>
@endsection