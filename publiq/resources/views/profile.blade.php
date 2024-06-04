@extends('layouts.app')
@section('title')
    Профиль
@endsection


@section('content')
    <div class="h-main">
        <div class="flex justify-between px-28 py-20">
            <div class="profile-edit w-1/3 pr-28">
                <form method="POST" action="{{ route('EditUser') }}">
                    @csrf
                    <div class="w-full">
                        <div class="input mb-10">
                            <input class="w-full h-14 border-2 border-primary px-4 color-grey text-lg" type="email"
                                name="email" id="email" placeholder="Электронная почта"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="input mb-10">
                            <input class="w-full h-14 border-2 border-primary px-4 color-grey text-lg" type="text"
                                name="name" id="name" placeholder="Логин" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="input mb-10">
                            <input class="w-full h-14 border-2 border-primary px-4 color-grey text-lg" type="text"
                                name="password" id="password" placeholder="Пароль">
                        </div>
                        <div class="submit text-center">
                            <input class="border-none rounded-lg text-lg color-grey" type="submit"
                                value="Сохранить изменения">
                        </div>
                    </div>
                </form>
            </div>
            <div class="publications w-2/3 text-center pl-28">
                <div class="title text-center mb-10 text-2xl">
                    <p>Ваши публикации</p>
                </div>
                <ul class="grid grid-cols-2">
                    @foreach ($stories as $story)
                        <li class="max-w-md mb-10">
                            <a href="#!"
                                class="w-full border-2 h-14 border-primary flex justify-center items-center color-grey text-xl rounded-md">{{ $story->name }}</a>
                            <div class="text-right color-grey">
                                <a href="{{ route('EditStory', ['id' => $story->id]) }}">Редактировать</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
