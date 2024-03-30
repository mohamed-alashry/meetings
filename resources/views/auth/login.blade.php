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
    <title>{{ config('settings.name') }} :: Login</title>

</head>

<body>
    <div class="container-fluid"
        style="background-image: url({{ asset(config('settings.background')) }}); background-repeat: no-repeat;background-size: cover; height: 100vh">
        <div class="row "
            style=" background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(2,11,32,0.15730042016806722) 74%); height: 100vh">
            <div
                class="col-lg-5 col-12 p-0 d-flex align-items-start flex-column gy-5 justify-content-center align-items-center">
                <div class="d-flex align-items-end mx-auto" style="">
                    <img class="img-fluid w-75 mx-auto" src="{{ asset(config('settings.logo.original')) }}"
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
                    <button type="submit" class="btn btn-danger my-3 w-100" style="background: #C2203D">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Login Now
                    </button>

                </form>
                <div class="w-100 px-5">

                    <a href="{{ route('google_login') }}" class="btn btn-danger my-3 w-100" style="background: #C2203D">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Login With Google
                    </a>
                </div>

                <div class="d-flex align-items-end justify-content-center" style="">
                    <img class="d-none d-md-block img-fluid mx-auto mt-5" src="{{ asset('assets') }}/img/Frame.png"
                        alt="Modern building architecture">
                </div>
            </div>

        </div>
    </div>
</body>

</html>