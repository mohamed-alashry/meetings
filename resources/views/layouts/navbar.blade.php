<div data-component="navbar">
    <nav class="navbar p-0 fixed-top justify-content-start bg-white">
        <div class="shadow-sm d-flex justify-content-between align-items-center w-100" style="height: 90px;">
            <div class="h-100 w-100 d-flex align-items-center">
                <button class="navbar-toggler position-relative rounded-0 px-4 h-100 shadow-none"
                    style="background: #022537; left: 0%;" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                    <img src="{{ asset('assets') }}/img/menu.png" alt="" srcset="">
                </button>
                <a class="navbar-brand w-100 px-2" href="#">
                    <img src="{{ asset('assets') }}/img/Logo.png" class="d-inline-block img-fluid" alt="AgentFire Logo">
                </a>
            </div>

            <div class="right-links float-right mr-4">
                <div class="d-inline dropdown">
                    <a class="dropdown-toggle text-decoration-none d-flex p-1 mx-2 align-items-center" id="messages"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                        <div class="avatar m-auto img-fluid">
                            <span class="avatar_icon">{{ Str::ucfirst(substr(auth()->user()->name,-1,1)) }}</span>
                        </div>
                        <span class="px-2 d-none d-md-block">
                            <p class="m-0 fw-lighter text-secondary" style="font-size: 80%;">Welcome,</p>
                            <p class="m-0 fw-bolder color-primary">{{ auth()->user()->name }}</p>
                        </span>
                        <i class="fa-solid fa-chevron-down fa-sm color-primary "></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="messages">
                        <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</div>