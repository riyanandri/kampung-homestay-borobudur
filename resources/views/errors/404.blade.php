@extends('frontend.main')

@section('main')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg9">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>404 Error!</li>
                </ul>
                <h3>404 Error!</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Start 404 Error -->
    <div class="error-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="error-content">
                    <h1>4<span>0</span>4</h1>
                    <h3>Ups! Halaman tidak ditemukan</h3>
                    <p>Halaman yang anda cari tidak tersedia.</p>
                    <a href="{{ url('/') }}" class="default-btn btn-bg-three">
                        Kembali ke beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 Error -->
@endsection
