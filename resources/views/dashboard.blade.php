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
</style>

<body>
    <nav id="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="/data">Data</a></li>
            <button id="logoutBtn">Logout</button>
        </ul>
    </nav>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoutBtn = document.getElementById('logoutBtn');

            if (logoutBtn) {
                logoutBtn.addEventListener('click', function() {
                    // Assuming you have a route named 'home' that points to your homepage
                    window.location.href = "{{ route('login') }}";
                });
            }
        });
    </script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="script.js"></script> <!-- Link to your JavaScript file -->

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Welcome to the Dashboard</h1>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Summary</h2>
                <p>Welcome back, [User's Name]! Here's a quick overview of your dashboard.</p>
            </div>
        </div>

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


</body>

</html>
