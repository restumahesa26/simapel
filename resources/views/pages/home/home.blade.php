@extends('layouts.home')

@section('content')

<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <div class="">
                <a href="index.html" class="navbar-brand p-0">
                    <img src="{{ url('logo-iain.jpg') }}" alt="Logo" style="border-radius: 8px">
                </a>
                <span style="font-size: 26px; color: #fff; font-family: 'Heebo', sans-serif">Fakultas Syari'ah IAIN Kerinci</span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                    @if (Auth::user())
                        <a href="{{ route('dashboard') }}" class="nav-item nav-link">Dashboard</a>
                    @endif
                </div>
                @if (Auth::user())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="btn btn-light rounded-pill text-primary py-2 px-4 ms-lg-3" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light rounded-pill text-primary py-2 px-4 ms-lg-3">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light rounded-pill text-primary py-2 px-4 ms-lg-2">Register</a>
                @endif
            </div>
        </nav>

        <div class="container-xxl bg-primary hero-header">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h2 class="text-white mb-4 animated zoomIn">Sistem Manajemen Pelayanan Akademik Fakultas Syari'ah IAIN Kerinci</h2>
                        <p class="text-white pb-3 animated zoomIn">Melayani Mahasiswa dalam Mengurus segala urusan Administrasi Kampus</p>
                        <a href="{{ route('login') }}" class="btn btn-outline-light rounded-pill border-2 py-3 px-5 animated slideInRight">Login Sekarang</a>
                    </div>
                    <div class="col-lg-6 text-center text-lg-start">
                        <img class="img-fluid animated zoomIn" src="{{ url('frontend/img/illustration.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
@endsection
