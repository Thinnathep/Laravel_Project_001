@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Connect Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Edit Room Status</title>
    </head>

    <body>
        <div class="container mt-5">
            <h2 class="mb-4">Edit Room Status</h2>

            <form action="{{ route('updateRoomstatus', $roomStatus->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ $roomStatus->name }}">
                </div>
                <div class="mb-3">
                    <label for="is_available" class="form-label">Is Available</label>
                    <select name="is_available" id="is_available" class="form-select">
                        <option value="1" {{ $roomStatus->is_available ? 'selected' : '' }}>ว่าง</option>
                        <option value="0" {{ !$roomStatus->is_available ? 'selected' : '' }}>ไม่ว่าง</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

        <!-- Connect Bootstrap JavaScript and Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection
