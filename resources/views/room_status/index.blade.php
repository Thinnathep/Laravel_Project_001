<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการห้อง</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <h1 class="mb-4">รายการห้อง</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ชื่อห้อง</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->is_available ? 'ว่าง' : 'ไม่ว่าง' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
