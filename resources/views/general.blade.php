@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        {{-- <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file --> --}}
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    </head>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Noto Sans Thai", sans-serif;

        }

        #sidebar {
            width: 200px;
            height: 100vh;
            background-color: #333;
            color: #fff;
            padding: 20px;
            position: fixed;
            overflow-y: auto;
            z-index: 1000;
            top: 0;
            /* เพิ่มเพื่อให้ #sidebar อยู่ที่มุมบนซ้าย */
            left: 0;
            /* เพิ่มเพื่อให้ #sidebar อยู่ที่มุมบนซ้าย */
        }



        #sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        #sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        #sidebar ul li a:hover {
            background-color: #555;
        }

        #content {
            flex-grow: 1;
            padding: 20px;
        }

        #logoutBtn {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }

        #logoutBtn:hover {
            background-color: #d32f2f;
        }

        /* Hide the sub-menu by default */
        .settings-submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            /* Adjust the duration and easing function as needed */
            list-style-type: none;
            padding-left: 20px;
        }

        /* Style for the settings toggle */
        .settings-toggle {
            cursor: pointer;
        }

        /* Hide the sub-menu by default */
        .profile-submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            /* Adjust the duration and easing function as needed */
            list-style-type: none;
            padding-left: 20px;
        }

        /* Style for the settings toggle */
        .profile-toggle {
            cursor: pointer;
        }

        .bg-green {
            background-color: green;
        }

        .bg-red {
            background-color: red;
        }

        .room {
            width: 100px;
            height: 100px;
            margin: 10px;
            border: 1px solid black;
        }

        .room {
            width: 100px;
            height: 100px;
            margin: 10px;
            border: 1px solid black;
        }
    </style>

    <body>
        <nav id="sidebar">
            <h2>Dashboard</h2>
            <div class="profile-container">
                <div class="profile-circle">
                    <!-- สร้างวงกลมสำหรับภาพโปรไฟล์ -->
                    {{-- <img src="{{ asset('path/to/profile/image') }}" alt="Profile Image"> --}}
                </div>
                <h2>{{ Auth::user()->name }}</h2>
                <!-- แสดงชื่อผู้ใช้จากการ login -->
            </div>
            <ul>
                <li><a href="{{ route('dashboard') }}">Home</a></li>

                <li>
                    {{-- <a href="/profile">Profile</a> --}}
                    <a href="/profile" class="profile-toggle">Profile</a>
                    <ul class="profile-submenu">
                        <li><a href="/profile">- Profile</a></li>
                        <li><a href="/general">- General</a></li>
                        <li><a href="/profile/Page 3">- Page 3</a></li>
                    </ul>
                </li>


                <li>
                    <a href="#" class="settings-toggle">Settings</a>
                    <ul class="settings-submenu">
                        <li><a href="/Setting">- Setting</a></li>
                        <li><a href="/Setting/General">- General</a></li>
                        <li><a href="/Setting/Account">- Account</a></li>
                        <li><a href="/Setting/Security">- Security</a></li>
                    </ul>
                </li>

                <li><a href="/data">Data</a></li>
                <button id="logoutBtn">Logout</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </nav>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const logoutBtn = document.getElementById('logoutBtn');

                if (logoutBtn) {
                    logoutBtn.addEventListener('click', function() {
                        document.getElementById('logout-form').submit();
                    });
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                var settingsToggle = document.querySelector('.settings-toggle');
                var settingsSubmenu = document.querySelector('.settings-submenu');

                settingsToggle.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default action
                    if (settingsSubmenu.style.maxHeight) {
                        // If the sub-menu is currently shown, hide it
                        settingsSubmenu.style.maxHeight = null;
                    } else {
                        // If the sub-menu is hidden, show it with a smooth animation
                        settingsSubmenu.style.maxHeight = settingsSubmenu.scrollHeight + "px";
                    }
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                var settingsToggle = document.querySelector('.profile-toggle');
                var settingsSubmenu = document.querySelector('.profile-submenu');

                settingsToggle.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default action
                    if (settingsSubmenu.style.maxHeight) {
                        // If the sub-menu is currently shown, hide it
                        settingsSubmenu.style.maxHeight = null;
                    } else {
                        // If the sub-menu is hidden, show it with a smooth animation
                        settingsSubmenu.style.maxHeight = settingsSubmenu.scrollHeight + "px";
                    }
                });
            });
            // document.getElementById('roomStatusButton').addEventListener('click', function() {
            //     var button = this;
            //     if (button.textContent === 'ห้องว่าง') {
            //         button.textContent = 'ห้องไม่ว่าง';
            //         button.style.backgroundColor = 'red';
            //         // เพิ่มการอัปเดตสถานะในฐานข้อมูลที่นี่
            //     } else {
            //         button.textContent = 'ห้องว่าง';
            //         button.style.backgroundColor = 'green';
            //         // เพิ่มการอัปเดตสถานะในฐานข้อมูลที่นี่
            //     }
            // });
        </script>



        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



        <div class="container mt-5">
            <div class="container">
                <h1 class="text-center my-4">Welcome to the General Page</h1>
                <h2 class="text-center my-4">About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus
                    ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent
                    mauris.</p>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Announcement Title</h5>
                            <small>3 days ago</small>
                        </div>
                        <p class="mb-1">Some announcement details...</p>
                    </a>
                    <!-- Repeat for other announcements -->
                </div>
            </div>
            <div class="container">
                <h2 class="text-center my-4">Contact Us</h2>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>



            <div>
                <!-- Bootstrap JS -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            </div>
    </body>

    </html>
@endsection
