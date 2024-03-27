<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
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
                    <li><a href="/profile/Page 2">- Page 2</a></li>
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
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="script.js"></script> <!-- Link to your JavaScript file -->


    <div class="container mt-5">
        <h1>Data Page</h1>
        <p>This is the data page.</p>
        <h2>Users</h2>

        <form action="/insert-user" method="post">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Created At</th>
                        <th>update At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tr>
                    <td></td>
                    <form action="/insert-user" method="post">
                        @csrf <!-- สำคัญ! เพื่อป้องกัน CSRF attack -->
                        <td><input type="text" class="form-control form-control-sm" name="name"
                                placeholder="Name"></td>
                        <td><input type="email" class="form-control form-control-sm" name="email"
                                placeholder="Email"></td>
                        <td><input type="password" class="form-control form-control-sm" name="password"
                                placeholder="Password"></td>
                        <td></td>
                        <td></td>
                        {{-- <td><input type="text" class="form-control form-control-sm" name="created_at"
                                placeholder="Created At"></td> --}}
                        <td><button class="btn btn-success btn-sm" type="submit">Insert</button></td>
                    </form>

                </tr>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ Str::limit($user->password, 10) }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                                <a href="/edit-user/{{ $user->id }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="/delete-user/{{ $user->id }}" method="post"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </form>


        <h2>Rooms</h2>
        <form action="{{ route('insertRoom') }}" method="post">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tr>
                    <td></td>
                    <td><input type="text" name="name" class="form-control form-control-sm" placeholder="Name">
                    </td>
                    <td><input type="text" name="type" class="form-control form-control-sm" placeholder="Type">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success btn-sm">Insert</button>
                    </td>
                </tr>
            </table>



        </form>

        <div class="table-responsive">
            <table id="roomsTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Created At</th>
                        <th>update At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room->id }}</td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->type }}</td>
                            <td>{{ $room->created_at }}</td>
                            <td>{{ $room->updated_at }}</td>
                            <td>
                                <a href="{{ route('editRoom', $room->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('deleteRoom', $room->id) }}" method="post"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this room?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <h2>Room Types</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tr>
                <td></td>
                <td><input type="text" class="form-control form-control-sm" placeholder="Name"></td>
                <td>
                    <button class="btn btn-success btn-sm">Insert</button>
                </td>
            </tr>
            <tbody>
                @foreach ($room_types as $room_type)
                    <tr>
                        <td>{{ $room_type->id }}</td>
                        <td>{{ $room_type->name }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form[action^="/delete-user/"]').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                if (confirm('Are you sure you want to delete this user?')) {
                    form.submit();
                }
            });
        });
    </script>


</body>

</html>
