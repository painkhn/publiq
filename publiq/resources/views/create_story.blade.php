@extends('layouts.app')
@section('title')
    Добавление публикации
@endsection

@section('content')
    <form method="POST" action="{{ route('NewStory') }}">
        @csrf
        <div class="max-w-lg h-auto bg-white/80 rounded-md mx-auto my-0 p-5 space-y-4">
            <h1 class="text-center font-semibold">Добавить публикацию</h1>
            <div class="input">
                <label for="name" class="text-sm font-semibold">Название публикации</label>
                <input class="w-full py-2 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md" type="text" name="name"
                    id="name" placeholder="Название публикации">
            </div>
            <div>
                <label for="category_id" class="text-sm font-semibold">Категория</label>
                <select name="category_id" class="w-full py-2 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md">
                    <option selected>Выберите категорию</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="textarea">
                <label for="category_id" class="text-sm font-semibold">Текст публикации</label>
                <textarea class="w-full py-2 min-h-40 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md" name="description" id="description"
                    placeholder="Текст публикации"></textarea>
            </div>
            <button type="submit" class="w-full py-2 !bg-[#ee4c7d] transition-all hover:!bg-[#9b1750] font-semibold text-white rounded-md">Опубликовать</button>
        </div>
    </form>
@endsection
