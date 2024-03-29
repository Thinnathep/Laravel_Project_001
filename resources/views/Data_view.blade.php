@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data View</title>
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
                        {{-- <li><a href="/profile/Page 3">- Page 3</a></li> --}}
                    </ul>
                </li>


                <li>
                    <a href="#" class="settings-toggle">Settings</a>
                    <ul class="settings-submenu">
                        <li><a href="/Setting">- Setting</a></li>
                        {{-- <li><a href="/Setting/General">- General</a></li>
                        <li><a href="/Setting/Account">- Account</a></li>
                        <li><a href="/Setting/Security">- Security</a></li> --}}
                    </ul>
                </li>

                <li>
                    <a href="#" class="data-toggle">Data</a>
                    <ul class="data-submenu">
                        <li><a href="/data">- Data</a></li>
                        <li><a href="/data_view">- View</a></li>
                        {{-- <li><a href="/data/Account">- Account</a></li>
                        <li><a href="/data/Security">- Security</a></li> --}}
                    </ul>
                </li>

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


            document.addEventListener('DOMContentLoaded', function() {
                var settingsToggle = document.querySelector('.data-toggle');
                var settingsSubmenu = document.querySelector('.data-submenu');

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


        <div class="container mt-5">
            <div class="container">
                <h1>Accounts</h1>
                <div class="container mt-5">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Room ID</th>
                                <th>Room Status ID</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form action="/insert-Account" method="post">
                                    @csrf
                                    <td></td> <!-- ID จะถูกสร้างโดยฐานข้อมูล -->
                                    <td><input type="text" class="form-control form-control-sm" name="name"
                                            placeholder="Name"></td>
                                    <td><input type="email" class="form-control form-control-sm" name="email"
                                            placeholder="Email"></td>
                                    <td><input type="password" class="form-control form-control-sm" name="password"
                                            placeholder="Password"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="room_id"
                                            placeholder="Room ID"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="room_status_id"
                                            placeholder="Room Status ID"></td>
                                    <td>
                                        <select class="form-select form-select-sm" name="is_available">
                                            <option value="1">ว่าง</option>
                                            <option value="0">ไม่ว่าง</option>
                                        </select>
                                    </td>
                                    <td><button class="btn btn-success btn-sm" type="submit">Insert</button></td>
                                </form>
                            </tr>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Room ID</th>
                                        <th>Room Status ID</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accounts as $account)
                                        <tr>
                                            <td>{{ $account->id }}</td>
                                            <td>{{ $account->name }}</td>
                                            <td>{{ $account->email }}</td>
                                            <td>{{ $account->room_id }}</td>
                                            <td>{{ $account->room_status_id }}</td>
                                            <td class="{{ $account->is_available ? 'text-success' : 'text-danger' }}">
                                                {{ $account->is_available ? 'ว่าง' : 'ไม่ว่าง' }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary edit-btn"
                                                    data-bs-toggle="modal" data-bs-target="#editAccountModal"
                                                    data-id="{{ $account->id }}">
                                                    Edit
                                                </button>

                                                <form action="/delete-Account/{{ $account->id }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete-btn">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>
            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        </div>

        <div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="editAccountModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAccountModalLabel">Edit Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/data_view/update/{{ $account->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="is_available" class="form-label">Status</label>
                                <select class="form-select" id="is_available" name="is_available" required>
                                    <option value="1">ว่าง</option>
                                    <option value="0">ไม่ว่าง</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="room_id" class="form-label">Room ID</label>
                                <input type="number" class="form-control" id="room_id" name="room_id">
                            </div>
                            <div class="mb-3">
                                <label for="room_status_id" class="form-label">Room Status ID</label>
                                <input type="number" class="form-control" id="room_status_id" name="room_status_id">
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editButtons = document.querySelectorAll('.edit-btn');
                editButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const accountId = this.getAttribute('data-id');
                        // ดึงข้อมูลของ Account จาก Server และแสดงใน Modal
                        // ตัวอย่าง: fetch(`/data_view/account/${accountId}`)
                        // และอัปเดตฟิลด์ใน Modal ด้วยข้อมูลที่ได้
                    });
                });
            });
            document.addEventListener('DOMContentLoaded', function() {
                const deleteButtons = document.querySelectorAll('.delete-btn');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault(); // ป้องกันการส่งคำขอโดยอัตโนมัติ
                        const confirmDelete = confirm('Are you sure you want to delete this account?');
                        if (confirmDelete) {
                            this.closest('form').submit(); // ส่งคำขอลบถ้าผู้ใช้ยืนยัน
                        }
                    });
                });
            });
        </script>

    </body>

    </html>
@endsection
