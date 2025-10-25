@extends('user.layouts.layout')
@section('title', 'Sign Up')
@section('section')
<section>
    <div class="container mx-auto">
        <div class="row form-container">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg p-4 rounded-4 border-0">
                    <h2 class="text-center mb-4 text-primary">Create Your Account</h2>

                    {{-- Display Session Messages --}}
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('sign.up.store') }}">
                        @csrf

                        {{-- Full Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}" 
                                placeholder="Enter your full name" 
                                required
                            >
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

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
                                placeholder="Create a password" 
                                required
                            >
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                placeholder="Re-enter your password" 
                                required
                            >
                        </div>

                         {{-- Role Selection --}}
                        <div class="mb-3">
                            <label for="role" class="form-label fw-semibold">Select Role</label>
                            <select 
                                name="role" 
                                id="role" 
                                class="form-select @error('role') is-invalid @enderror" 
                                required
                            >
                                <option value="" disabled selected>Select your role</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2 rounded-3">Register</button>
                        </div>

                        {{-- Login Redirect --}}
                        <div class="text-center mt-3">
                            <span class="text-muted">Already have an account?</span>
                            <a href="{{ route('sign.in') }}" class="text-decoration-none text-primary ms-1">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
