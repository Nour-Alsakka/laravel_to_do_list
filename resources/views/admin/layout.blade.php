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
    <nav class="bg-light p-4 font-bold">
        <div class="container">

            <a href="{{ route('dashboard.tasks.index') }}">💜💜To do list site💜💜</a>
            <a style="float:right" href="{{ route('logout') }}">Logout</a>
        </div>
    </nav>
    @yield('main')
</body>

</html>
