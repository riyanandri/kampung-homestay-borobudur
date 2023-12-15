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
                    <li>Masuk</li>
                </ul>
                <h3>Masuk</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Sign In Area -->
    <div class="sign-in-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span class="sp-color">Masuk</span>
                                <h2>Masuk ke akun anda!</h2>
                            </div>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                            <input type="text" name="login" id="login" class="form-control"
                                                required data-error="Please enter your Username or Email"
                                                placeholder="Email atau Telepon">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" type="password" id="password" name="password"
                                                placeholder="Kata Sandi">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 form-condition">
                                        <div class="agree-label">
                                            <input type="checkbox" id="chb1">
                                            <label for="chb1">
                                                Ingat Saya
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <a class="forget" href="{{ route('password.request') }}">Lupa kata sandi?</a>
                                    </div>

                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" class="default-btn btn-bg-three border-radius-5">
                                            Masuk Sekarang
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <p class="account-desc">
                                            Buat akun?
                                            <a href="{{ route('register') }}">Daftar</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In Area End -->
@endsection
