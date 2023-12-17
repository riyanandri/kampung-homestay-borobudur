@php
    $setting = App\Models\SiteSetting::find(1);
@endphp
<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset($setting->logo) }}" class="logo-one" alt="Logo">
            <img src="{{ asset($setting->logo) }}" class="logo-two" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset($setting->logo) }}" class="logo-one" alt="Logo">
                    <img src="{{ asset($setting->logo) }}" class="logo-two" alt="Logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link active">
                                Beranda
                            </a>
                        </li>

                        @php
                            $room = App\Models\Room::latest()->get();
                        @endphp

                        <li class="nav-item">
                            <a href="{{ route('all.rooms') }}" class="nav-link">
                                Semua Kamar
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($room as $item)
                                    <li class="nav-item">
                                        <a href="{{ url('room/details/' . $item->id) }}" class="nav-link">
                                            {{ $item['roomType']['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('blog.list') }}" class="nav-link">
                                Blog
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('about.us') }}" class="nav-link">
                                Tentang Kami
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contact.us') }}" class="nav-link">
                                Kontak
                            </a>
                        </li>

                        <li class="nav-item-btn">
                            <a href="#" class="default-btn btn-bg-one border-radius-5">Pesan Sekarang</a>
                        </li>
                    </ul>

                    <div class="nav-btn">
                        <a href="#" class="default-btn btn-bg-one border-radius-5">Pesan Sekarang</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
