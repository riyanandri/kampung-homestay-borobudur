@extends('frontend.main')

@section('main')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg2">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>Kontak</li>
                </ul>
                <h3>Kontak</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Contact Area -->
    <div class="contact-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="contact-content">
                        <div class="section-title">
                            <h2>Kontak Kami</h2>
                        </div>
                        <div class="contact-img">
                            <img src="{{ asset('frontend/assets/img/contact/contact-img1.jpg') }}" alt="Images">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-form">
                        <form method="POST" action="{{ route('store.contact') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required
                                            data-error="Please enter your name" placeholder="Nama Lengkap">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required
                                            data-error="Please enter your email" placeholder="Alamat Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone_number" required
                                            data-error="Please enter your number" class="form-control" placeholder="No Hp">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" id="msg_subject" class="form-control" required
                                            data-error="Please enter your subject" placeholder="Subjek">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8" required
                                            data-error="Write your message" placeholder="Pesan"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn btn-bg-three">
                                        Kirim Pesan
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->

    @php
        $setting = App\Models\SiteSetting::find(1);
    @endphp

    <!-- contact Another -->
    <div class="contact-another pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-another-content">
                        <div class="section-title">
                            <h2>Informasi Kontak</h2>
                        </div>

                        <div class="contact-item">
                            <ul>
                                <br>
                                <li>
                                    <i class='bx bx-home-alt'></i>
                                    <div class="content">
                                        <span>{{ $setting->address }}</span>
                                    </div>
                                </li>
                                <br>
                                <li>
                                    <i class='bx bx-phone-call'></i>
                                    <div class="content">
                                        <span><a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></span>
                                    </div>
                                </li>
                                <br>
                                <li>
                                    <i class='bx bx-envelope'></i>
                                    <div class="content">
                                        <span><a href="{{ $setting->email }}">{{ $setting->email }}</a></span>
                                    </div>
                                </li>
                                <br>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="contact-another-img">
                        <img src="{{ asset('frontend/assets/img/contact/contact-img2.jpg') }}" alt="Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact Another End -->
@endsection
