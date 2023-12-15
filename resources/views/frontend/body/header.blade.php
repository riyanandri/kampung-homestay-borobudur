@php
    $setting = App\Models\SiteSetting::find(1);
@endphp
<header class="top-header top-header-bg">
    <div class="container">
        <div class="row align-items-center">


            <div class="col-lg-12 col-md-12">
                <div class="header-right">
                    <ul>
                        <li>
                            <i class='bx bx-home-alt'></i>
                            <a href="#">{{ $setting->address }}</a>
                        </li>
                        <li>
                            <i class='bx bx-phone-call'></i>
                            <a href="tel:+1-(123)-456-7890">{{ $setting->phone }}</a>
                        </li>

                        @auth
                            <li>
                                <i class="bx bxs-dashboard"></i>
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li>
                                <i class="bx bxs-exit"></i>
                                <a href="{{ route('user.logout') }}">Logout</a>
                            </li>
                        @else
                            <li>
                                <i class='bx bxs-user-circle'></i>
                                <a href="{{ route('login') }}">Masuk</a>
                            </li>
                            <li>
                                <i class='bx bxs-user-rectangle'></i>
                                <a href="{{ route('register') }}">Daftar</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
