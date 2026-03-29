<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NileCart | Discover Egypt’s Treasures</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <style>
        :root {
            --gold: #d4af77;
            --navy: #0a2f4f;
        }

        body {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body.dark-mode {
            background-color: #121212 !important;
            color: #e0e0e0 !important;
        }
        body.dark-mode .navbar {
            background: #1a1a1a !important;
            border-bottom: 1px solid #333;
        }
        body.dark-mode .card {
            background-color: #1e1e1e;
            border-color: #333;
            color: white;
        }
        body.dark-mode .text-dark, body.dark-mode .nav-link {
            color: #e0e0e0 !important;
        }
        body.dark-mode .footer {
            background: #1a1a1a !important;
        }

        .navbar {
            background: var(--navy) !important;
        }
        .gold { color: var(--gold); }
        .hero {
            background: linear-gradient(rgba(10, 47, 79, 0.85), rgba(10, 47, 79, 0.85)),
                url('https://picsum.photos/id/1015/1920/1080') center/cover;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }


        .notification-area {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1050;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold fs-3" href="/">
    <svg width="40" height="40" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
        <path d="M50 15L15 80H85L50 15Z" stroke="#d4af77" stroke-width="3" fill="rgba(212, 175, 119, 0.1)"/>
        <path d="M50 15V80" stroke="#d4af77" stroke-width="2" stroke-dasharray="4 4"/>
        <path d="M30 80C30 80 40 70 50 70C60 70 70 80 70 80" stroke="#d4af77" stroke-width="2"/>
    </svg>
    
    <span style="letter-spacing: 2px;">NILE<span class="gold">CART</span></span>
</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            Cart <span class="badge bg-warning cart-badge">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">My Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    
                    <li class="nav-item ms-lg-3">
                        <button onclick="toggleTheme()" class="btn btn-outline-light btn-sm" id="theme-toggle" title="Toggle Dark/Light Mode">
                            <i class="fas fa-moon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="notification-area">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        function applyTheme(theme) {
            const icon = document.querySelector('#theme-toggle i');
            if (theme === 'dark') {
                document.body.classList.add('dark-mode');
                icon.classList.replace('fa-moon', 'fa-sun');
            } else {
                document.body.classList.remove('dark-mode');
                icon.classList.replace('fa-sun', 'fa-moon');
            }
        }

  
        const savedTheme = localStorage.getItem('theme') || 'light';
        applyTheme(savedTheme);

        function toggleTheme() {
            const isDark = document.body.classList.contains('dark-mode');
            const newTheme = isDark ? 'light' : 'dark';
            localStorage.setItem('theme', newTheme);
            applyTheme(newTheme);
        }

       
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 4000);
        });
    </script>
</body>
</html> 















