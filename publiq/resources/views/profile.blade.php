@extends('layouts.app')

@section('content')
    <div class="h-main">
        <div class="flex justify-between px-28">
            <div class="profile-edit w-1/3 pr-28">
                <form>
                    <div class="w-full">
                        <div class="input mb-10">
                            <input class="w-full h-14 border-2 border-primary px-4 color-grey text-lg" type="email"
                                name="" id="" placeholder="Электронная почта">
                        </div>
                        <div class="input mb-10">
                            <input class="w-full h-14 border-2 border-primary px-4 color-grey text-lg" type="text"
                                name="" id="" placeholder="Логин">
                        </div>
                        <div class="input mb-10">
                            <input class="w-full h-14 border-2 border-primary px-4 color-grey text-lg" type="text"
                                name="" id="" placeholder="Пароль">
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
                    <li class="max-w-md mb-10">
                        <a href="#!"
                            class="w-full border-2 h-14 border-primary flex justify-center items-center color-grey text-xl rounded-md">Название
                            публикации</a>
                        <div class="text-right color-grey">
                            <a href="#!">Редактировать</a>
                        </div>
                    </li>
                    <li class="max-w-md mb-10">
                        <a href="#!"
                            class="w-full border-2 h-14 border-primary flex justify-center items-center color-grey text-xl rounded-md">Название
                            публикации</a>
                        <div class="text-right color-grey">
                            <a href="#!">Редактировать</a>
                        </div>
                    </li>
                    <li class="max-w-md mb-10">
                        <a href="#!"
                            class="w-full border-2 h-14 border-primary flex justify-center items-center color-grey text-xl rounded-md">Название
                            публикации</a>
                        <div class="text-right color-grey">
                            <a href="#!">Редактировать</a>
                        </div>
                    </li>
                    <li class="max-w-md mb-10">
                        <a href="#!"
                            class="w-full border-2 h-14 border-primary flex justify-center items-center color-grey text-xl rounded-md">Название
                            публикации</a>
                        <div class="text-right color-grey">
                            <a href="#!">Редактировать</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
