@extends('layouts.app')
@section('title')
    Католог
@endsection

@section('content')
    <div class="h-main px-28 py-20">
        <form action="{{ route('Catalog') }}" method="GET" class="mb-10">
            <input type="text" name="query" placeholder="Поиск по названию" class="w-full h-14 border-2 border-primary px-4 color-grey text-lg mb-10" value="{{ request('query') }}">
            <select name="category_id" class="w-full h-14 border-2 border-primary px-4 color-grey text-lg mb-10" onchange="this.form.submit()">
                <option value="">Выберите категорию</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Поиск</button>
        </form>

        @if (count($populars) > 0)
            <ul class="grid grid-adaptive">
                @foreach ($populars as $popular)
                    <li class="mb-5">
                        <div class="max-w-lg">
                            <div class="public-block w-full h-64 border-4 border-primary rounded-md text-center px-5 py-8 color-grey mb-2">
                                <div class="public-title text-xl mb-5">
                                    <h3>{{ $popular->name }}</h3>
                                </div>
                                <div class="public-content mb-5">
                                    <p class="text-ellipsis" id="my-p-element-{{ $popular }}">{{ $popular->description }}</p>
                                </div>
                                <div class="public-content">
                                    <p class="text-ellipsis" style="opacity: 60%;" id="my-p-element-{{ $popular }}">
                                        {{ $popular->category->title }}
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <a class="color-light-grey text-xl" href="{{ route('Story', ['id' => $popular->id]) }}">Читать</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <h1 class="title text-2xl">Историй нет</h1>
        @endif
    </div>
    <script>
        const pElements = document.querySelectorAll('p[id^="my-p-element-"]');
        pElements.forEach((pElement) => {
            const text = pElement.textContent;
            if (text.length > 227) {
                pElement.textContent = text.slice(0, 227) + '...';
            }
        });
    </script>
@endsection