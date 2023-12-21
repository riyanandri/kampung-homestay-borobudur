@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Tipe Kamar</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                @if (Auth::user()->can('room.type.add'))
                    <div class="btn-group">
                        <a href="{{ route('add.room.type') }}" class="btn btn-primary px-5">Tambah Tipe Kamar</a>
                    </div>
                @endif
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Daftar Tipe Kamar</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key => $item)
                                @php
                                    $rooms = App\Models\Room::where('room_type_id', $item->id)->get();
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ !empty($item->room->image) ? url('upload/room_img/' . $item->room->image) : url('upload/no_image.jpg') }}"
                                            alt="" style="width: 50px; height: 30px;">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @foreach ($rooms as $roo)
                                            @if (Auth::user()->can('room.type.edit'))
                                                <a href="{{ route('edit.room', $roo->id) }}"
                                                    class="btn btn-warning px-3 radius-30">Ubah</a>
                                            @endif
                                            @if (Auth::user()->can('room.type.delete'))
                                                <a href="{{ route('delete.room', $roo->id) }}"
                                                    class="btn btn-danger px-3 radius-30" id="delete">Hapus</a>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <hr />
    </div>
@endsection
