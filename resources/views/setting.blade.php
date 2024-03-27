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
        <h1>Data Page Setting</h1>
        <h4>Change Password</h4>
        <form action="{{ route('changePassword') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
            </div>
            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm New Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    </div>



</body>

</html>
