<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h1>Data Page</h1>
        <p>This is the data page.</p>

        <h2>Users</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tr>
                <td></td>
                <td><input type="text" class="form-control form-control-sm" placeholder="Name"></td>
                <td><input type="email" class="form-control form-control-sm" placeholder="Email"></td>
                <td><input type="password" class="form-control form-control-sm" placeholder="Password"></td>
                <td><input type="text" class="form-control form-control-sm" placeholder="Created At"></td>
                <td>
                    <button class="btn btn-success btn-sm">Insert</button>
                </td>
            </tr>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ Str::limit($user->password, 10) }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <h2>Rooms</h2>
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
                <td><input type="text" class="form-control form-control-sm" placeholder="Name"></td>
                <td><input type="text" class="form-control form-control-sm" placeholder="Type"></td>
                <td>
                    <button class="btn btn-success btn-sm">Insert</button>
                </td>
            </tr>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->type }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

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
</body>

</html>
