<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        {{-- <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div> --}}
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
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Owners</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.owner') }}"><i class='bx bx-radio-circle'></i>All Owner</a>
                </li>
                <li> <a href="{{ route('add.owner') }}"><i class='bx bx-radio-circle'></i>Add Owner</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Book Area</div>
            </a>
            <ul>
                <li> <a href="{{ route('book.area') }}"><i class='bx bx-radio-circle'></i>Update Book Area</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Room Type</div>
            </a>
            <ul>
                <li> <a href="{{ route('room.type.list') }}"><i class='bx bx-radio-circle'></i>Room Type List</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Booking Manage</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Booking</div>
            </a>
            <ul>
                <li> <a href="{{ route('booking.list') }}"><i class='bx bx-radio-circle'></i>Booking List</a>
                </li>
                <li> <a href="{{ route('add.room.list') }}"><i class='bx bx-radio-circle'></i>Add Booking</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Manage Room List</div>
            </a>
            <ul>
                <li> <a href="{{ route('view.room.list') }}"><i class='bx bx-radio-circle'></i>Room List</a>
                </li>
                <li> <a href="component-accordions.html"><i class='bx bx-radio-circle'></i>Accordions</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Booking Report</div>
            </a>
            <ul>
                <li> <a href="{{ route('booking.report') }}"><i class='bx bx-radio-circle'></i>Booking Report</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Others</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Setting</div>
            </a>
            <ul>
                <li> <a href="{{ route('smtp.setting') }}"><i class='bx bx-radio-circle'></i>SMTP Setting</a>
                </li>
                <li> <a href="{{ route('site.setting') }}"><i class='bx bx-radio-circle'></i>Site Setting</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Role & Permission</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>All Permission</a>
                </li>
                <li> <a href="{{ route('all.roles') }}"><i class='bx bx-radio-circle'></i>All Roles</a>
                </li>
                <li> <a href="{{ route('add.roles.permission') }}"><i class='bx bx-radio-circle'></i>Role In
                        Permission</a>
                </li>
                <li> <a href="{{ route('all.roles.permission') }}"><i class='bx bx-radio-circle'></i>All Role In
                        Permission </a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
