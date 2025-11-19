@extends('layouts.app')

@section('title', 'Product List')

@section('main-content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Sidebar -->
            @include('includes.sidebar')

            <!-- Layout container -->
            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->

                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">
                                                        {{ Auth::user()->name ?? 'Guest' }}
                                                    </span>
                                                    <small class="text-muted">
                                                        {{ Auth::user()->email ?? '' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>


                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>

                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h2 class="mb-0">Products</h2>

                            </div>

                            <div class="card-body">
                                @if (session('DLTsuccess'))
                                    <div class="alert alert-success">{{ session('DLTsuccess') }}</div>
                                @endif



                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Category Name</th>
                                                <th>Price (Rs)/KG</th>
                                                <th>Discount (%)</th>
                                                <th>Is Discounted?</th>
                                                <th>Feature Image</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>
                                                      {{$product->category->category_name}}
                                                    </td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->discount }}</td>
                                                    <td>
                                                        @if ($product->discount > 0)
                                                            <span class="badge bg-success">Yes</span>
                                                        @else
                                                            <span class="badge bg-secondary">No</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('uploads/products/' . $product->featured_image) }}"
                                                            width="80"
                                                            height="80"style="object-fit: cover; border-radius: 8px;">
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('product.edit', $product->id) }}"
                                                            class="btn btn-link text-body p-0 border-0">
                                                            <i class="bx bx-edit-alt me-2"></i>
                                                        </a>
                                                        <button id="btn-delete" type="button" data-id="{{ $product->id }}"
                                                            class="btn btn-delete btn-link p-0 border-0">
                                                            <i class="bx bx-trash text-danger"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted">
                                                        No products found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Content wrapper -->

            </div>
            <!-- /Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

@endsection
@section('bottom-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".btn-delete").click(function(e) {
                e.preventDefault();
                let productId = $(this).data('id');
                //console.log(productId);
                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to delete this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            url: "{{ route('product.delete') }}" + "/" + productId,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function() {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "product has been deleted.",
                                    icon: "success"
                                });
                            }


                        });

                    }
                });
            });
        });
    </script>
