@extends('layouts.app')
@section('title', 'Forgot Password')

@section('main-content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="authentication-inner" style="max-width: 420px; width: 100%;">
      <!-- Forgot Password Card -->
      <div class="card shadow-sm border-0" style="border-radius: 1rem;">
        <div class="card-body p-4">
          <!-- Logo -->
          <div class="text-center mb-3">
            @include('includes.logo')
          </div>
          <!-- /Logo -->

          <h4 class="mb-2 text-center fw-semibold">Forgot Password? 🔒</h4>
          <p class="mb-4 text-center text-muted">
            Enter your email and we’ll send you instructions to reset your password
          </p>

          <!-- Forgot Password Form -->
          <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label text-uppercase fw-bold small text-muted">Email</label>
              <input
                type="email"
                id="email"
                name="email"
                class="form-control form-control-lg @error('email') is-invalid @enderror"
                placeholder="Enter your email"
                value="{{ old('email') }}"
                required
                autofocus
                style="border-radius: .5rem;"
              >
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary d-grid w-100 py-2 fw-semibold" style="border-radius: .5rem;">
              Send Reset Link
            </button>
          </form>
          <!-- /Forgot Password Form -->

          @if (session('status'))
            <div class="alert alert-success mt-3 text-center" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center text-primary fw-semibold" style="text-decoration: none;">
              <i class="bx bx-chevron-left bx-sm"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password Card -->
    </div>
  </div>
</div>
@endsection
