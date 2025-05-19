<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body class="w-full min-h-screen bg-[#e3e2de]">
    <main>
        <div class="w-full h-screen flex flex-col gap-y-4 items-center justify-center">
            <div class="logo">
                <a href="{{ route('index') }}" class="text-4xl font-black transition-all hover:opacity-80">
                    PUBLIQ
                </a>
            </div>
            <div class="rounded-md bg-white/80 max-w-[400px] w-full p-5">
                @yield('content')
            </div>
        </div>
    </main>
</body>

</html>
