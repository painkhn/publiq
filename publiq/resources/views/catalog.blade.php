@extends('layouts.app')
@section('title')
    Католог
@endsection

@section('content')
    <div class="p-10">
        <form action="{{ route('Catalog') }}" method="GET" class="mb-10 space-y-4 max-w-[640px] w-full">
            <div>
                <label for="query" class="text-sm font-semibold">Категория</label>
                <input type="text" name="query" placeholder="Поиск по названию" class="w-full py-2 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md" value="{{ request('query') }}">
            </div>
            <div>
                <label for="category_id" class="text-sm font-semibold">Категория</label>
                <select name="category_id" class="w-full py-2 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md" onchange="this.form.submit()">
                    <option value="">Выберите категорию</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full py-2 !bg-[#ee4c7d] transition-all hover:!bg-[#9b1750] font-semibold text-white rounded-md">Поиск</button>
            <a href="{{ route('Catalog') }}" class="text-sm font-semibold text-center py-2 transition-all hover:bg-white rounded-md block">Сброс</a>
        </form>

        @if (count($populars) > 0)
            <ul class="flex items-center flex-wrap gap-10">
                @foreach ($populars as $popular)
                    <li class="max-w-[300px] w-full">
                        <div class="w-full">
                            <div class="public-block relative w-full h-64 bg-white border-primary rounded-md text-center p-5 color-grey">
                                <div class="public-title text-xl line-clamp-1 mb-5">
                                    <h3>{{ $popular->name }}</h3>
                                </div>
                                <div class="public-content mb-5">
                                    <p class="text-ellipsis line-clamp-3">{{ $popular->description }}</p>
                                </div>
                                <div class="public-content">
                                    <p class="text-ellipsis" style="opacity: 60%;">
                                        {{ $popular->category->title }}
                                    </p>
                                </div>
                                <a class="text-sm font-semibold absolute bottom-4 left-1/2 -translate-x-1/2 w-4/5 rounded-md text-white transition-all hover:bg-[#9b1750] py-2 bg-[#ee4c7d]" href="{{ route('Story', ['id' => $popular->id]) }}">Читать</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <h1 class="title text-2xl">Историй нет</h1>
        @endif
    </div>
@endsection