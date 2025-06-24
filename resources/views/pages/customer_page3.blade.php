@extends('layout')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Ini Laman Customer 3</h1>

        <div class="mb-3">
            <a href="{{ url('/admin/page1') }}" class="btn btn-primary">Admin Page 1</a>
            <a href="{{ url('/admin/page2') }}" class="btn btn-primary">Admin Page 2</a>
            <a href="{{ url('/admin/page3') }}" class="btn btn-primary">Admin Page 3</a>
        </div>

        <div class="mb-3">
            <a href="{{ url('/customer/page1') }}" class="btn btn-secondary">Customer Page 1</a>
            <a href="{{ url('/customer/page2') }}" class="btn btn-secondary">Customer Page 2</a>
            <a href="{{ url('/customer/page3') }}" class="btn btn-secondary">Customer Page 3</a>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

    </div>
@endsection
