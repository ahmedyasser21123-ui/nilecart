@extends('layout')

@section('content')
<div class="container my-5 py-5">
    <div class="text-center mb-5">
        <h2 class="gold fw-bold display-5 uppercase tracking-wider">
            <i class="fas fa-envelope-open-text me-3"></i>Reach Out to Us
        </h2>
        <div class="divider mx-auto mb-3"></div>
        <p class="text-muted fs-5">Whether you're seeking a lost treasure or have a question, we are here to help.</p>
    </div>

    {{-- إظهار رسالة النجاح --}}
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-lg rounded-4 mb-4 text-center py-3">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row g-5 align-items-stretch">
        {{-- كارت معلومات التواصل --}}
        <div class="col-lg-5">
            <div class="contact-info-card h-100 p-4 shadow-lg rounded-4 d-flex flex-column justify-content-between">
                <div>
                    <h4 class="gold mb-4 fw-bold">Contact Details</h4>
                    
                    <div class="d-flex align-items-center mb-4 contact-item">
                        <div class="icon-box me-3"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <p class="mb-0 fw-bold text-white">Location</p>
                            <span class="text-light small opacity-75">123 Nile Street, Cairo, Egypt</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4 contact-item">
                        <div class="icon-box me-3"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <p class="mb-0 fw-bold text-white">Phone</p>
                            <span class="text-light small opacity-75">+20 10 647 709 152</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4 contact-item">
                        <div class="icon-box me-3"><i class="fas fa-paper-plane"></i></div>
                        <div>
                            <p class="mb-0 fw-bold text-white">Email</p>
                            <span class="text-light small opacity-75">ahmedyasserrrrrr2@gmial.com</span>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-top border-secondary">
                    <h6 class="gold mb-3 fw-bold">Follow the Legacy</h6>
                    <div class="d-flex gap-3">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-x-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- فورم التواصل --}}
        <div class="col-lg-7">
            <div class="contact-form-card p-4 shadow-lg rounded-4 h-100">
                <h4 class="text-navy mb-4 fw-bold">Send us a Message</h4>
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-secondary">NAME</label>
                            <input type="text" name="name" class="form-control custom-input" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-secondary">EMAIL</label>
                            <input type="email" name="email" class="form-control custom-input" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">SUBJECT</label>
                        <input type="text" name="subject" class="form-control custom-input" placeholder="How can we help?">
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-secondary">MESSAGE</label>
                        <textarea name="message" class="form-control custom-input" rows="5" placeholder="Write your message here..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-gold-action w-100 py-3 rounded-pill fw-bold shadow">
                        SEND MESSAGE <i class="fas fa-paper-plane ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* تعريف الألوان الأساسية */
    :root {
        --gold: #d4af37;
        --navy: #0a192f;
        --dark-bg: #112240;
    }

    .gold { color: var(--gold) !important; }
    .text-navy { color: var(--navy); }
    .divider { width: 60px; height: 3px; background: var(--gold); }

    .contact-info-card { background: var(--navy); border: 1px solid rgba(212, 175, 119, 0.2); }
    .contact-form-card { background: #fff; border: 1px solid #eee; }

    .icon-box {
        width: 45px; height: 45px; background: rgba(212, 175, 119, 0.1);
        border: 1px solid var(--gold); color: var(--gold);
        display: flex; align-items: center; justify-content: center;
        border-radius: 10px; font-size: 1.2rem;
    }

    .custom-input {
        background: #f9f9f9; border: 1px solid #eee; padding: 12px; border-radius: 12px; transition: 0.3s;
    }
    .custom-input:focus {
        background: #fff; border-color: var(--gold); box-shadow: 0 0 10px rgba(212, 175, 119, 0.2);
        outline: none;
    }

    .btn-gold-action { background: var(--gold); color: var(--navy); border: none; transition: 0.4s; }
    .btn-gold-action:hover { 
        background: #c5a069; 
        transform: translateY(-3px); 
        box-shadow: 0 10px 20px rgba(212, 175, 119, 0.3); 
        color: var(--navy);
    }

    .social-icon {
        width: 40px; height: 40px; border: 1px solid var(--gold); color: var(--gold);
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        text-decoration: none; transition: 0.3s;
    }
    .social-icon:hover { background: var(--gold); color: var(--navy); }

    /* دعم الوضع الليلي */
    body.dark-mode .contact-form-card { background: var(--dark-bg) !important; border-color: #233554 !important; }
    body.dark-mode .text-navy { color: var(--gold) !important; }
    body.dark-mode .custom-input { background: #112240; border-color: #233554; color: white; }
</style>
@endsection