@extends('layouts.auth')
@section('title')
    Вход
@endsection

@section('content')
    <div class="title text-2xl text-center">
        <h2 class="font-semibold">Вход</h2>
    </div>
    <form method="POST" action="{{ route('login') }}" class="w-full space-y-4 mb-4">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <label for="email" class="text-sm font-semibold">Электронная почта</label>
            <input name="email" id="email"
                class="border w-full rounded-md py-2 px-4 color-grey text-sm" type="email"
                placeholder="Электронная почта">
        </div>
        <div>
            <label for="password" class="text-sm font-semibold">Пароль</label>
            <input class="border w-full rounded-md py-2 px-4 color-grey text-sm"
                name="password" id="password" type="password" placeholder="Пароль">
        </div>
        <div class="text-right">
            <a class="text-sm font-semibold transition-all hover:opacity-80" href="{{ route('register') }}">Регистрация</a>
        </div>
        <button type="submit" class="cursor-pointer w-full py-2 bg-[#ee4c7d] transition-all hover:bg-[#9b1750] text-white rounded-md font-semibold text-sm">Войти</button>
    </form>
    <form method="GET" action="{{ route('yandex') }}">
        @csrf
        <button class="w-full py-2 border border-black rounded-md text-sm font-semibold">
            Вход по Яндекс ID
        </button>
    </form>
@endsection
