@extends('layouts.app')

@section('title', 'Edit Product')

@section('main-content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Sidebar -->
            @include('includes.sidebar')

            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card shadow-sm p-4">
                            <h3 class="mb-4">Edit Product</h3>

                            @if (session()->get('success-update'))
                                <div class="alert alert-success">
                                    {{ session()->get('success-update') }}
                                </div>
                            @endif


                            <form action="{{ route('product.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="product_name" class="form-label">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" id="product_name"
                                            value="{{ old('product_name', $product->product_name) }}">
                                        @error('product_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="price" class="form-label">Price (Rs)</label>
                                        <input type="number" name="price" id="price" class="form-control"
                                            value="{{ old('price', $product->price) }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="discount" class="form-label">Discount (%)</label>
                                        <input type="number" name="discount" id="discount" class="form-control"
                                            value="{{ old('discount', $product->discount) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="is_active" class="form-label">Product Status</label>
                                        <select class="form-select" id="is_active" name="is_active" required>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('is_active')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="is_discounted" class="form-label">Discount Status</label>
                                        <select class="form-select" id="is_discounted" name="is_discounted">
                                            <option value="0" selected>No Discount</option>
                                            <option value="1">Discounted</option>
                                        </select>
                                        @error('is_discounted')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="in_stock" class="form-label">Stock Status</label>
                                        <select class="form-select" id="in_stock" name="in_stock">
                                            <option value="1" selected>In Stock</option>
                                            <option value="0">Out of Stock</option>
                                        </select>
                                        @error('in_stock')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="featured_image" class="form-label">Featured Image</label>
                                    <input type="file" name="featured_image" id="featured_image" class="form-control"
                                        accept="image/*">
                                    <div class="mt-2">
                                        <p class="text-muted">Current Image:</p>
                                        <img src="{{ asset('uploads/products/' . $product->featured_image) }}"
                                            width="100" class="rounded shadow-sm border">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="other_images" class="form-label">Other Images</label>
                                    <input type="file" name="other_images[]" id="other_images" class="form-control"
                                        accept="image/*" multiple>

                                    @if ($product->images && $product->images->count() > 0)
                                        <div class="mt-3">
                                            <p class="text-muted">Current Other Images:</p>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach ($product->images as $img)
                                                    <div class="border rounded p-1 position-relative"
                                                        style="width: 100px; height: 100px; overflow: hidden;">
                                                        <img src="{{ asset('uploads/product_images/' . $img->images) }}"
                                                            alt="Other Image"
                                                            style="width: 100%; height: 100%; object-fit: cover;">

                                                        <!-- Delete Button -->
                                                        <button type="button"
                                                        data-id="{{$img->id}}"
                                                            class="btn img-del btn-danger btn-sm position-absolute top-0 end-0"
                                                            style="border-radius: 50%; padding: 0.4rem 0.6rem;">×</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>



                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary px-4">Update Product</button>
                                    <a href="{{ route('product.index') }}" class="btn btn-secondary px-4">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottom-script')
    <script>
        $(document).ready(function() {
            $(".img-del").click(function(e) {
                e.preventDefault();
                let productId = $(this).data('id');
                // console.log(productId);
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
                            method: 'DELETE',
                            url: "{{ route('product.Imagedelete') }}" ,
                            data: {
                                _token: "{{ csrf_token() }}",
                                id:productId
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

        })
    </script>
@endsection
