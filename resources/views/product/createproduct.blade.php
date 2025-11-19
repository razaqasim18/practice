@extends('layouts.app')

@section('title', 'Product')

@section('main-content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Sidebar -->
        @include('includes.sidebar')

        <!-- Layout container -->
        <div class="layout-page">

            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
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

                                <li><div class="dropdown-divider"></div></li>
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
                                <li><div class="dropdown-divider"></div></li>
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
                    </ul>
                </div>
            </nav>

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-header bg-green rounded-top-4">
                            <h4 class="mb-0">Add New Product</h4>
                        </div>

                        <div class="card-body p-4">
                            <form action="{{ route('product.insert') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (session('success_add'))
                                    <div class="alert alert-success">{{ session('success_add') }}</div>
                                @endif
                                @if (session('error_add'))
                                    <div class="alert alert-danger">{{ session('error_add') }}</div>
                                @endif

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" id="name"
                                            placeholder="Enter product name" value="{{ old('product_name') }}">
                                        @error('product_name')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_name" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_name')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" id="description" rows="3"
                                        placeholder="Enter product description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">Price (Rs)</label>
                                        <input type="number" name="price" class="form-control" id="price"
                                            placeholder="Enter price" value="{{ old('price') }}">
                                        @error('price')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="discount" class="form-label">Discount (%)</label>
                                        <input type="number" name="discount" class="form-control" id="discount"
                                            placeholder="Enter discount" value="{{ old('discount') }}">
                                        @error('discount')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="is_active" class="form-label">Product Status</label>
                                        <select class="form-select" id="is_active" name="is_active" required>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="is_discounted" class="form-label">Discount Status</label>
                                        <select class="form-select" id="is_discounted" name="is_discounted">
                                            <option value="0" selected>No Discount</option>
                                            <option value="1">Discounted</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="in_stock" class="form-label">Stock Status</label>
                                        <select class="form-select" id="in_stock" name="in_stock">
                                            <option value="1" selected>In Stock</option>
                                            <option value="0">Out of Stock</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="featuredImage" class="form-label">Featured Image</label>
                                    <input class="form-control" type="file" name="featured_image" id="featuredImage"
                                        accept="image/*">
                                </div>

                                <div class="mb-3">
                                    <label for="otherImages" class="form-label">Other Images</label>
                                    <input class="form-control" type="file" name="other_images[]" id="otherImages"
                                        accept="image/*" multiple>
                                    <div class="form-text">You can upload multiple images.</div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary px-4">Add Product</button>
                                </div>
                            </form>
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
