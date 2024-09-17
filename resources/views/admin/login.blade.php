<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSS files --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">

    {{-- JS files --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('filepond/filepond.min.js') }}"></script>

    <title>Tasks</title>
</head>

<body>
    @error('wrong_data')
        <div class="alert alert-danger">{{ $errors->first('wrong_data') }}</div>
    @enderror

    <div class="card w-50 m-auto my-4">
        <div class="card-header">
            <h3 class="text-center">Login Page</h3>
        </div>
        <div class="card-body">

            <form action="" method="post">
                @csrf

                <label for="username" class="form-label mt-2">Email</label>
                <input id="email" type="text" class="form-control " name="email"
                    value="{{ old('email', '') }}" placeholder="email address">
                @error('email')
                    <div class="error text-danger">{{ $errors->first('email') }}</div>
                @enderror

                <label for="password" class="form-label mt-2 ">Password</label>
                <input id="password" name="password" class="form-control" value="{{ old('password', '') }}"
                    type="password">
                @error('password')
                    <div class="error text-danger">{{ $errors->first('password') }}</div>
                @enderror

                <button type="submit" class="btn btn-secondary my-4">Login</button>
            </form>
        </div>
    </div>
</body>
