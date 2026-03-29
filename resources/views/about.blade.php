@extends('layout')

@section('content')
<div class="hero mb-5">
    <div class="container text-center">
        <h1 class="display-3 fw-bold gold">Our Story</h1>
        <p class="lead fs-4">Bringing the magic of the Nile and the treasures of Egypt to your doorstep.</p>
    </div>
</div>

<div class="container pb-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <h2 class="gold mb-4">Who is NileCart?</h2>
            <p class="fs-5">
                NileCart started with a simple vision: to bridge the gap between Egypt's rich heritage and the modern world. 
                We are more than just an e-commerce platform; we are a gateway to authentic Egyptian craftsmanship.
            </p>
            <p>
                From hand-carved statues to luxury papyrus and traditional jewelry, every item in our store is selected 
                with care to ensure you receive a piece of history.
            </p>
        </div>
        <div class="col-md-6 text-center">
            <img src="https://picsum.photos/id/1029/500/350" alt="Egyptian Craft" class="img-fluid rounded shadow-lg border-gold" style="border: 3px solid var(--gold);">
        </div>
    </div>

    <div class="row text-center mt-5">
        <h2 class="gold mb-5">Why Choose Us?</h2>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 py-4 p-3 bg-light-custom">
                <i class="fas fa-gem gold fa-3x mb-3"></i>
                <h4 class="fw-bold">Authenticity</h4>
                <p class="text-muted">Every product is 100% genuine and sourced directly from local Egyptian artisans.</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 py-4 p-3 bg-light-custom">
                <i class="fas fa-shipping-fast gold fa-3x mb-3"></i>
                <h4 class="fw-bold">Global Shipping</h4>
                <p class="text-muted">We deliver the wonders of Egypt to every corner of the globe with speed and care.</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 py-4 p-3 bg-light-custom">
                <i class="fas fa-heart gold fa-3x mb-3"></i>
                <h4 class="fw-bold">Passion</h4>
                <p class="text-muted">We love our culture, and we want to share that love with you through every package.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .border-gold {
        border: 3px solid var(--gold);
    }
    
    body.dark-mode .bg-light-custom {
        background-color: #1e1e1e !important;
        color: white;
    }
    body.dark-mode .text-muted {
        color: #bbb !important;
    }
</style>
@endsection