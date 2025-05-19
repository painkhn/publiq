<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body class="w-full min-h-screen bg-[#e3e2de]">
    @include('components.header')
    <main class="min-h-[calc(100vh-160px)]">
        @yield('content')
    </main>
    @include('components.footer')
</body>

</html>
