{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.auth')

@section('content')
    <div class="w-full h-screen flex items-center justify-center">
        <div class="border-2 rounded-md max-w-3xl w-full border-primary py-20 px-24">
            <div class="title text-2xl text-center mb-10">
                <h2>Вход</h2>
            </div>
            <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf
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
                    <a type="submit">
                        <input type="submit" class="max-w-52 w-full h-12 border-2 border-black rounded-lg text-2xl"
                            value="Войти">
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
