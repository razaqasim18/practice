{{-- resources/views/layouts/home.blade.php --}}
@extends('includes.links')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Default Title')</title>

    <link rel="stylesheet" href="{{ asset('') }}">
    @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/js/app.js'])

    {{-- Page-specific CSS --}}
    @yield('custom-css')

</head>

<body>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-auto">
                    <a href="#about" class="text-white text-decoration-none me-4">About Us</a>
                    <a href="#support" class="text-white text-decoration-none">Customer Support</a>
                </div>
                <div class="col text-center text-white">
                    Get 20% off your first order.
                    <a href="#subscribe" class="text-white text-decoration-underline">Subscribe</a>
                </div>
                <div class="col-auto">
                    <a href="#login" class="text-white text-decoration-none d-flex align-items-center gap-2">
                        <i class="far fa-user"></i>
                        Log In
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="main-header">
        <div class="container-fluid px-4">
            <div class="row align-items-center py-3">
                <div class="col-auto">
                    <div class="logo">{{ config('app.name') }}</div>
                </div>
                <div class="col">
                    <div class="search-bar mx-auto">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex gap-4 align-items-center">
                        <a href="#location" class="text-white fs-4">
                            <i class="fas fa-map-marker-alt"></i>
                        </a>
                        <a href="#favorites" class="text-white fs-4">
                            <i class="far fa-heart"></i>
                        </a>
                        <a href="#cart" class="text-white fs-4 position-relative">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count" id="cartcounter">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg main-nav">
        <div class="container-fluid px-4">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav gap-4">
                    <li class="nav-item"><a class="nav-link">Deals</a></li>
                    <li class="nav-item"><a class="nav-link">Food</a></li>
                    <li class="nav-item"><a class="nav-link">Beverages</a></li>
                    <li class="nav-item"><a class="nav-link">Household</a></li>
                    <li class="nav-item"><a class="nav-link">Personal Care</a></li>
                    <li class="nav-item ms-auto"><a class="nav-link orders-link" href="#orders">My Orders</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')



    <!--Footer-->
    <footer>
        <div class="footer-container">
            <div class="footer-columns">
                <!-- About Us Column -->
                <div class="footer-column">
                    <h3>About Us</h3>
                    <p>We are committed to providing the best products and services to our customers with free delivery
                        and 24/7 support.</p>
                    <div class="social-links d-flex justify-content-center gap-3 mt-4">
                        <a href="" class="text-dark fs-4"><i class="bx bxl-facebook-circle"></i></a>
                        <a href="" class="text-dark fs-4"><i class="bx bxl-twitter"></i></a>
                        <a href="" class="text-dark fs-4"><i class="bx bxl-instagram"></i></a>
                        <a href="" class="text-dark fs-4"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

                <!-- Customer Service Column -->
                <div class="footer-column">
                    <h3>Customer Service</h3>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Shipping & Delivery</a></li>
                        <li><a href="#">Returns & Exchanges</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Size Guide</a></li>
                    </ul>
                </div>

                <!-- Quick Links Column -->
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Shop All</a></li>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="#">Best Sellers</a></li>
                        <li><a href="#">Sale</a></li>
                        <li><a href="#">Gift Cards</a></li>
                        <li><a href="#">Store Locations</a></li>
                    </ul>
                </div>

                <!-- Newsletter Column -->
                <div class="footer-column">
                    <h3>Newsletter</h3>
                    <p>Subscribe to get special offers, free giveaways, and updates.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Enter your email">
                        <button type="submit">Subscribe</button>
                    </form>
                    <div class="payment-methods">
                        <svg width="50" height="30" viewBox="0 0 50 30" fill="none">
                            <rect width="50" height="30" rx="4" fill="#fff" />
                            <text x="25" y="19" text-anchor="middle" font-size="10" fill="#000"
                                font-weight="bold">VISA</text>
                        </svg>
                        <svg width="50" height="30" viewBox="0 0 50 30" fill="none">
                            <rect width="50" height="30" rx="4" fill="#fff" />
                            <circle cx="20" cy="15" r="8" fill="#EB001B" />
                            <circle cx="30" cy="15" r="8" fill="#F79E1B" />
                        </svg>
                        <svg width="50" height="30" viewBox="0 0 50 30" fill="none">
                            <rect width="50" height="30" rx="4" fill="#fff" />
                            <text x="25" y="19" text-anchor="middle" font-size="8" fill="#000"
                                font-weight="bold">PayPal</text>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 Your Company. All rights reserved. | <a href="#">Privacy Policy</a> | <a
                        href="#">Terms of Service</a></p>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("button.addtocartbtn").click(function(e) {
                e.preventDefault();

                let cartid = $(this).data("id");

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    method: "GET",
                    data: {
                        id: cartid,
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "success",
                            text: "product is added",
                        });
                        $("span#cartcounter").text(response.total_products ?? 0);
                        // Example: show a success alert
                    },
                    error: function(xhr) {
                        console.error(xhr);
                        error = Json.parse(xhr.responseText(xhr));
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Something went wrong while adding to cart!",
                        });
                    },
                });
            });
        });

        getOrderCount();

        function getOrderCount() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                method: "GET",
                data: {},
                success: function(response) {
                    $("span#cartcounter").text(response.total_products ?? 0);
                    // Example: show a success alert
                },
                error: function(xhr) {
                    console.error(xhr);
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Something went wrong while adding to cart!",
                    });
                },
            });
        }
    </script>
    @yield('bottom-script')
</body>
