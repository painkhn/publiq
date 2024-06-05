@extends('layouts.app')
@section('title')
    Католог
@endsection

@section('content')
    <div class="h-main px-28 py-20">
        @if (count($populars) > 0)
            <ul class="grid grid-adaptive">
                @foreach ($populars as $popular)
                    <li class="mb-5">
                        <div class="max-w-lg">
                            <div
                                class="public-block w-full min-h-64 border-4 border-primary rounded-md text-center px-5 py-8 color-grey mb-2">
                                <div class="public-title text-xl mb-5">
                                    <h3>{{ $popular->name }}</h3>
                                </div>
                                <div class="public-content">
                                    <p class="text-ellipsis" id="my-p-element-{{ $popular }}">{{ $popular->description }}
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <a class="color-light-grey text-xl"
                                    href="{{ route('Story', ['id' => $popular->id]) }}">Читать</a>
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
