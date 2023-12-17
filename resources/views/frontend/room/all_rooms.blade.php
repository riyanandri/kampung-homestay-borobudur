@extends('frontend.main')

@section('main')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg-room">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>Kamar</li>
                </ul>
                <h3>Kamar</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Room Area -->
    <div class="room-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">Kamar</span>
                <h2>Kamar & Tarif</h2>
            </div>
            <div class="row pt-45">

                @foreach ($rooms as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="room-card">
                            <a href="{{ url('room/details/' . $item->id) }}">
                                <img src="{{ asset('upload/room_img/' . $item->image) }}" alt="Images"
                                    style="width: 550px; height:300px;">
                            </a>
                            <div class="content">
                                <h6><a href="{{ url('room/details/' . $item->id) }}">{{ $item['roomType']['name'] }}</a>
                                </h6>
                                <ul>
                                    <li class="text-color">Rp. {{ $item->price }}</li>
                                    <li class="text-color">Malam</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- Room Area End -->
@endsection
