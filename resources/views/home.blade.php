<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets') }}/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <title>{{ config('settings.name') }} :: Home</title>

</head>

<body>
    <div data-component="navbar">

        <nav class="navbar p-0 fixed-top justify-content-start">
            <button class="navbar-toggler position-relative rounded-0 px-4" type="button"
                style="background: #022537; left: 0%;" data-toggle="collapse" data-target="#megamenu-dropdown"
                aria-controls="megamenu-dropdown" aria-expanded="false" aria-label="Toggle navigation">
                <img src="{{ asset('assets') }}/img/menu.png" alt="" srcset="">
            </button>
            <div class="shadow-sm d-flex justify-content-between" style="width: 96%">
                <a class="navbar-brand px-1" href="#">
                    <img src="{{ asset(config('settings.logo.thumbnail')) }}" class="d-inline-block mt-1" alt="AgentFire Logo" height="40"></a>

                <div class="right-links float-right mr-4">
                    <!-- /.dropdown -->

                    <div class="d-inline dropdown">
                        <a class="dropdown-toggle" id="messages" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <img src="http://1.gravatar.com/avatar/47db31bd2e0b161008607d84c74305b5?s=96&d=mm&r=g">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="messages">
                            <a class="dropdown-item" href="#">Edit my profile</a>
                            <a class="dropdown-item" href="#">Log Out</a>
                        </div> <!-- /.dropdown-menu -->
                    </div> <!-- /.dropdown -->

                </div> <!-- /.right-links -->

            </div>
        </nav>
    </div> <!-- END TOP NAVBAR -->

    <div data-component="sidebar">
        <div class="sidebar">
            <ul class="list-group flex-column d-inline-block first-menu">
                <li class="list-group-item pl-3 py-2">
                    <a href="#">
                        <i class="fa-solid fa-house fa-lg d-flex" aria-hidden="true">
                            <span class="ml-2 pt-2 align-middle">Reporting</span>
                        </i>
                    </a>
                </li> <!-- /.list-group-item -->
                <li class="list-group-item pl-3 py-2">
                    <a href="#">
                        <i class="fa-solid fa-calendar-days d-flex" aria-hidden="true">
                            <span class="ml-2 pt-2 align-middle">Reporting</span>
                        </i>
                    </a>
                </li> <!-- /.list-group-item -->
                <li class="list-group-item pl-3 py-2">
                    <a href="#">
                        <i class="fa-solid fa-desktop d-flex" aria-hidden="true">
                            <span class="ml-2 pt-2 align-middle">Reporting</span>
                        </i>
                    </a>
                </li> <!-- /.list-group-item -->
                <li class="list-group-item pl-3 py-2">
                    <a href="#">
                        <i class="fa-solid fa-users fa-lg d-flex" aria-hidden="true">
                            <span class="ml-2 pt-2 align-middle">Reporting</span>
                        </i>
                    </a>
                </li> <!-- /.list-group-item -->
                <li class="list-group-item pl-3 py-2">
                    <a href="#">
                        <i class="fa-solid fa-gear d-flex" aria-hidden="true">
                            <span class="ml-2 pt-2 align-middle">Reporting</span>
                        </i>
                    </a>
                </li> <!-- /.list-group-item -->

            </ul> <!-- /.first-menu -->
        </div> <!-- /.sidebar -->
    </div>

    <!-- <div class="container-fluid">

   </div> -->
</body>

</html>
