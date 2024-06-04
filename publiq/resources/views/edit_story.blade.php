@extends('layouts.app')
@section('title')
    Редактирование публикации
@endsection

@section('content')
    <form method="POST" action="{{ route('EditStory', ['id' => $story->id]) }}">
        @csrf
        <div class="max-w-lg h-auto mx-auto my-0 mb-20 py-20">
            <div class="input mb-10">
                <input class="w-full h-14 border-2 border-primary px-4 color-grey text-lg" type="text" name="name"
                    id="name" placeholder="Название публикации" value="{{ $story->name }}">
            </div>
            <div class="textarea mb-10">
                <textarea class="w-full h-96 border-2 border-primary px-4 color-grey text-lg pt-2" name="description" id="description"
                    placeholder="Текст публикации">{{ $story->description }}</textarea>
            </div>
            <div class="submit text-center">
                <input class="max-w-52 w-full h-12 border-2 border-primary rounded-lg text-lg" type="submit"
                    value="Сохранить">
            </div>
        </div>
    </form>
@endsection
