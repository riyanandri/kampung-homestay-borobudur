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
                        <li class="breadcrumb-item active" aria-current="page">Daftar Kamar</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.room.list') }}" class="btn btn-primary px-5">Tambah Booking</a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe Kamar</th>
                                <th>Nomor Kamar</th>
                                <th>Status Booking</th>
                                <th>Tgl Check In/Out</th>
                                <th>No Booking</th>
                                <th>Customer</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($room_number_list as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td> {{ $item->name }} </td>
                                    <td>{{ $item->room_number }}</td>
                                    <td>
                                        @if ($item->booking_id != '')
                                            @if ($item->booking_status == 1)
                                                <span class="badge bg-danger">Dipesan</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        @else
                                            <span class="badge bg-success">Tersedia</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->booking_id != '')
                                            <span class="badge rounded-pill bg-secondary">
                                                {{ date('d-m-Y', strtotime($item->check_in)) }}
                                            </span>
                                            to
                                            <span class="badge rounded-pill bg-info text-dark">
                                                {{ date('d-m-Y', strtotime($item->check_out)) }}
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->booking_id != '')
                                            {{ $item->booking_no }}
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->booking_id != '')
                                            {{ $item->customer_name }}
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->status == 'Active')
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Aktif</span>
                                        @endif
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
