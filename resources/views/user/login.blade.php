@extends('user.layouts.layout')
@section('title', 'Sign In')
@section('section')
<section>
    <div class="container mx-auto">
        <div class="row form-container">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg p-4 rounded-4 border-0">
                    <h2 class="text-center mb-4 text-primary">Sign In to Your Account</h2>

                    {{-- Display Session Messages --}}
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                placeholder="Enter your email" 
                                required
                            >
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                id="password" 
                                name="password" 
                                placeholder="Enter your password" 
                                required
                            >
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Remember Me --}}
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div> -->

                        {{-- Submit Button --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2 rounded-3">Login</button>
                        </div>

                        {{-- Forgot Password / Register Links --}}
                        <div class="text-center mt-3">
                            <a href="{{ route('forgot.password') }}" class="text-decoration-none text-muted me-2">Forgot Password?</a>
                            |
                            <a href="{{ route('sign.up') }}" class="text-decoration-none text-primary ms-2">Create Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection