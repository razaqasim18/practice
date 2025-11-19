<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    @include('includes.links')
    @vite(['resources/css/checkout.css'])
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <a class="navbar-brand" href="">
            <img class="mx-5" src="{{ asset('assets/img/favicon/Screenshot_2025-11-07_144537-removebg-preview.png') }}"
                alt="logo">
        </a>
    </nav>

    <div class="container py-5" style="background-color: #f9eff9;">
        <div class="row g-4">
            <!-- LEFT COLUMN -->
            <div class="col-lg-7 bg-white p-4 rounded-3 shadow-sm">
                <h4 class="fw-bold mb-4">Contact</h4>
                <form action="">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Email">
                    </div>

                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="subscribe">
                        <label class="form-check-label" for="subscribe">
                            Email me with news and offers
                        </label>
                    </div>

                    <h4 class="fw-bold mb-3">Delivery</h4>

                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <select class="form-select">
                            <option>Select city</option>
                            <option>Karachi</option>
                            <option>Lahore</option>
                            <option>Islamabad</option>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Country/Region</label>
                        <select class="form-select">
                            <option>Pakistan</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Last name">
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Apartment, suite, etc. (optional)">
                    </div>

                    <div class="mt-5">
                        <h4 class="fw-bold">Payment</h4>
                        <p class="text-muted mb-3">All transactions are secure and encrypted.</p>

                        <div class="">

                            <div class="form-check p-3 border border-light rounded-bottom">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="cod">
                                <label class="form-check-label ms-2 fw-semibold" for="cod">
                                    Cash on Delivery (COD)
                                </label>
                                <p class="small text-muted mt-2">
                                    Get a Free Delivery With Prepaid Orders.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- BILLING ADDRESS SECTION -->
                    <div class="mt-4">
                        <h5 class="fw-bold">Billing address</h5>

                        <div class="border rounded-3">
                            <div class="form-check p-3 border-bottom border-light border-2 rounded-top">
                                <input class="form-check-input" type="radio" name="billingAddress" id="sameAddress">
                                <label class="form-check-label ms-2" for="sameAddress">
                                    Same as shipping address
                                </label>
                            </div>

                            <div class="form-check p-3">
                                <input class="form-check-input" type="radio" name="billingAddress"
                                    id="differentAddress">
                                <label class="form-check-label ms-2" for="differentAddress">
                                    Use a different billing address
                                </label>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- COMPLETE ORDER BUTTON -->
                <div class="mt-4">
                    <button class="btn w-100 py-3 fw-bold text-white btn-order">
                        Complete order
                    </button>
                </div>

            </div>

            <!-- RIGHT COLUMN -->
            <div class="col-lg-5">
                <div class="bg-white p-4 rounded-3 shadow-sm order-summary">
                    <h5 class="fw-bold mb-3">Your Cart</h5>
                    @foreach ($cart as $row)
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ $row->attributes['image'] ? asset('uploads/products') . '/' . $row->attributes['image'] : asset('assets/img/products/strawberry.png') }}"
                                class="rounded me-3" alt="">
                            <div class="flex-grow-1">
                                <p class="mb-1 fw-semibold">{{ $row->name }}</p>
                            </div>
                            <span>Rs {{ (float) $row->price * (float) $row->quantity }}</span>
                        </div>
                    @endforeach
                    <hr />
                    <div class="d-flex justify-content-around">
                        <h3>Total:</h3>
                        <h3>Rs: {{ \Cart::session(Auth::user()->id)->getSubTotal() }}</h3>
                    </div>


                </div>
            </div>

        </div>
    </div>


</body>

</html>
