@extends('frontend.main')

@section('main')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg1">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>Tentang Kami</li>
                </ul>
                <h3>Tentang Kami</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- About Area -->
    <div class="about-area pt-100 pb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="assets/img/about/about-img3.jpg" alt="Images">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title">
                            <h2>Sedikit Cerita dari Kampung Homestay Borobudur</h2>
                            <p style="text-align: justify">
                                Kampung Homestay berdiri sejak tahun 2017 dan disahkan oleh Bupati Magelang. Kampung ini
                                berlokasi di Dusun Ngaran II yang hanya berjarak 1 KM dari Candi Borobudur. Mulanya, kampung
                                ini di pelopori oleh Bapak Puguh Tri Warsono sebagai pencetus ide sebelum akhirnya dibentuk
                                sebuah paguyuban homestay dengan memaanfaatkan potensi yang ada. Paguyuban homestay ini
                                diketuai oleh Bapak Muslich sejak dibentuknya paguyuban tersebut.
                            </p>
                            <p style="text-align: justify">
                                Saat ini, setidaknya terdapat 30 Homestay aktif yang siap di persewakan kepada wisatawan.
                                Terdapat berbagai tipe homestay, seperti Hommy, Semi Modern, Joglo, bahkan berkonsep seperti
                                kos – kos an pun ada. Tidak hanya itu, Kampung Homestay juga memberikan pengalaman unik bagi
                                para pengunjung yang menginap di sana. Terdapat beberapa UMKM seperti Jejeg Art sebagai
                                pengrajin payung lukis maupun Pandan Ngaran Craft sebagai pengrajin anyam pandan,
                                berkeliling sepeda dan melihat kehidupan sehari-hari masyarakat sekitar, hingga menikmati
                                masakan khas Jawa yang lezat.
                            </p>
                            <p style="text-align: justify">
                                Selain itu, homestay – homestay disini juga memiliki suasana yang tenang dan nyaman. Kamu
                                bisa bersantai di teras rumah sambil menikmati segelas teh atau kopi hangat, sambil
                                menikmati pemandangan sawah yang luas. Kamu juga bisa berinteraksi dengan para penduduk
                                lokal yang ramah dan bersahabat. Bagi kamu yang ingin merasakan pengalam liburan seperti di
                                rumah, jelas ini solusi yang tepat untuk kamu coba. tidak hanya candi borobudur saja,
                                Kampung Homestay juga dekat dengan beberapa wisata disekitarnya, seprti svargabumi, Gereja
                                Ayam, Punthuk Setumbu, Wisata Gethek Balong dan Watu Putih.
                            </p>
                            <p style="text-align: justify">
                                Tunggu apa lagi? Booking sekarang juga di Kampung Homestay dan raih pengalaman liburan yang
                                tak terlupakan di dekat Candi Borobudur!
                            </p>
                        </div>

                        <div class="about-form">
                            <form method="GET" action="{{ route('booking.search') }}">
                                @csrf
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>Check in</label>
                                            <div class="input-group">
                                                <input id="datetimepicker" type="text" name="check_in"
                                                    class="form-control" placeholder="09/29/2020">
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class='bx bxs-calendar'></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>Check Out</label>
                                            <div class="input-group">
                                                <input id="datetimepicker-check" type="text" name="check_out"
                                                    class="form-control" placeholder="09/29/2020">
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class='bx bxs-calendar'></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>Tamu</label>
                                            <select name="persion" class="form-control">
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                                <option>05</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-bg-three border-radius-5">
                                            Cek Ketersediaan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    <!-- Choose Area -->
    <div class="choose-area pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Homestay Terbaik di Borobudur</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-4 col-md-6">
                    <div class="choose-card">
                        <i class="flaticon-restaurant"></i>
                        <h3>Wisata Kuliner</h3>
                        <p>
                            Beragam kuliner yang sangat wajib untuk anda coba disekitar area homestay kami dan tentunya
                            dengan harga yang terjangkau
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="choose-card">
                        <i class="flaticon-wifi-signal-1"></i>
                        <h3>Akses Internet</h3>
                        <p>
                            Tempat di mana anda akan mendapatkan zona wifi gratis dengan harga yang wajar yang akan membantu
                            keperluan anda
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="choose-card">
                        <i class="flaticon-fireworks"></i>
                        <h3>Nuansa Pedesaan</h3>
                        <p>
                            Disini anda akan merasakan nuansa menginap di pedesaan dan dikelilingi oleh berbagai objek
                            wisata yang sangat menarik untuk dikunjungi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Choose Area End -->
@endsection
