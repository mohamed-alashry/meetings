<div data-component="sidebar">
    <div class="sidebarshadow">
        <ul class="list-group flex-column d-inline-block first-menu bg-body shadow" class="offcanvas offcanvas-start"
            data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
            aria-labelledby="offcanvasScrollingLabel">
            <a href="{{ route('home') }}" class="text-decoration-none color-primary">
                <li class="list-group-item p-4 border-top border-top">
                    <i class="fa-solid fa-house fa-lg d-flex {{ Route::is('home') ? 'active_nav' : '' }}" aria-hidden="true">
                        <span class="mx-2 align-middle">Home</span>
                    </i>
                </li> <!-- /.list-group-item -->
            </a>
            <a href="{{ route('meetings.calendar_view') }}" class="text-decoration-none color-primary">
                <li class="list-group-item p-4 border-top">
                    <i class="fa-solid fa-calendar-days fa-lg d-flex {{ Route::is('meetings.calendar_view') ? 'active_nav' : '' }}" aria-hidden="true">
                        <span class="mx-2 align-middle">Calendar</span>
                    </i>
                </li>
            </a>
            <a href="{{ route('rooms.monitor') }}" class="text-decoration-none color-primary">
                <li class="list-group-item p-4 border-top">
                    <i class="fa-solid fa-desktop fa-lg d-flex {{ Route::is('rooms.monitor') ? 'active_nav' : '' }}" aria-hidden="true">
                        <span class="mx-2 align-middle">Monitor</span>
                    </i>
                </li>
            </a>
            <a href="{{ route('users.index') }}" class="text-decoration-none color-primary">
                <li class="list-group-item p-4 border-top">
                    <i class="fa-solid fa-users-gear fa-lg fa-lg d-flex {{ Route::is('users.index') ? 'active_nav' : '' }}" aria-hidden="true">
                        <span class="mx-2 align-middle">Users</span>
                    </i>
                </li>
            </a>
            <a href="{{ route('invitees.index') }}" class="text-decoration-none color-primary">
                <li class="list-group-item p-4 border-top">
                    <i class="fa-solid fa-users fa-lg fa-lg d-flex {{ Route::is('invitees.index') ? 'active_nav' : '' }}" aria-hidden="true">
                        <span class="mx-2 align-middle">Invitees</span>
                    </i>
                </li>
            </a>
            <a href="{{ route('rooms.index') }}" class="text-decoration-none color-primary">
                <li class="list-group-item p-4 border-top">
                    <i class="fa-solid fa-gear fa-lg d-flex {{ Route::is('rooms.index') ? 'active_nav' : '' }}" aria-hidden="true">
                        <span class="mx-2 align-middle">Rooms</span>
                    </i>
                </li>
            </a>
            {{-- <a href="{{ route('meetings.index') }}" class="text-decoration-none color-primary">
                <li class="list-group-item p-4 border-top">
                    <i class="fa-solid fa-gear fa-lg d-flex {{ Route::is('meetings.index') ? 'active_nav' : '' }}" aria-hidden="true">
                        <span class="mx-2 align-middle">Meetings</span>
                    </i>
                </li>
            </a> --}}
        </ul> <!-- /.first-menu -->
    </div>
</div>
