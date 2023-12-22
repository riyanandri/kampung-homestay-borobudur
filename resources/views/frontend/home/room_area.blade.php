@php
    $room = App\Models\Room::latest()
        ->limit(4)
        ->get();
@endphp
<div class="room-area pt-100 pb-70 section-bg" style="background-color:#ffffff">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">Kamar</span>
            <h2>Kamar & Tarif</h2>
        </div>
        <div class="row pt-45">
            @foreach ($room as $item)
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
                                        <a
                                            href="{{ url('room/details/' . $item->id) }}">{{ $item['roomType']['name'] }}</a>
                                    </h3>
                                    <span>{{ formatRupiah($item->price) }} / Malam</span>
                                    <p>{{ $item->short_desc }}</p>
                                    <ul>
                                        <li><i class='bx bx-user'></i> {{ $item->room_capacity }} Orang</li>
                                        <li><i class='bx bx-expand'></i> {{ $item->size }} ft2</li>
                                    </ul>

                                    <ul>
                                        <li><i class='bx bx-trip'></i> {{ $item->view }}</li>
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
