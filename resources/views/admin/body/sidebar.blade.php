<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text"></h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dasbor</div>
            </a>
        </li>
        @if (Auth::user()->can('owner.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Kelola Owner</div>
                </a>
                <ul>
                    @if (Auth::user()->can('owner.all'))
                        <li> <a href="{{ route('all.owner') }}"><i class='bx bx-radio-circle'></i>Data Owner</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('owner.add'))
                        <li> <a href="{{ route('add.owner') }}"><i class='bx bx-radio-circle'></i>Tambah Owner</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('bookarea.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Data Promo</div>
                </a>
                <ul>
                    @if (Auth::user()->can('update.bookarea'))
                        <li> <a href="{{ route('book.area') }}"><i class='bx bx-radio-circle'></i>Update Promo
                                Booking</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('room.type.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Kelola Tipe Kamar</div>
                </a>
                <ul>
                    @if (Auth::user()->can('room.type.list'))
                        <li> <a href="{{ route('room.type.list') }}"><i class='bx bx-radio-circle'></i>Daftar Tipe
                                Kamar</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        <li class="menu-label">Kelola Pesanan</li>
        @if (Auth::user()->can('booking.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-cart'></i>
                    </div>
                    <div class="menu-title">Pesanan</div>
                </a>
                <ul>
                    @if (Auth::user()->can('booking.list'))
                        <li> <a href="{{ route('booking.list') }}"><i class='bx bx-radio-circle'></i>Daftar Pesanan</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('booking.add'))
                        <li> <a href="{{ route('add.room.list') }}"><i class='bx bx-radio-circle'></i>Tambah Pesanan</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('room.list.menu'))
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                    </div>
                    <div class="menu-title">Kelola Kamar</div>
                </a>
                <ul>
                    @if (Auth::user()->can('room.list'))
                        <li> <a href="{{ route('view.room.list') }}"><i class='bx bx-radio-circle'></i>Daftar Kamar</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('booking.report.menu'))
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                    </div>
                    <div class="menu-title">Laporan Pesanan</div>
                </a>
                <ul>
                    <li> <a href="{{ route('booking.report') }}"><i class='bx bx-radio-circle'></i>Laporan Pesanan</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('contact.message.menu'))
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                    </div>
                    <div class="menu-title">Pesan Kontak</div>
                </a>
                <ul>
                    <li> <a href="{{ route('contact.message') }}"><i class='bx bx-radio-circle'></i>Daftar Pesan</a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="menu-label">Lain-Lain</li>
        {{-- @if (Auth::user()->can('setting.menu')) --}}
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Pengaturan</div>
            </a>
            <ul>
                <li> <a href="{{ route('smtp.setting') }}"><i class='bx bx-radio-circle'></i>Pengaturan SMTP</a>
                </li>
                <li> <a href="{{ route('site.setting') }}"><i class='bx bx-radio-circle'></i>Pengaturan Web</a>
                </li>
            </ul>
        </li>
        {{-- @endif --}}
        {{-- @if (Auth::user()->can('role.permission.menu')) --}}
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Peran & Hak Akses</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>Hak Akses</a>
                </li>
                <li> <a href="{{ route('all.roles') }}"><i class='bx bx-radio-circle'></i>Peran</a>
                </li>
                <li> <a href="{{ route('add.roles.permission') }}"><i class='bx bx-radio-circle'></i>Peran & Hak
                        Akses</a>
                </li>
                <li> <a href="{{ route('all.roles.permission') }}"><i class='bx bx-radio-circle'></i>Daftar Peran &
                        Hak Akses</a>
                </li>
            </ul>
        </li>
        {{-- @endif --}}
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Kelola Admin</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.admin') }}"><i class='bx bx-radio-circle'></i>Daftar Admin</a>
                </li>
                <li> <a href="{{ route('add.admin') }}"><i class='bx bx-radio-circle'></i>Tambah Admin</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
