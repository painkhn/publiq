@extends('layouts.auth')

@section('content')
    <div class="w-full h-screen flex items-center justify-center">
        <div class="border-2 rounded-md max-w-3xl w-full border-primary py-20 px-24">
            <div class="title text-2xl text-center mb-10">
                <h2>Вход</h2>
            </div>
            <form method="POST" action="{{ route('login') }}" class="w-full">
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
                    <input name="email" id="email"
                        class="border-2 border-primary w-full rounded-md h-14 px-4 color-grey text-xl mb-10" type="email"
                        placeholder="Электронная почта">
                </div>
                <div class="input">
                    <input class="border-2 border-primary w-full rounded-md h-14 px-4 color-grey text-xl mb-10"
                        name="password" id="password" type="password" placeholder="Пароль">
                </div>
                <div class="flex justify-between items-center">
                    <a class="text-xl color-grey" href="{{ route('register') }}">Регистрация</a>
                    <input type="submit" class="max-w-52 w-full h-12 border-2 border-black rounded-lg text-2xl"
                        value="Войти">
                </div>
            </form>
        </div>
    </div>
@endsection
