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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        /* Hide the sub-menu by default */
        .data-submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            /* Adjust the duration and easing function as needed */
            list-style-type: none;
            padding-left: 20px;
        }

        /* Style for the settings toggle */
        .data-toggle {
            cursor: pointer;
        }
    </style>

    <body>
           {{-- <nav id="sidebar">
            <h2>Dashboard</h2>
            <div class="profile-container">
                <div class="profile-circle">
                </div>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
            <ul>
                <li><a href="{{ route('dashboard') }}">Home</a></li>

                <li>
                    <a href="/profile" class="profile-toggle">Profile</a>
                    <ul class="profile-submenu">
                        <li><a href="/profile">- Profile</a></li>
                        <li><a href="/general">- General</a></li>
                    </ul>
                </li>


                <li>
                    <a href="#" class="settings-toggle">Settings</a>
                    <ul class="settings-submenu">
                        <li><a href="/Setting">- Setting</a></li>

                    </ul>
                </li>

                <li>
                    <a href="#" class="data-toggle">Data</a>
                    <ul class="data-submenu">
                        <li><a href="/data">- Data</a></li>
                        <li><a href="/data_view">- View</a></li>
                    </ul>
                </li>

                <button id="logoutBtn">Logout</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </nav> --}}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const logoutBtn = document.getElementById('logoutBtn');

                if (logoutBtn) {
                    logoutBtn.addEventListener('click', function() {
                        document.getElementById('logout-form').submit();
                    });
                }
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JavaScript -->


        <div class="container mt-5">
           <h1>Hey <h5 class="card-title">{{ Auth::user()->name }}</h5> !</h1>
            <h1 class="mb-4">Data Page Setting</h1>

            <!-- Change Personal Information -->
            <h4 class="mb-3">Change Personal Information</h4>
            <form method="POST" class="mb-4">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="profilePicture" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="profilePicture" name="profilePicture">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>

            <!-- Change Password -->
            <h4 class="mb-3">Change Password</h4>
            <form method="POST" class="mb-4">
                @csrf
                <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword" name="currentPassword" required autocomplete="current-password">
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>

            <!-- Notification Settings -->
            <h4 class="mb-3">Notification Settings</h4>
            <form method="POST" class="mb-4">
                @csrf
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="email" id="emailNotification"
                        name="emailNotification">
                    <label class="form-check-label" for="emailNotification">
                        Email Notifications
                    </label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="sms" id="smsNotification"
                        name="smsNotification">
                    <label class="form-check-label" for="smsNotification">
                        SMS Notifications
                    </label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="app" id="appNotification"
                        name="appNotification">
                    <label class="form-check-label" for="appNotification">
                        App Notifications
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Update Notification Settings</button>
            </form>

            <!-- Support Settings -->
            <h4 class="mb-3">Support Settings</h4>
            <form method="POST" class="mb-4">
                @csrf
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="email" id="emailSupport"
                        name="emailSupport">
                    <label class="form-check-label" for="emailSupport">
                        Email Support
                    </label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="phone" id="phoneSupport"
                        name="phoneSupport">
                    <label class="form-check-label" for="phoneSupport">
                        Phone Support
                    </label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="app" id="appSupport" name="appSupport">
                    <label class="form-check-label" for="appSupport">
                        App Support
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Update Support Settings</button>
            </form>

            <!-- Communication Settings -->
            <h4 class="mb-3">Communication Settings</h4>
            <form method="POST" class="mb-4">
                @csrf
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="email" id="emailCommunication"
                        name="emailCommunication">
                    <label class="form-check-label" for="emailCommunication">
                        Email Communication
                    </label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="phone" id="phoneCommunication"
                        name="phoneCommunication">
                    <label class="form-check-label" for="phoneCommunication">
                        Phone Communication
                    </label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="app" id="appCommunication"
                        name="appCommunication">
                    <label class="form-check-label" for="appCommunication">
                        App Communication
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Update Communication Settings</button>
            </form>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>


    </body>

    </html>
@endsection
