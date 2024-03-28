@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
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

        /* .room-status-button {
                                                                background-color: green;
                                                                color: white;
                                                                border: none;
                                                                padding: 10px 20px;
                                                                text-align: center;
                                                                text-decoration: none;
                                                                display: inline-block;
                                                                font-size: 16px;
                                                                margin: 4px 2px;
                                                                cursor: pointer;
                                                            }

                                                            .room-status-button:active {
                                                                background-color: red;
                                                            } */

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


        {{-- <script><document.addEventListener('DOMContentLoaded', function() {
    fetch('/api/user') // สมมติว่าคุณมี endpoint ที่ชื่อ /api/user สำหรับดึงข้อมูลของผู้ใช้
        .then(response => response.json())
        .then(data => {
            const userProfile = document.getElementById('user-profile');
            userProfile.innerHTML = `
                <p>Name: ${data.name}</p>
                <p>Email: ${data.email}</p>
                <!-- แสดงภาพโปรไฟล์หรือข้อมูลอื่น ๆ ที่คุณต้องการ -->
            `;
        })
        .catch(error => console.error('Error:', error));
});
/script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="script.js"></script> <!-- Link to your JavaScript file -->

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center">Welcome to the Dashboard</h1>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h2>Welcome back</h2>

                            <p>
                            <h1>{{ Auth::user()->name }} </h1>! Here's a quick overview of your dashboard
                            </p>


                        </div>
                    </div>


                    <div class="container">
                        <h2>รายการห้อง</h2>
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>ชื่อห้อง</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($room_status as $room)
                                    <tr>
                                        <td>{{ $room->name }}</td>
                                        <td class="{{ $room->is_available ? 'text-success' : 'text-danger' }}">
                                            {{ $room->is_available ? 'ว่าง' : 'ไม่ว่าง' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- <button id="roomStatusButton" class="room-status-button">ห้องว่าง</button> --}}
                    {{-- ปุ่ม --}}
                    <div>
                        <button id="insertBtn" class="btn btn-primary">Insert</button>
                        <button id="updateBtn" class="btn btn-success">Update</button>
                        <button id="deleteBtn" class="btn btn-danger">Delete</button>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const insertBtn = document.getElementById('insertBtn');
                                const updateBtn = document.getElementById('updateBtn');
                                const deleteBtn = document.getElementById('deleteBtn');

                                if (insertBtn) {
                                    insertBtn.addEventListener('click', function() {
                                        // การทำงานสำหรับการ insert
                                        console.log('Insert button clicked');
                                    });
                                }

                                if (updateBtn) {
                                    updateBtn.addEventListener('click', function() {
                                        // การทำงานสำหรับการ update
                                        console.log('Update button clicked');
                                    });
                                }

                                if (deleteBtn) {
                                    deleteBtn.addEventListener('click', function() {
                                        // การทำงานสำหรับการ delete
                                        console.log('Delete button clicked');
                                    });
                                }
                            });
                        </script>
                    </div>
                    {{-- หน้า Line --}}
                    <div class="row mt-5">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Total Sales</h3>
                                    <p class="card-text">$1,234.56</p>
                                    <canvas id="salesChart"></canvas>
                                </div>
                            </div>
                            <script>
                                var ctx = document.getElementById('salesChart').getContext('2d');
                                var salesChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                                            'October', 'November', 'December'
                                        ],
                                        datasets: [{
                                            label: 'Total Sales',
                                            data: [12, 0, 3, 5, 2, 3, 7, 8, 6, 1, 3, 9],
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>

                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Total Customers</h3>
                                    <p class="card-text">123</p>
                                    <canvas id="CustomersChart"></canvas>
                                </div>
                                <script>
                                    var ctx = document.getElementById('CustomersChart').getContext('2d');
                                    var salesChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                                                'October', 'November', 'December'
                                            ],
                                            datasets: [{
                                                label: 'Total Sales',
                                                data: [5, 12, 3, 5, 2, 3, 7, 8, 6, 1, 3, 10],
                                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                borderColor: 'rgba(75, 192, 192, 1)',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Average Order Value</h3>
                                    <p class="card-text">$100.00</p>
                                    <canvas id="AverageChart"></canvas>
                                </div>
                                <script>
                                    var ctx = document.getElementById('AverageChart').getContext('2d');
                                    var salesChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                                                'October', 'November', 'December'
                                            ],
                                            datasets: [{
                                                label: 'Total Sales',
                                                data: [1, 19, 3, 5, 2, 3, 7, 8, 6, 1, 15, 20],
                                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                borderColor: 'rgba(75, 192, 192, 1)',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    {{-- View --}}
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h2>Quick Links</h2>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="/orders">View Orders</a></li>
                                <li class="list-group-item"><a href="/customers">View Customers</a></li>
                                <li class="list-group-item"><a href="/reports">View Reports</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
