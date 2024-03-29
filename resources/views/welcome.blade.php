@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- ตัวอย่างการใช้ Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

        <!-- ตัวอย่างการใช้ Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <style>
        /* ตัวอย่าง CSS */
        body {
            background-color: #f8f9fa;
            font-family: "Noto Sans Thai", sans-serif;
        }

        .content {
            padding: 20px;
        }

        .footer {
            background-color: #343a40;
            color: white;
        }
    </style>

    <body class="font-sans antialiased dark:bg-black dark:text-white/50">


        {{-- <!-- Navigation -->
    <nav class="mb-4 navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}

        <!-- Content -->
        <div class="content">
            @yield('content')
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Welcome to Laravel</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod leo nec neque tristique,
                            non malesuada purus molestie. Sed eu quam in metus congue varius. Proin auctor est ac turpis
                            lacinia, et ultricies arcu vehicula.</p>
                    </div>
                    <div class="col-md-6">
                        <h2>Why Choose Laravel?</h2>
                        <ul>
                            <li>Fast Development</li>
                            <li>Rich Features</li>
                            <li>Secure</li>
                            <li>Community Support</li>
                        </ul>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // ตัวอย่างการใช้ jQuery
                        $('.nav-link').hover(function() {
                            $(this).css('color', 'red');
                        }, function() {
                            $(this).css('color', '');
                        });
                    });
                </script>


                <!-- ตัวอย่าง Modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>



        <!-- Footer -->
        <footer class="py-3 bg-light fixed-bottom">
            <div class="container">
                <p class="mb-0 text-center">© {{ date('Y') }} Laravel</p>
            </div>
        </footer>


        <!-- Bootstrap 5 JS Bundle (Popper.js included) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
@endsection
