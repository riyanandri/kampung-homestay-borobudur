@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
@endphp
<div class="service-side-bar">
    <div class="services-bar-widget">
        <h3 class="title">Sidebar</h3>
        <div class="side-bar-categories">
            <img src="{{ !empty($profileData->photo) ? url('upload/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                class="rounded mx-auto d-block" alt="Image" style="width:100px; height:100px;">
            <center>
                <b>{{ $profileData->name }}</b><br>
                <b>{{ $profileData->email }}</b>
            </center><br>
            <ul>

                <li>
                    <a href="{{ route('dashboard') }}">Dasbor</a>
                </li>
                <li>
                    <a href="{{ route('user.profile') }}">Profil</a>
                </li>
                <li>
                    <a href="{{ route('user.change.password') }}">Ganti Kata Sandi</a>
                </li>
                <li>
                    <a href="{{ route('user.booking') }}">Detail Booking</a>
                </li>
                <li>
                    <a href="{{ route('user.logout') }}">Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</div>
