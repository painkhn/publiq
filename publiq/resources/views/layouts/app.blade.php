<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    @include('components.header')
    <main class="h-main">
        @yield('content')
    </main>
    @include('components.footer')
</body>

</html>
