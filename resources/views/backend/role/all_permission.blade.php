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
                        <li class="breadcrumb-item active" aria-current="page">Daftar Hak Akses</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.permission') }}" class="btn btn-primary px-5">Tambahkan Hak Akses</a>
                </div>
                <div class="btn-group">
                    <a href="{{ route('import.permission') }}" class="btn btn-warning px-5">Impor</a>
                </div>
                <div class="btn-group">
                    <a href="{{ route('export') }}" class="btn btn-danger px-5">Ekspor</a>
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
                                <th>Nama Hak Akses</th>
                                <th>Grup</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->group_name }}</td>
                                    <td>
                                        <a href="{{ route('edit.permission', $item->id) }}"
                                            class="btn btn-warning px-3 radius-30">
                                            Ubah</a>
                                        <a href="{{ route('delete.permission', $item->id) }}"
                                            class="btn btn-danger px-3 radius-30" id="delete">Hapus</a>
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
