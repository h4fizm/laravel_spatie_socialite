@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4 text-center">Login</h2>

        {{-- Form Login Manual --}}
        <form method="POST" action="{{ route('login.manual') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        {{-- Link ke halaman register --}}
        <div class="mt-3 text-center">
            <a href="{{ route('register') }}">Belum punya akun? Daftar</a>
        </div>

        <hr>

        {{-- Tombol Login Google --}}
        <div class="text-center mt-3">
            <a href="{{ url('/auth/google') }}" class="btn btn-danger w-100">
                <i class="bi bi-google"></i> Login dengan Google
            </a>
        </div>
    </div>
</div>
@endsection
