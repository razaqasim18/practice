@extends('layouts.app')

@section('title', 'Category')

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
                                <a class="nav-link dropdown-toggle hide-arrow" 
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
                                <h2 class="mb-0">Categories</h2>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                                    <i class="bx bx-plus me-1"></i> Add Category
                                </button>
                            </div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                @if (session('success-update'))
                                    <div class="alert alert-success">{{ session('success-update') }}</div>
                                @endif

                                @if (session('error-update'))
                                    <div class="alert alert-danger">{{ session('error-update') }}</div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($categories as $category)
                                                <tr>
                                                    <td>{{ $category->category_name }}</td>
                                                    <td class="text-center">

                                                        <button type="button"
                                                            class="btn btn-link edit-button text-body p-0 border-0"
                                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                                            data-id="{{ $category->id }}"
                                                            data-cat="{{ $category->category_name }}">
                                                            <i class="bx bx-edit-alt me-2"></i>
                                                        </button>

                                                            <button type="button" class="btn btn-delete btn-link p-0 border-0" data-id="{{ $category->id }}">
                                                                <i class="bx bx-trash text-danger"></i>
                                                            </button>

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" class="text-center text-muted">No categories found
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
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('category.save') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Category Name</label>
                        <input type="text" id="Category_name" name="category_name" class="form-control">
                    </div>
                    <div class="mx-4 text-danger" id="category_error">
                        @error('category_name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="btn-add" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editCategoryForm" action="{{ route('category.update') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="cat_id" id="editCategoryId" class="form-control" hidden>
                        <input type="text" name="edit_category_name" id="editCategoryName" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('bottom-script')
    <script>
        $(document).ready(function() {
            $('.edit-button').click(function() {
                // getting data
                let categoryId = $(this).data('id');
                let categoryName = $(this).data('cat');

                // set values in modal
                $('#editCategoryId').val(categoryId);
                $('#editCategoryName').val(categoryName);
            });

            //add ajax
            $('#btn-add').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('category.save') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        category_name: $("input[name='category_name']").val()
                    },

                    success: function(response) {
                        $('#categoryModal').modal('hide');
                        $('.modal-backdrop').remove();
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },


                    error: function(response) {
                        var response = JSON.parse(response.responseText)
                        if (response.status == "errors") {
                            let errors = response.errors;


                            if (errors.category_name && errors.category_name.length > 0) {
                                $('#category_error').text(errors.category_name[0]);
                            }
                            if (errors.type && errors.type.length > 0) {
                                $('#category_error').text(errors.category_name[0]);

                            }
                        }
                    }
                });
            });

            //delete ajax
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
                            method: 'GET',
                            url:"{{route('category.delete')}}"+"/"+productId,
                            data: {

                            },
                            success: function() {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Category has been deleted.",
                                    icon: "success"
                                });
                            }


                        });

                    }
                });
            });
        });
    </script>

@endsection
