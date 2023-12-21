<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>


            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">

                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
                        </a>
                    </li>


                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            data-bs-toggle="dropdown">
                            @php
                                $ncount = Auth::user()
                                    ->unreadNotifications()
                                    ->count();
                            @endphp
                            <span class="alert-count" id="notification-count">{{ $ncount }}</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-badge"> </p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                @php
                                    $user = Auth::user();
                                @endphp
                                @forelse ($user->notifications as $notification)
                                    <a class="dropdown-item" href="javascript:;"
                                        onclick="markNotificationAsRead('{{ $notification->id }}')">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-success text-success">
                                                <i class='bx bx-check-square'></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">{{ $notification->data['message'] }}<span
                                                        class="msg-time float-end">
                                                        {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                                    </span></h6>
                                                <p class="msg-info">New Booking </p>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                @endforelse
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">
                                    <button class="btn btn-primary w-100">Lihat Semua</button>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count">0</span>
                            <i class='bx bx-shopping-bag'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Booking</p>
                                    <p class="msg-header-badge">0 Items</p>
                                </div>
                            </a>
                            <div class="header-message-list">

                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h5 class="mb-0">Total</h5>
                                        <h5 class="mb-0 ms-auto">Rp 0.00</h5>
                                    </div>
                                    <button class="btn btn-primary w-100">Lihat</button>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

            @php
                $id = Auth::user()->id;
                $profileData = App\Models\User::find($id);
            @endphp

            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                        class="user-img" alt="user avatar">
                    <div class="user-info">
                        <p class="user-name mb-0">{{ $profileData->name }}</p>
                        <p class="designattion mb-0">{{ $profileData->email }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}"><i
                                class="bx bx-user fs-5"></i><span>Profil</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('admin.change.password') }}"><i class="bx bx-cog fs-5"></i><span>Ganti
                                Kata Sandi</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-circle fs-5"></i><span>Dasbor</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}"><i
                                class="bx bx-log-out-circle"></i><span>Keluar</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<script>
    function markNotificationAsRead(notificationId) {
        fetch('/mark-notification-as-read/' + notificationId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('notification-count').textContent = data.count;
            })
            .catch(error => {
                console.log('Error', error);
            });
    }
</script>
