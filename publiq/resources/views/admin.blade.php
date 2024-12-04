@extends('layouts.app')
@section('title')
    Админка
@endsection

@section('content')
    <div class="h-main">
        <div class="px-28 text-center py-20">
            <div class="title mb-10 text-2xl">
                @if (count($stories) > 0)
                    <h2>Публикации на проверку</h2>
                @else
                    <h2>Публикаций на проверку нет</h2>
                @endif
            </div>
            <ul class="grid grid-adaptive w-full h-auto mx-auto my-0 justify-items-center mb-10">
                @foreach ($stories as $story)
                    <li class="max-w-md w-full mb-10">
                        <a href="{{ route('VerifStory', ['story_id' => $story->id]) }}"
                            class="w-full border-2 h-14 border-primary flex justify-center items-center color-grey text-xl rounded-md">{{ $story->name }}</a>
                        <div class="text-right color-grey">
                            <a href="{{ route('VerifStory', ['story_id' => $story->id]) }}">Проверить</a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="w-full bg-black p-10">
                <h2 class="text-gray-600 font-bold text-2xl mb-10">
                    Добавить категорию
                </h2>
                <form action="{{ route('category.create') }}" method="POST" style="max-width: 30%; margin: 0 auto">
                    @csrf
                    <input type="text" placeholder="Введите название категории" class="w-full border-2 border-primary px-4 h-14 mb-10" name="title">
                    <input type="submit" value="Добавить">
                </form>
            </div>
        </div>
    </div>
@endsection
