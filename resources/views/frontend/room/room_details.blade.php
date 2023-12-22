@extends('frontend.main')

@section('main')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg-room-detail">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>Detail Kamar</li>
                </ul>
                <h3>{{ $roomDetails->roomType->name }}</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Room Details Area End -->
    <div class="room-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="room-details-side">
                        <div class="side-bar-form">
                            <h3>Detail Pesanan</h3>
                            <form>
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Check in</label>
                                            <div class="input-group">
                                                <input id="datetimepicker" type="text" class="form-control"
                                                    placeholder="mm/dd/yyyy">
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class='bx bxs-calendar'></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Check Out</label>
                                            <div class="input-group">
                                                <input id="datetimepicker-check" type="text" class="form-control"
                                                    placeholder="mm/dd/yyyy">
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class='bx bxs-calendar'></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Jumlah Tamu</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Jumlah Kamar</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-bg-three border-radius-5">
                                            Pesan Sekarang
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="room-details-article">
                        <div class="room-details-slider owl-carousel owl-theme">
                            @foreach ($multiImage as $image)
                                <div class="room-details-item">
                                    <img src="{{ asset('upload/room_img/multi_img/' . $image->multi_img) }}" alt="Images">
                                </div>
                            @endforeach
                        </div>

                        <div class="room-details-title">
                            <h2>{{ $roomDetails->roomType->name }}</h2>
                            <ul>
                                <li>
                                    <b> Harga : {{ formatRupiah($roomDetails->price) }} / Malam</b>
                                </li>
                            </ul>
                        </div>

                        <div class="room-details-content">
                            <p>
                                {!! $roomDetails->description !!}
                            </p>
                            <div class="side-bar-plan">
                                <h3>Fasilitas</h3>
                                <ul>
                                    @foreach ($facility as $fac)
                                        <li><a href="#">{{ $fac->facility_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="services-bar-widget">
                                        <h3 class="title">Detail Kamar</h3>
                                        <div class="side-bar-list">
                                            <ul>
                                                <li>
                                                    <a href="#"> <b>Kapasitas : </b> {{ $roomDetails->room_capacity }}
                                                        Orang<i class='bx bxs-cloud-download'></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"> <b>Ukuran : </b> {{ $roomDetails->size }}
                                                        m<sup>2</sup><i class='bx bxs-cloud-download'></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="services-bar-widget">
                                        <h3 class="title">Detail Kamar</h3>
                                        <div class="side-bar-list">
                                            <ul>
                                                <li>
                                                    <a href="#"> <b>Wisata : </b> {{ $roomDetails->view }} <i
                                                            class='bx bxs-cloud-download'></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"> <b>Bed Style : </b> {{ $roomDetails->bed_style }} <i
                                                            class='bx bxs-cloud-download'></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="room-details-review">
                            <h2>Clients Review and Retting's</h2>
                            <div class="review-ratting">
                                <h3>Your retting: </h3>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" cols="30" rows="8" required data-error="Write your message"
                                                placeholder="Write your review here.... "></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-bg-three">
                                            Submit Review
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Details Area End -->

    <!-- Room Details Other -->
    <div class="room-details-other pb-70">
        <div class="container">
            <div class="room-details-text">
                <h2>Kamar Lainnya</h2>
            </div>

            <div class="row ">
                @foreach ($otherRooms as $item)
                    <div class="col-lg-6">
                        <div class="room-card-two">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-4 p-0">
                                    <div class="room-card-img">
                                        <a href="{{ url('room/details/' . $item->id) }}">
                                            <img src="{{ asset('upload/room_img/' . $item->image) }}" alt="Images">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-8 p-0">
                                    <div class="room-card-content">
                                        <h3>
                                            <a style="color: black;"
                                                href="{{ url('room/details/' . $item->id) }}">{{ $item['roomType']['name'] }}</a>
                                        </h3>
                                        <span>{{ formatRupiah($item->price) }} / Malam</span>
                                        <p>{{ $item->short_desc }}</p>
                                        <ul>
                                            <li><i class='bx bx-user'></i> {{ $item->room_capacity }} Orang</li>
                                            <li><i class='bx bx-expand'></i> {{ $item->size }} m<sup>2</sup></li>
                                        </ul>

                                        <ul>
                                            <li><i class='bx bx-show-alt'></i> {{ $item->view }}</li>
                                            <li><i class='bx bxs-hotel'></i> {{ $item->bed_style }}</li>
                                        </ul>

                                        <a href="{{ url('room/details/' . $item->id) }}" class="book-more-btn">
                                            Pesan Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
