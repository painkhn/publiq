<header class="w-full h-auto bg-primary">
    <div class="header-cont w-full px-10 flex items-center justify-between min-h-20">
        <!-- logo -->
        <div class="logo">
            <a href="{{ route('index') }}" class="text-4xl font-black transition-all hover:opacity-80">
                PUBLIQ
            </a>
        </div>
        <!-- navbar -->
        <nav>
            <ul class="flex font-semibold wrap gap-x-10">
                <li><a href="{{ route('OpenNewStory') }}" class="transition-all hover:opacity-80">Добавить публикацию</a></li>
                <li><a class="transition-all hover:opacity-80" href="{{ route('Catalog') }}">Каталог</a></li>
                @if (Auth::user() and Auth::user()->is_admin == 1)
                    <li><a class="transition-all hover:opacity-80" href="{{ route('VerifList') }}">Админка</a></li>
                @endif
                @if (Auth::user())
                    <li><a class="transition-all hover:opacity-80" href="{{ route('Profile') }}">Личный кабинет</a></li>
                @else
                    <li><a class="transition-all hover:opacity-80" href="{{ route('login') }}">Войти</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>
