@extends('frontend.main')

@section('main')
    <!-- Banner Area -->
    <div class="banner-area" style="height: 480px;">
        <div class="container">
            <div class="banner-content">
                <h1>Booking Homestay di Borobudur</h1>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Banner Form Area -->
    <div class="banner-form-area">
        <div class="container">
            <div class="banner-form">
                <form method="GET" action="{{ route('booking.search') }}">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label>CHECK IN</label>
                                <div class="input-group">
                                    <input autocomplete="off" required name="check_in" type="text"
                                        class="form-control dt_picker" placeholder="yyyy-mm-dd">
                                    <span class="input-group-addon"></span>
                                </div>
                                <i class='bx bxs-chevron-down'></i>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label>CHECK OUT</label>
                                <div class="input-group">
                                    <input autocomplete="off" type="text" required name="check_out"
                                        class="form-control dt_picker" placeholder="yyyy-mm-dd">
                                    <span class="input-group-addon"></span>
                                </div>
                                <i class='bx bxs-chevron-down'></i>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2">
                            <div class="form-group">
                                <label>TAMU</label>
                                <select name="persion" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <button type="submit" class="default-btn btn-bg-one border-radius-5">
                                Cek Ketersediaan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Banner Form Area End -->

    <!-- Room Area -->
    @include('frontend.home.room_area')
    <!-- Room Area End -->

    <!-- Book Area Two-->
    @include('frontend.home.room_area_two')
    <!-- Book Area Two End -->

    <!-- Services Area Three -->
    @include('frontend.home.services')
    <!-- Services Area Three End -->

    <!-- Team Area Three -->
    @include('frontend.home.team')
    <!-- Team Area Three End -->

    <!-- Testimonials Area Three -->
    {{-- @include('frontend.home.testimonial') --}}
    <!-- Testimonials Area Three End -->

    <!-- FAQ Area -->
    {{-- @include('frontend.home.faq') --}}
    <!-- FAQ Area End -->

    <!-- Blog Area -->
    @include('frontend.home.blog')
    <!-- Blog Area End -->
@endsection
