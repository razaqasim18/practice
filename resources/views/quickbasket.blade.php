@extends('layouts.quickbasketlayout')

@section('title', 'Home | QuickBasket')

@section('custom-css')

@endsection
@section('content')

    <div class="container-fluid px-0">
        <div class="position-relative">
            <img src="{{ asset('images/c837a6_20940cddd86f444ba764870c37a3d83f~mv2.avif') }}" alt="Featured Image"
                class="img-fluid w-100 hero-image">
            <div class="hero-overlay d-flex flex-column justify-content-center align-items-center text-center">
                <h1 class="display-4 fw-bold mb-3">Welcome to QuickBasket</h1>
                <p class="lead mb-4">Your one-stop shop for fresh groceries and daily essentials.</p>
                <a href="#shop" class="btn btn-lg px-4 py-2 rounded-pill fw-semibold btn-shop text-white">Shop Now</a>
            </div>
        </div>
    </div>
    <br>
    <div class="features-container">
        <div class="features-grid">
            <!-- Free Delivery -->
            <div class="feature-item">
                <div class="icon-wrapper">
                    <svg class="icon delivery-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="6" width="15" height="11" rx="1" />
                        <path d="M16 8h2.5a1 1 0 0 1 .8.4l2.5 3.2a1 1 0 0 1 .2.6v4.8a1 1 0 0 1-1 1h-1" />
                        <circle cx="6" cy="19" r="2" />
                        <circle cx="17" cy="19" r="2" />
                        <path d="M9 19h6" />
                        <path d="M16 11h6" />
                    </svg>
                </div>
                <div class="feature-content">
                    <h3>Free Delivery</h3>
                    <p>To Your Door</p>
                </div>
            </div>

            <!-- Local Pickup -->
            <div class="feature-item">
                <div class="icon-wrapper">
                    <svg class="icon basket-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 10h14" />
                        <path d="M6 10l1.5 8a2 2 0 0 0 2 1.5h5a2 2 0 0 0 2-1.5l1.5-8" />
                        <path d="M8 10V6a4 4 0 0 1 8 0v4" />
                        <line x1="10" y1="14" x2="10" y2="16" />
                        <line x1="14" y1="14" x2="14" y2="16" />
                    </svg>
                </div>
                <div class="feature-content">
                    <h3>Local Pickup</h3>
                    <p>Check Out <a href="#">Locations</a></p>
                </div>
            </div>

            <!-- Available for You -->
            <div class="feature-item">
                <div class="icon-wrapper">
                    <svg class="icon support-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 11c0-3.866 3.134-7 7-7s7 3.134 7 7-3.134 7-7 7c-1.17 0-2.275-.29-3.25-.8L3 19l1.8-3.75A6.96 6.96 0 0 1 3 11z" />
                        <circle cx="12" cy="11" r="9" />
                        <path d="M9.5 9a2.5 2.5 0 0 1 5 0c0 1.5-2.5 2-2.5 3" />
                        <circle cx="12" cy="16" r="0.5" fill="#e31837" />
                    </svg>
                </div>
                <div class="feature-content">
                    <h3>Available for You</h3>
                    <p><a href="#">Online Support</a> 24/7</p>
                </div>
            </div>

            <!-- Order on the Go -->
            <div class="feature-item">
                <div class="icon-wrapper">
                    <svg class="icon phone-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="7" y="2" width="10" height="20" rx="2" />
                        <line x1="10" y1="19" x2="14" y2="19" />
                    </svg>
                </div>
                <div class="feature-content">
                    <h3>Order on the Go</h3>
                    <p><a href="#">Download</a> Our App</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    {{-- best deals --}}
    <div class="container my-5">
        <h1 class="mb-4 fw-bold">Best Deals</h1>

        <div id="dealsCarousel" class="carousel slide position-relative" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row g-5">
                        @foreach ($oldproducts as $product)
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="{{ $product->featured_image ? asset('uploads/products') . '/' . $product->featured_image : asset('assets/img/products/strawberry.png') }}"
                                        alt="{{ $product->product_name }}" class="product-image">
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                        <h6 class="product-title">{{ $product->product_name }}</h6>
                                    </a>
                                    <div class="mb-3">
                                        <span class="price-sale mx-2">${{ $product->price }}</span>
                                    </div>
                                    <div class="quantity-control">
                                        <button onclick="updateQuantity(this, -1)">−</button>
                                        <input type="number" value="1" min="1" readonly>
                                        <button onclick="updateQuantity(this, 1)">+</button>
                                    </div>
                                    <button class="btn-add-cart ">Add to Cart</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>

    {{-- categories --}}
    <div class="container my-5">
        <h1 class="mb-4 fw-bold">Most Popular Categories</h1>

        <div class="row justify-content-center g-0">
            @foreach ($categories as $category)
                <div class="col-6 col-md-3">
                    <a href="#" class="category-card">
                        <img src="{{ asset('assets/img/products/fruit.png') }}" alt="Fruits">
                        <div class="category-name">{{ $category->category_name }}</div>
                    </a>
                </div>
            @endforeach
        </div>
        {{-- end categories --}}
    </div>
    <br>
    <br>

    <div class="container my-5">
        <h1 class="mb-4 fw-bold ">Shop Fresh Finds</h1>

        <div id="dealsCarousel" class="carousel slide position-relative" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- First Slide -->
                <div class="carousel-item active">
                    <div class="row g-5">
                        @foreach ($freshproducts as $product)
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="{{ $product->featured_image ? asset('uploads/products') . '/' . $product->featured_image : asset('assets/img/products/strawberry.png') }}"
                                        alt="{{ $product->product_name }}" class="product-image">
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                        <h6 class="product-title">{{ $product->product_name }}</h6>
                                    </a>
                                    <div class="mb-3">
                                        <span class="price-sale mx-2">${{ $product->price }}</span>
                                    </div>
                                    <div class="quantity-control">
                                        <button onclick="updateQuantity(this, -1)">−</button>
                                        <input type="number" value="1" min="1" readonly>
                                        <button onclick="updateQuantity(this, 1)">+</button>
                                    </div>
                                    <button class="btn-add-cart addtocartbtn" data-id="{{ $product->id }}">Add to
                                        Cart</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('bottom-script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateQuantity(btn, change) {
            const input = btn.parentElement.querySelector('input');
            let value = parseInt(input.value) + change;
            if (value < 1) value = 1;
            input.value = value;
        }
    </script>
@endsection
