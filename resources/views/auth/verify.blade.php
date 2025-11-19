@extends('layouts.app')
@section('title','Verify')

@section('main-content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y d-flex justify-content-center align-items-center" style="min-height: 100vh;"">
        <div class="authentication-inner py-4">
            <!-- Verify Email Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    @include('includes.logo')
                    <!-- /Logo -->

                    <h4 class="mb-2">Verify Your Email Address ✉️</h4>
                    <p class="mb-4">Please check your email inbox for a verification link to activate your account.</p>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            A new verification link has been sent to your email address.
                        </div>
                    @endif

                    <p class="mb-4">Didn’t receive the email? Click below to resend the verification link.</p>

                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary d-grid w-100">
                            Resend Verification Email
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                            Back to Login
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Verify Email Card -->
        </div>
    </div>
</div>
@endsection

