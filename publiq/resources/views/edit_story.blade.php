@extends('layouts.app')
@section('title')
    Редактирование публикации
@endsection

@section('content')
    <div class="bg-white rounded-md max-w-lg mx-auto p-5 pb-10">
        <h1 class="text-center font-semibold text-2xl mb-8">Редактирование публикации</h1>
        <form method="POST" action="{{ route('EditStory', ['id' => $story->id]) }}">
            @csrf
            <div class="h-auto my-0 space-y-4">
                <div class="input">
                    <label for="name" class="text-sm font-semibold">Название публикации</label>
                    <input class="w-full py-2 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md" type="text" name="name"
                        id="name" placeholder="Название публикации" value="{{ $story->name }}">
                </div>
                <div class="textarea">
                    <label for="description" class="text-sm font-semibold">Текст публикации</la>
                    <textarea class="w-full py-2 min-h-40 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md" name="description" id="description"
                        placeholder="Текст публикации">{{ $story->description }}</textarea>
                </div>
                <button type="submit" class="w-full py-2 !bg-[#ee4c7d] transition-all hover:!bg-[#9b1750] font-semibold text-white rounded-md">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
