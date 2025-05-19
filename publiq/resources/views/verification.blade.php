@extends('layouts.app')
@section('title')
    Публикация
@endsection

@section('content')
    <div class="max-w-lg h-auto mx-auto my-0 mb-20 space-y-4">
        <div class="input">
            <label for="name" class="text-sm font-semibold">Название публикации</label>
            <input class="w-full py-2 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md" type="text" name=""
                id="" value="{{ $story->name }}">
        </div>
        <div class="input">
            <label for="name" class="text-sm font-semibold">Категория</label>
            <div class="w-full py-2 px-4 text-sm font-semibold bg-white border border-black rounded-md"> {{ $story->category->title }}</div>
        </div>
        <div class="textarea">
            <label for="name" class="text-sm font-semibold">Текст публикации</label>
            <textarea class="w-full min-h-40 py-2 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md">{{ $story->description }}</textarea>
        </div>
        <div class="text-center">
            <a href="{{ route('Solution', ['story_id' => $story->id, 'status' => 'accepted']) }}"
                class="px-4 w-full py-2 rounded-lg text-sm font-semibold bg-[#ee4c7d] text-white transition-all hover:bg-[#9b1750]">Одобрить</a>
            <a href="{{ route('Solution', ['story_id' => $story->id, 'status' => 'reject']) }}"
                class="px-4 w-full py-2 rounded-lg text-sm font-semibold text-black transition-all hover:underline">Отказать</a>
        </div>
    </div>
@endsection
