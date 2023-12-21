@php
    $setting = App\Models\SiteSetting::find(1);
@endphp
<footer class="footer-area footer-bg">
    <div class="container">
        <div class="footer-top pt-100 pb-70">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('backend/assets/images/logo-homestay.png') }}"
                                    style="max-width: 20%; height: auto;" alt="Images">
                            </a>
                        </div>
                        <ul class="footer-list-contact">
                            <li>
                                <i class='bx bx-home-alt'></i>
                                <a href="#">{{ $setting->address }}</a>
                            </li>
                            <li>
                                <i class='bx bx-phone-call'></i>
                                <a href="tel:+1-(123)-456-7890">{{ $setting->phone }}</a>
                            </li>
                            <li>
                                <i class='bx bx-envelope'></i>
                                <a href="mailto:hello@atoli.com">{{ $setting->email }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="footer-widget">
                        <h3>Berlangganan</h3>
                        <div class="footer-form">
                            <form class="newsletter-form" data-toggle="validator" method="POST">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Alamat Email"
                                                name="EMAIL" required autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-bg-one">
                                            Langganan Sekarang
                                        </button>
                                        <div id="validator-newsletter" class="form-result"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copy-right-area">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="copy-right-text text-align1">
                        <p>
                            Copyright @
                            <script>
                                document.write(new Date().getFullYear())
                            </script> {{ $setting->copyright }}. All Rights Reserved
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="social-icon text-align2">
                        <ul class="social-link">
                            <li>
                                <a href="{{ $setting->facebook }}" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="{{ $setting->instagram }}" target="_blank"><i class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="{{ $setting->youtube }}" target="_blank"><i class='bx bxl-youtube'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
