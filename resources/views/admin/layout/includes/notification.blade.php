@php
    $notifications = \App\Models\LocalNotification::getNotifications(limit: 10);
    $notificationsUnread = \App\Models\LocalNotification::getUnreadNotifications()->count();
@endphp

<li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
        data-bs-auto-close="outside" aria-expanded="false">
        <i class="bx bx-bell bx-sm"></i>
        @if ($notificationsUnread > 0)
            <span class="badge bg-danger rounded-pill badge-notifications">{{ $notificationsUnread }}</span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-end py-0">
        <li class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">Notification</h5>
                @if ($notificationsUnread > 0)
                    <a href="javascript:void(0)" onclick="readNotifAdmin()" class="dropdown-notifications-all text-body"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                            class="bx fs-4 bx-envelope-open"></i></a>
                @endif
            </div>
        </li>
        <li class="dropdown-notifications-list scrollable-container">
            <ul class="list-group list-group-flush">
                @foreach ($notifications as $notification)
                    <li class="list-group-item list-group-item-action dropdown-notifications-item @if ($notification->status == 1) marked-as-read @endif"
                        style="cursor:default">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ $notification->title }}</h6>
                                <p class="mb-0">{{ $notification->description }}</p>
                                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                        class="badge badge-dot"></span></a>
                                {{-- <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                    class="bx bx-x"></span></a> --}}
                            </div>
                        </div>
                    </li>
                @endforeach

                @if (count($notifications) == 0)
                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Anda belum memiliki notifikasi</h6>
                            </div>
                        </div>
                    </li>
                @endif
            </ul>
        </li>
        @if (count($notifications) > 0)
            <li class="dropdown-menu-footer border-top">
                <a href="{{ url('/dashboard/local-notification') }}"
                    class="dropdown-item d-flex justify-content-center p-3">
                    View all notifications
                </a>
            </li>
        @endif
    </ul>
</li>
