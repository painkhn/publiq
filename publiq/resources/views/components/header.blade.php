<header class="w-full h-auto bg-primary">
    <div class="header-cont w-full px-28 flex items-center justify-between min-h-36">
        <!-- logo -->
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
        </div>
        <!-- navbar -->
        <nav>
            <ul class="flex text-2xl wrap">
                <li><a href="{{ route('OpenNewStory') }}">Добавить публикацию</a></li>
                <li><a class="ml-10" href="{{ route('Catalog') }}">Каталог</a></li>
                @if (Auth::user() and Auth::user()->is_admin == 1)
                    <li><a class="ml-10" href="{{ route('VerifList') }}">Админка</a></li>
                @endif
                @if (Auth::user())
                    <li><a class="ml-10" href="{{ route('Profile') }}">Личный кабинет</a></li>
                @else
                    <li><a class="ml-10" href="{{ route('login') }}">Войти</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>
