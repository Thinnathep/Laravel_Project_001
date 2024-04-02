@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">


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

    <body>
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
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <footer class="py-3 bg-light fixed-bottom">
                <div class="container">
                    <p class="mb-0 text-center">© {{ date('Y') }} Laravel</p>
                </div>
            </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </body>

    </html>
@endsection
