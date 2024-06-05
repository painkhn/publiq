@extends('layouts.app')
@section('title')
    Главная
@endsection

@section('content')
    <div class="px-28 py-20">
        @if (count($stories) > 0)
            <div class="public w-full mb-20">
                <div class="title text-2xl mb-8">
                    <h2>Самые просматриваемые публикацию</h2>
                </div>
                <ul class="grid grid-adaptive">
                    @foreach ($populars->reverse() as $popular)
                        <li>
                            <div class="max-w-lg">
                                <div
                                    class="public-block w-full min-h-64 border-4 border-primary rounded-md text-center px-5 py-8 color-grey mb-2">
                                    <div class="public-title text-xl mb-5">
                                        <h3>{{ $popular->name }}</h3>
                                    </div>
                                    <div class="public-content">
                                        <p class="text-ellipsis" id="my-p-element-{{ $popular }}">
                                            {{ $popular->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="public w-full mb-20">
                <div class="title text-2xl mb-8">
                    <h2>Новые публикации</h2>
                </div>
                <ul class="grid grid-adaptive">
                    @foreach ($stories as $index => $story)
                        <li>
                            <div class="max-w-lg">
                                <div
                                    class="public-block w-full min-h-64 border-4 border-primary rounded-md text-center px-5 py-8 color-grey mb-2">
                                    <div class="public-title text-xl mb-5">
                                        <h3>{{ $story->name }}</h3>
                                    </div>
                                    <div class="public-content">
                                        <p class="text-ellipsis" id="my-p-element-{{ $story }}">
                                            {{ $story->description }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <a class="color-light-grey text-xl"
                                        href="{{ route('Story', ['id' => $story->id]) }}">Читать</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
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
