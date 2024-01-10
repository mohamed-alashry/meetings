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
    <title>Log in</title>

</head>

<body>
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-lg-5 col-12 p-0 d-flex align-items-start flex-column" style="background: #020B20">
                <div class="d-flex align-items-end mx-auto" style="height: -webkit-fill-available;">
                    <img class="img-fluid" src="{{ asset(config('settings.logo.original')) }}"
                        alt="Modern building architecture">
                </div>
                <form action="{{ route('authenticate') }}" method="POST" class="w-100 px-5">
                    @csrf
                    <div class="input-form-login">
                        <i class="fa-solid fa-envelope icon fa-lg"></i>
                        <input class="input-field form-control my-3 px-5" placeholder="Type here email" type="email"
                            name="email" value="{{ old('email') }}">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-form-login">
                        <i class="fa-solid fa-lock icon fa-lg"></i>
                        <input class="input-field form-control my-3 px-5" placeholder="Type here password"
                            type="password" name="password">
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-danger my-3 w-100" style="background: #C2203D">Submit</button>
                </form>
                <div class="d-flex align-items-end" style="height: -webkit-fill-available;">
                    <img class="img-fluid mt-5" src="{{ asset('assets') }}/img/Frame.png"
                        alt="Modern building architecture">
                </div>
            </div>
            <div class="col-7 d-none p-0 d-lg-flex align-items-end justify-content-end flex-column">
                <div class="" style="position: relative; top: 4%;">
                    <img class="img-fluid" src="{{ asset('assets') }}/img/GroupLogin.png" alt="" />
                </div>
                <div class="">
                    <img class="img-fluid" src="{{ asset('assets') }}/img/Vector.png" alt="" />
                </div>

            </div>
        </div>
    </div>
</body>

</html>
