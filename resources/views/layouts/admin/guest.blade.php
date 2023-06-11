<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="/assets/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Login - StayCation Admin Dashboard</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="/assets/css/app.css" />
        <script src="{{ asset("assets/sweetalert2/dist/sweetalert2.all.min.js") }}"></script>
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/assets/images/logo.svg">
                        <span class="text-white text-lg ml-3"> Admin StayCation </span> </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="/assets/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Beberapa klik lagi untuk 
                            <br>
                            masuk ke dashboard Anda.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white">Olah kebutuhan tempat wisata dalam satu tempat</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Masuk sebagai Admin
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Beberapa klik lagi untuk masuk ke akun Anda</div>
                        <form action="{{ route("admin.login") }}" method="post">
                            @csrf
                            <div class="intro-x mt-8">
                                <input type="email" class="intro-x login__input input input--lg border border-gray-300 block @error("email")
                                    border-red-500
                                @enderror" placeholder="Email" name="email">
                                @error('email')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                                <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4 @error("password")
                                    border-red-500
                                @enderror" placeholder="Password" name="password">
                                @error('password')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Masuk</button>
                            </div>
                        </form>
                        {{-- <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
                            By signin up, you agree to our 
                            <br>
                            <a class="text-theme-1" href="">Terms and Conditions</a> & <a class="text-theme-1" href="">Privacy Policy</a> 
                        </div> --}}
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        @if (session("error"))
            <script>
                Swal.fire(
                    "Whooppss!!!",
                    `{{ session("error") }}`,
                    "error"
                );
            </script>
        @endif
        <script src="/assets/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>