@extends('layouts.auth')
@section('title')
    Регистрация
@endsection

@section('content')
    <div class="title text-2xl text-center">
        <h2 class="font-semibold">Регистрация</h2>
    </div>
    <form method="POST" action="{{ route('register') }}" class="w-full space-y-4 mb-4">
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
        <div class="input">
            <label for="name" class="text-sm font-semibold">Имя</label>
            <input class="w-full rounded-md py-2 px-4 color-grey text-sm" type="text"
                name="name" placeholder="Логин">
        </div>
        <div class="input">
            <label for="email" class="text-sm font-semibold">Электронная почта</label>
            <input class="w-full rounded-md py-2 px-4 color-grey text-sm"
                type="email" name="email" placeholder="Электронная почта">
        </div>
        <div class="input">
            <label for="password" class="text-sm font-semibold">Пароль</label>
            <input class="w-full rounded-md py-2 px-4 color-grey text-sm"
                name="password" type="password" placeholder="Пароль">
        </div>
        <button type="submit" class="cursor-pointer w-full py-2 bg-[#ee4c7d] transition-all hover:bg-[#9b1750] text-white rounded-md font-semibold text-sm">Зарегистрироваться</button>
        <div class="text-center">
            <a class="text-sm font-semibold transition-all hover:opacity-80" href="{{ route('login') }}">Вход</a>
        </div>
    </form>
@endsection
