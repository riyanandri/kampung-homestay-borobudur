@extends('frontend.main')

@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg-room">
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
                            <form action="{{ route('user_booking_store', $roomDetails->id) }}" method="POST"
                                id="bk_form">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $roomDetails->id }}">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Check in</label>
                                            <div class="input-group">
                                                <input autocomplete="off" type="text" required name="check_in"
                                                    id="check_in" class="form-control dt_picker"
                                                    value="{{ old('check_in') ? date('Y-m-d', strtotime(old('check_in'))) : '' }}">
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class='bx bxs-calendar'></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Check Out</label>
                                            <div class="input-group">
                                                <input autocomplete="off" type="text" required name="check_out"
                                                    id="check_out" class="form-control dt_picker"
                                                    value="{{ old('check_out') ? date('Y-m-d', strtotime(old('check_out'))) : '' }}">
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class='bx bxs-calendar'></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Jumlah Orang</label>
                                            <select class="form-control" name="persion" id="nmbr_person">
                                                @for ($i = 1; $i <= 4; $i++)
                                                    <option {{ old('persion') == $i ? 'selected' : '' }}
                                                        value="0{{ $i }}">0{{ $i }} </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" id="total_adult" value="{{ $roomDetails->total_adult }}">
                                    <input type="hidden" id="room_price" value="{{ $roomDetails->price }}">
                                    <input type="hidden" id="discount_p" value="{{ $roomDetails->discount }}">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Jumlah Kamar</label>
                                            <select class="form-control number_of_rooms" name="number_of_rooms"
                                                id="select_room">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <option value="0{{ $i }}">0{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <input type="hidden" name="available_room" id="available_room">
                                        <p class="available_room"></p>
                                    </div>

                                    <div class="col-lg-12">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p> SubTotal</p>
                                                    </td>
                                                    <td style="text-align: right"><span class="t_subtotal">0</span></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <p> Diskon</p>
                                                    </td>
                                                    <td style="text-align: right"><span class="t_discount">0</span></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <p> Total</p>
                                                    </td>
                                                    <td style="text-align: right"><span class="t_g_total">0</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                                    <img src="{{ asset('upload/room_img/multi_img/' . $image->multi_img) }}"
                                        alt="Images">
                                </div>
                            @endforeach

                        </div>





                        <div class="room-details-title">
                            <h2>{{ $roomDetails->roomType->name }}</h2>
                            <ul>

                                <li>
                                    <b> Harga : Rp. {{ $roomDetails->price }}/Malam</b>
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
                                                    <a href="#"> <b>Kapasitas : </b>
                                                        {{ $roomDetails->room_capacity }}
                                                        Orang<i class='bx bxs-cloud-download'></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"> <b>Size : </b> {{ $roomDetails->size }} ft2<i
                                                            class='bx bxs-cloud-download'></i></a>
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
                                                    <a href="#"> <b>View : </b> {{ $roomDetails->view }} <i
                                                            class='bx bxs-cloud-download'></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"> <b>Bed Style : </b> {{ $roomDetails->bed_style }}
                                                        <i class='bx bxs-cloud-download'></i></a>
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
                                            <textarea name="message" class="form-control" cols="30" rows="8" required
                                                data-error="Write your message" placeholder="Write your review here.... "></textarea>
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
                                            <a
                                                href="{{ url('room/details/' . $item->id) }}">{{ $item['roomType']['name'] }}</a>
                                        </h3>
                                        <span>Rp. {{ $item->price }} / Malam</span>
                                        <p>{{ $item->short_desc }}</p>
                                        <ul>
                                            <li><i class='bx bx-user'></i> {{ $item->room_capacity }} Orang</li>
                                            <li><i class='bx bx-expand'></i> {{ $item->size }} ft2</li>
                                        </ul>

                                        <ul>
                                            <li><i class='bx bx-show-alt'></i>{{ $item->view }}</li>
                                            <li><i class='bx bxs-hotel'></i> {{ $item->bed_style }}</li>
                                        </ul>

                                        <a href="room-details.html" class="book-more-btn">
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
    <!-- Room Details Other End -->

    <script>
        $(document).ready(function() {
            var check_in = "{{ old('check_in') }}";
            var check_out = "{{ old('check_out') }}";
            var room_id = "{{ $room_id }}";
            if (check_in != '' && check_out != '') {
                getAvaility(check_in, check_out, room_id);
            }
            $("#check_out").on('change', function() {
                var check_out = $(this).val();
                var check_in = $("#check_in").val();
                if (check_in != '' && check_out != '') {
                    getAvaility(check_in, check_out, room_id);
                }
            });
            $(".number_of_rooms").on('change', function() {
                var check_out = $("#check_out").val();
                var check_in = $("#check_in").val();
                if (check_in != '' && check_out != '') {
                    getAvaility(check_in, check_out, room_id);
                }
            });
        });

        function getAvaility(check_in, check_out, room_id) {
            $.ajax({
                url: "{{ route('check_room_availability') }}",
                data: {
                    room_id: room_id,
                    check_in: check_in,
                    check_out: check_out
                },
                success: function(data) {
                    $(".available_room").html('Availability : <span class="text-success">' + data[
                        'available_room'] + ' Rooms</span>');
                    $("#available_room").val(data['available_room']);
                    price_calculate(data['total_nights']);
                }
            });
        }

        function price_calculate(total_nights) {
            var room_price = $("#room_price").val();
            var discount_p = $("#discount_p").val();
            var select_room = $("#select_room").val();
            var sub_total = room_price * total_nights * parseInt(select_room);
            var discount_price = (parseInt(discount_p) / 100) * sub_total;
            $(".t_subtotal").text(sub_total);
            $(".t_discount").text(discount_price);
            $(".t_g_total").text(sub_total - discount_price);
        }
        $("#bk_form").on('submit', function() {
            var av_room = $("#available_room").val();
            var select_room = $("#select_room").val();
            if (parseInt(select_room) > av_room) {
                alert('Maaf, Anda memilih jumlah kamar maksimum');
                return false;
            }
            var nmbr_person = $("#nmbr_person").val();
            var total_adult = $("#total_adult").val();
            if (parseInt(nmbr_person) > parseInt(total_adult)) {
                alert('Maaf, Anda memilih jumlah maksimum orang');
                return false;
            }
        })
    </script>
@endsection
