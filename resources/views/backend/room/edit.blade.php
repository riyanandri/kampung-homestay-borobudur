@extends('admin.admin_dashboard')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">Kelola Kamar</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                        aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">Daftar Kamar</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
                                    <div class="col-xl-12 mx-auto">
                                        <div class="card">
                                            <div class="card-body p-4">
                                                <h5 class="mb-4">Perbarui Kamar</h5>
                                                <form class="row g-3" action="{{ route('update.room', $editData->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-4">
                                                        <label for="input1" class="form-label">Nama Tipe Kamar</label>
                                                        <input type="text" class="form-control" name="room_type_id"
                                                            id="input1" value="{{ $editData['roomType']['name'] }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="input2" class="form-label">Pengunjung
                                                            Dewasa (Max)</label>
                                                        <input type="number" class="form-control" name="total_adult"
                                                            id="input2" value="{{ $editData->total_adult }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="input2" class="form-label">Pengunjung Anak
                                                            Kecil (Max)</label>
                                                        <input type="number" class="form-control" name="total_child"
                                                            id="input2" value="{{ $editData->total_child }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="input4" class="form-label">Gambar Utama</label>
                                                        <input type="file" class="form-control" name="image"
                                                            id="image">
                                                        <img id="showImage"
                                                            src="{{ !empty($editData->image) ? url('upload/room_img/' . $editData->image) : url('upload/no_image.jpg') }}"
                                                            alt="room" class="bg-primary" width="60">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="input3" class="form-label">Galeri</label>
                                                        <input type="file" class="form-control" name="multi_img[]"
                                                            id="multiImg"
                                                            accept="image/jpeg, image/jpg, image/gif, image/png" multiple>
                                                        @foreach ($multi_img as $item)
                                                            <img src="{{ !empty($item->multi_img) ? url('upload/room_img/multi_img/' . $item->multi_img) : url('upload/no_image.jpg') }}"
                                                                alt="room" class="bg-primary" width="60">

                                                            <a href="{{ route('multi.image.delete', $item->id) }}"><i
                                                                    class="lni lni-close"></i> </a>
                                                        @endforeach
                                                        <div class="row" id="preview_img"></div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="input1" class="form-label">Harga Kamar</label>
                                                        <input type="number" class="form-control" name="price"
                                                            id="input1" value="{{ $editData->price }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="input1" class="form-label">Ukuran</label>
                                                        <input type="text" class="form-control" name="size"
                                                            id="input1" value="{{ $editData->size }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="input2" class="form-label">Diskon (%)</label>
                                                        <input type="number" class="form-control" name="discount"
                                                            id="input2" value="{{ $editData->discount }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="input2" class="form-label">Kapasitas Kamar
                                                            (Max)</label>
                                                        <input type="number" class="form-control" name="room_capacity"
                                                            id="input2" value="{{ $editData->room_capacity }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="input7" class="form-label">Wisata</label>
                                                        <select name="view" id="input7" class="form-select">
                                                            <option>Pilih</option>
                                                            <option value="Agrowisata"
                                                                {{ $editData->view == 'Agrowisata' ? 'selected' : '' }}>
                                                                Agrowisata</option>
                                                            <option value="Andong Trifting"
                                                                {{ $editData->view == 'Andong Trifting' ? 'selected' : '' }}>
                                                                Andong Trifting</option>
                                                            <option value="Outbond"
                                                                {{ $editData->view == 'Outbond' ? 'selected' : '' }}>
                                                                Outbond</option>
                                                            <option value="Trip Tour"
                                                                {{ $editData->view == 'Trip Tour' ? 'selected' : '' }}>
                                                                Trip Tour</option>
                                                            <option value="Tidak Memiliki Paket Wisata"
                                                                {{ $editData->view == 'Tidak Memiliki Paket Wisata' ? 'selected' : '' }}>
                                                                Tidak Memiliki Paket Wisata</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="input7" class="form-label">Bed Style</label>
                                                        <select name="bed_style" id="input7" class="form-select">
                                                            <option>Pilih</option>
                                                            <option value="King Bed"
                                                                {{ $editData->bed_style == 'King Bed' ? 'selected' : '' }}>
                                                                King Bed</option>
                                                            <option value="Queen Bed"
                                                                {{ $editData->bed_style == 'Queen Bed' ? 'selected' : '' }}>
                                                                Queen Bed</option>
                                                            <option value="Twin Bed"
                                                                {{ $editData->bed_style == 'Twin Bed' ? 'selected' : '' }}>
                                                                Twin Bed</option>
                                                            <option value="Single Bed"
                                                                {{ $editData->bed_style == 'Single Bed' ? 'selected' : '' }}>
                                                                Single Bed</option>
                                                            <option value="Double Bed"
                                                                {{ $editData->bed_style == 'Double Bed' ? 'selected' : '' }}>
                                                                Double Bed</option>
                                                            <option value="King Size"
                                                                {{ $editData->bed_style == 'King Size' ? 'selected' : '' }}>
                                                                King Size</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="input5" class="form-label">Deskripsi Singkat</label>
                                                        <textarea class="form-control" name="short_desc" rows="3" id="input5" placeholder="Description">{{ $editData->short_desc }}</textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="input5" class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" name="description" rows="3" id="myeditorinstance">{!! $editData->description !!}</textarea>
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="col-md-12 mb-3">
                                                            @forelse ($basic_facility as $item)
                                                                <div class="basic_facility_section_remove"
                                                                    id="basic_facility_section_remove">
                                                                    <div class="row add_item">
                                                                        <div class="col-md-8">
                                                                            <label for="facility_name" class="form-label">
                                                                                Fasilitas</label>
                                                                            <select name="facility_name[]"
                                                                                id="facility_name" class="form-control">
                                                                                <option>Pilih</option>
                                                                                <option value="Area Parkir"
                                                                                    {{ $item->facility_name == 'Area Parkir' ? 'selected' : '' }}>
                                                                                    Area Parkir</option>
                                                                                <option value="TV"
                                                                                    {{ $item->facility_name == 'TV' ? 'selected' : '' }}>
                                                                                    TV</option>

                                                                                <option value="Kipas Angin"
                                                                                    {{ $item->facility_name == 'Kipas Angin' ? 'selected' : '' }}>
                                                                                    Kipas Angin</option>

                                                                                <option value="AC"
                                                                                    {{ $item->facility_name == 'AC' ? 'selected' : '' }}>
                                                                                    AC</option>

                                                                                <option value="Kamar Mandi Luar"
                                                                                    {{ $item->facility_name == 'Kamar Mandi Luar' ? 'selected' : '' }}>
                                                                                    Kamar Mandi Luar</option>

                                                                                <option value="Kamar Mandi Dalam"
                                                                                    {{ $item->facility_name == 'Kamar Mandi Dalam' ? 'selected' : '' }}>
                                                                                    Kamar Mandi Dalam</option>

                                                                                <option value="Ruang Keluarga"
                                                                                    {{ $item->facility_name == 'Ruang Keluarga' ? 'selected' : '' }}>
                                                                                    Ruang Keluarga</option>

                                                                                <option value="Rain Tamu"
                                                                                    {{ $item->facility_name == 'Ruang Tamu' ? 'selected' : '' }}>
                                                                                    Ruang Tamu</option>

                                                                                <option value="Wi-Fi"
                                                                                    {{ $item->facility_name == 'Wi-Fi' ? 'selected' : '' }}>
                                                                                    Wi-Fi</option>

                                                                                <option value="Water Heater"
                                                                                    {{ $item->facility_name == 'Water Heater' ? 'selected' : '' }}>
                                                                                    Water Heater</option>

                                                                                <option value="Dapur"
                                                                                    {{ $item->facility_name == 'Dapur' ? 'selected' : '' }}>
                                                                                    Dapur</option>

                                                                                <option value="Kulkas"
                                                                                    {{ $item->facility_name == 'Kulkas' ? 'selected' : '' }}>
                                                                                    Kulkas</option>

                                                                                <option value="Mesin Cuci"
                                                                                    {{ $item->facility_name == 'Mesin Cuci' ? 'selected' : '' }}>
                                                                                    Mesin Cuci</option>

                                                                                <option value="Dispenser"
                                                                                    {{ $item->facility_name == 'Dispenser' ? 'selected' : '' }}>
                                                                                    Dispenser</option>

                                                                                <option value="Mushola"
                                                                                    {{ $item->facility_name == 'Mushola' ? 'selected' : '' }}>
                                                                                    Mushola</option>

                                                                                <option value="Ruang Makan"
                                                                                    {{ $item->facility_name == 'Ruang Makan' ? 'selected' : '' }}>
                                                                                    Ruang Makan</option>

                                                                                <option value="Coffee break"
                                                                                    {{ $item->facility_name == 'Coffee Break' ? 'selected' : '' }}>
                                                                                    Coffee Break</option>

                                                                                <option value="Extra Bed"
                                                                                    {{ $item->facility_name == 'Extra Bed' ? 'selected' : '' }}>
                                                                                    Extra Bed</option>

                                                                                <option value="Paket Breakfast"
                                                                                    {{ $item->facility_name == 'Paket Breakfast' ? 'selected' : '' }}>
                                                                                    Paket Breakfast</option>

                                                                                <option value="Kafe"
                                                                                    {{ $item->facility_name == 'Kafe' ? 'selected' : '' }}>
                                                                                    Kafe</option>

                                                                                <option value="Butik"
                                                                                    {{ $item->facility_name == 'Butik' ? 'selected' : '' }}>
                                                                                    Butik</option>

                                                                                <option value="Treadmill"
                                                                                    {{ $item->facility_name == 'Treadmill' ? 'selected' : '' }}>
                                                                                    Treadmill</option>

                                                                                <option value="Sepeda"
                                                                                    {{ $item->facility_name == 'Sepeda' ? 'selected' : '' }}>
                                                                                    Sepeda</option>

                                                                                <option value="Mini Bar"
                                                                                    {{ $item->facility_name == 'Mini Bar' ? 'selected' : '' }}>
                                                                                    Mini Bar</option>

                                                                                <option value="Oven"
                                                                                    {{ $item->facility_name == 'Oven' ? 'selected' : '' }}>
                                                                                    Oven</option>

                                                                                <option value="Kompor"
                                                                                    {{ $item->facility_name == 'Kompor' ? 'selected' : '' }}>
                                                                                    Kompor</option>

                                                                                <option value="Lemari"
                                                                                    {{ $item->facility_name == 'Lemari' ? 'selected' : '' }}>
                                                                                    Lemari</option>

                                                                                <option value="Pendopo"
                                                                                    {{ $item->facility_name == 'Pendopo' ? 'selected' : '' }}>
                                                                                    Pendopo</option>

                                                                                <option value="Sound System"
                                                                                    {{ $item->facility_name == 'Sound System' ? 'selected' : '' }}>
                                                                                    Sound System</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group"
                                                                                style="padding-top: 30px;">
                                                                                <a class="btn btn-success addeventmore"><i
                                                                                        class="lni lni-circle-plus"></i></a>
                                                                                <span
                                                                                    class="btn btn-danger btn-sm removeeventmore"><i
                                                                                        class="lni lni-circle-minus"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @empty

                                                                <div class="basic_facility_section_remove"
                                                                    id="basic_facility_section_remove">
                                                                    <div class="row add_item">
                                                                        <div class="col-md-6">
                                                                            <label for="basic_facility_name"
                                                                                class="form-label">Fasilitas</label>
                                                                            <select name="facility_name[]"
                                                                                id="basic_facility_name"
                                                                                class="form-control">
                                                                                <option>Pilih</option>
                                                                                <option value="Area Parkir">
                                                                                    Area Parkir</option>
                                                                                <option value="TV">TV</option>
                                                                                <option value="Kipas Angin">Kipas Angin
                                                                                </option>
                                                                                <option value="AC">AC</option>
                                                                                <option value="Kamar Mandi Dalam">Kamar
                                                                                    Mandi Luar
                                                                                </option>
                                                                                <option value="Kamar Mandi Dalam">Kamar
                                                                                    Mandi Dalam
                                                                                </option>
                                                                                <option value="Ruang Keluarga">Ruang
                                                                                    Keluarga
                                                                                </option>
                                                                                <option value="Ruang Tamu">Ruang Tamu
                                                                                </option>
                                                                                <option value="Wi-Fi">Wi-Fi</option>
                                                                                <option value="Water Heater">Water Heater
                                                                                </option>
                                                                                <option value="Dapur">Dapur</option>
                                                                                <option value="Kulkas">
                                                                                    Kulkas</option>
                                                                                <option value="Mesin Cuci">
                                                                                    Mesin Cuci</option>
                                                                                <option value="Dispenser">Dispenser
                                                                                </option>
                                                                                <option value="Mushola">Mushola</option>
                                                                                <option value="Ruang Makan">Ruang Makan
                                                                                </option>
                                                                                <option value="Coffe Break">Coffe Break
                                                                                </option>
                                                                                <option value="Extra Bed">Extra Bed
                                                                                </option>
                                                                                <option value="Paket Breakfast">Paket
                                                                                    Breakfast</option>
                                                                                <option value="Kafe">Kafe</option>
                                                                                <option value="Butik">Butik</option>
                                                                                <option value="Treadmill">Treadmill
                                                                                </option>
                                                                                <option value="Sepeda">Sepeda</option>
                                                                                <option value="Mini Bar">Mini Bar</option>
                                                                                <option value="Oven">Oven</option>
                                                                                <option value="Kompor">Kompor</option>
                                                                                <option value="Lemari">Lemari</option>
                                                                                <option value="Pendopo">Pendopo</option>
                                                                                <option value="Sound System">Sound System
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group"
                                                                                style="padding-top: 30px;">
                                                                                <a class="btn btn-success addeventmore"><i
                                                                                        class="lni lni-circle-plus"></i></a>

                                                                                <span
                                                                                    class="btn btn-danger removeeventmore"><i
                                                                                        class="lni lni-circle-minus"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="col-md-12">
                                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                                            <button type="submit" class="btn btn-primary px-4">Simpan
                                                                Perubahan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <a class="card-title btn btn-primary float-right" onclick="addRoomNo()"
                                                id="addRoomNo">
                                                <i class="lni lni-plus">Tambah Kamar</i>
                                            </a>
                                            <div class="roomnoHide" id="roomnoHide">
                                                <form action="{{ route('room.number.store', $editData->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="room_type_id"
                                                        value="{{ $editData->room_type_id }}">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="input2" class="form-label">No Kamar</label>
                                                            <input type="text" name="room_number" class="form-control"
                                                                id="input2">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="input7" class="form-label">Status</label>
                                                            <select name="status" id="input7" class="form-select">
                                                                <option>Pilih</option>
                                                                <option value="Active">Aktif</option>
                                                                <option value="Inactive">Tidak Aktif</option>

                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <button type="submit" class="btn btn-success"
                                                                style="margin-top: 28px;">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <table class="table mb-0 table-striped" id="roomview">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No Kamar</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($roomNumber as $item)
                                                        <tr>
                                                            <td>{{ $item->room_number }}</td>
                                                            <td>{{ $item->status }}</td>
                                                            <td>
                                                                <a href="{{ route('edit.room.number', $item->id) }}"
                                                                    class="btn btn-warning px-3 radius-30">
                                                                    Ubah</a>
                                                                <a href="{{ route('delete.room.number', $item->id) }}"
                                                                    class="btn btn-danger px-3 radius-30" id="delete">
                                                                    Hapus</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <!--------===Show MultiImage ========------->
    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element 
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
    <!--========== Start of add Basic Plan Facilities ==============-->
    <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="basic_facility_section_remove" id="basic_facility_section_remove">
                <div class="container mt-2">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="basic_facility_name">Fasilitas</label>
                            <select name="facility_name[]" id="basic_facility_name" class="form-control">
                                <option>Pilih</option>
                                <option value="Area Parkir">
                                    Area Parkir</option>
                                <option value="TV">TV</option>
                                <option value="Kipas Angin">Kipas Angin
                                </option>
                                <option value="AC">AC</option>
                                <option value="Kamar Mandi Dalam">Kamar
                                    Mandi Luar
                                </option>
                                <option value="Kamar Mandi Dalam">Kamar
                                    Mandi Dalam
                                </option>
                                <option value="Ruang Keluarga">Ruang
                                    Keluarga
                                </option>
                                <option value="Ruang Tamu">Ruang Tamu
                                </option>
                                <option value="Wi-Fi">Wi-Fi</option>
                                <option value="Water Heater">Water Heater
                                </option>
                                <option value="Dapur">Dapur</option>
                                <option value="Kulkas">
                                    Kulkas</option>
                                <option value="Mesin Cuci">
                                    Mesin Cuci</option>
                                <option value="Dispenser">Dispenser
                                </option>
                                <option value="Mushola">Mushola</option>
                                <option value="Ruang Makan">Ruang Makan
                                </option>
                                <option value="Coffe Break">Coffe Break
                                </option>
                                <option value="Extra Bed">Extra Bed
                                </option>
                                <option value="Paket Breakfast">Paket
                                    Breakfast</option>
                                <option value="Kafe">Kafe</option>
                                <option value="Butik">Butik</option>
                                <option value="Treadmill">Treadmill
                                </option>
                                <option value="Sepeda">Sepeda</option>
                                <option value="Mini Bar">Mini Bar</option>
                                <option value="Oven">Oven</option>
                                <option value="Kompor">Kompor</option>
                                <option value="Lemari">Lemari</option>
                                <option value="Pendopo">Pendopo</option>
                                <option value="Sound System">Sound System
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="padding-top: 20px">
                            <span class="btn btn-success addeventmore"><i class="lni lni-circle-plus"></i></span>
                            <span class="btn btn-danger removeeventmore"><i class="lni lni-circle-minus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeeventmore", function(event) {
                $(this).closest("#basic_facility_section_remove").remove();
                counter -= 1
            });
        });
    </script>
    <!--========== End of Basic Plan Facilities ==============-->

    <script type="text/javascript">
        $('#roomnoHide').hide();
        $('#roomview').show();

        function addRoomNo() {
            $('#roomnoHide').show();
            $('#roomview').hide();
            $('#addRoomNo').hide();
        }
    </script>
@endsection
