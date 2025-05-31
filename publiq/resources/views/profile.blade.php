@extends('layouts.app')
@section('title')
    Профиль
@endsection


@section('content')
    <div class="h-main">
        <div class="flex justify-between p-10">
            <div class="profile-edit w-1/3 pr-28">
                <form method="POST" action="{{ route('EditUser') }}" class="mb-4">
                    @csrf
                    <div class="w-full space-y-4">
                        <div class="input">
                            <label for="name" class="text-sm font-semibold">Логин</label>
                            <input class="w-full py-2 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md" type="text"
                                name="name" id="name" placeholder="Логин" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="input">
                            <label for="email" class="text-sm font-semibold">Электронная почта</label>
                            <input class="w-full py-2 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md" type="email"
                                name="email" id="email" placeholder="Электронная почта"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="input">
                            <label for="password" class="text-sm font-semibold">Пароль</label>
                            <input class="w-full py-2 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md" type="password"
                                name="password" id="password" placeholder="Пароль">
                        </div>
                        <button type="submit" class="w-full py-2 !bg-[#ee4c7d] transition-all hover:!bg-[#9b1750] font-semibold text-white rounded-md">Сохранить изменения</button>
                        <!-- <div class="text-center border-none rounded-lg text-lg color-grey">
                            <button type="submit">
                                Выйти из аккаунта
                            </button>
                        </div> -->
                    </div>
                </form>
                <form action="{{ route('logout') }}" method="POST" class="text-center">
                    @csrf
                    <button type="submit" class="color-grey text-center font-semibold hover:underline">Выйти из аккаунта</button>
                </form>
            </div>
            <div class="publications w-2/3 text-center pl-28 space-y-8">
                <h1 class="font-semibold text-2xl">Ваши публикации</h1>
                <ul class="flex items-center justify-center gap-10">
                    @foreach ($stories as $index => $story)
                        <li class="max-w-[300px] w-full">
                            <div class="w-full">
                                <div
                                    class="public-block relative w-full h-64 bg-white border-primary rounded-md text-center p-5 color-grey">
                                    <div class="public-title text-xl line-clamp-1 mb-5">
                                        <h3>{{ $story->name }}</h3>
                                    </div>
                                    <div class="public-content mb-5">
                                        <p class="text-ellipsis line-clamp-3">
                                            {{ $story->description }}
                                        </p>
                                    </div>
                                    <div class="public-content">
                                        <p class="text-ellipsis line-clamp-1" style="opacity: 60%;">
                                            {{ $story->category->title }}
                                        </p>
                                    </div>
                                    <a class="text-sm font-semibold absolute bottom-4 left-1/2 -translate-x-1/2 w-4/5 rounded-md text-white transition-all hover:bg-[#9b1750] py-2 bg-[#ee4c7d]"
                                        href="{{ route('EditStory', ['id' => $story->id]) }}">Редактировать</a>
                                </div>
                                <div class="text-right">
                                    
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
