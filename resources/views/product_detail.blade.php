@extends('layouts.quickbasketlayout')
@section('title', 'Product Detail | QuickBasket')
@section('content')
    <div class="product-section">
        <!-- Product Image -->
        <div class="detailproduct-image">
            <img src="{{ $product->featured_image ? asset('uploads/products') . '/' . $product->featured_image : asset('assets/img/products/strawberry.png') }}"
                alt="{{ $product->product_name }}">
        </div>
        <!-- Product Info -->
        <div class="product-info">
            <div>
                <h3 class="product-title">{{ $product->product_name }}</h3>
                {{-- <small class="text-muted">SKU: 0001</small> --}}
                <p class="product-price mt-2">${{ $product->price }}</p>

                <label class="fw-semibold mb-1">Quantity</label>
                <div class="quantity-selector mb-3">
                    <button>-</button>
                    <input type="text" value="1">
                    <button>+</button>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>

                <div class="accordion" id="productAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseInfo">
                                Product Info
                            </button>
                        </h2>
                        <div id="collapseInfo" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                {{ $product->description }}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseReturn">
                                Return & Refund Policy
                            </button>
                        </h2>
                        <div id="collapseReturn" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                You can return the item within 7 days of purchase in its original condition.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseShipping">
                                Shipping Info
                            </button>
                        </h2>
                        <div id="collapseShipping" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                We deliver across Pakistan within 3–5 business days.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
