<header class="w-full h-auto bg-primary mb-20">
    <div class="w-full px-28 flex items-center justify-between min-h-36">
        <!-- logo -->
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
        </div>
        <!-- navbar -->
        <nav>
            <ul class="flex text-2xl ">
                <li><a href="#!">Добавить публикацию</a></li>
                <li><a class="ml-10" href="#!">Каталог</a></li>
                @if (Auth::user())
                    <li><a class="ml-10" href="{{ route('profile') }}">Личный кабинет</a></li>
                @else
                    <li><a class="ml-10" href="{{ route('login') }}">Войти</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>
