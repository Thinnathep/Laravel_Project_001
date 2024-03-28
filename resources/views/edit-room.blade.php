@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Room</title>
        <!-- Connect Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <h2>Edit Room</h2>
            <form action="/update-room/{{ $room->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}"
                        required>
                </div>
                {{-- <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $room->type }}"
                        required>
                </div> --}}

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="1" {{ $room->type == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $room->type == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $room->type == 3 ? 'selected' : '' }}>3</option>
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
