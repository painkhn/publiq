@extends('layouts.app')
@section('title')
    Главная
@endsection

@section('content')
    <div class="p-10">
        @if (count($stories) > 0)
            <div class="public w-full mb-10">
                <div class="title text-2xl mb-8">
                    <h2 class="text-2xl font-semibold mb-4">Самые просматриваемые публикацию</h2>
                </div>
                <ul class="flex items-center gap-10">
                    @foreach ($populars->reverse() as $popular)
                        <li class="max-w-[300px] w-full">
                            <div class="w-full">
                                <div class="public-block relative w-full h-64 bg-white border-primary rounded-md text-center p-5 color-grey">
                                    <div class="public-title text-xl mb-5">
                                        <h3>{{ $popular->name }}</h3>
                                    </div>
                                    <div class="public-content mb-5">
                                        <p class="text-ellipsis" id="my-p-element-{{ $popular }}">
                                            {{ $popular->description }}
                                        </p>
                                    </div>
                                    <div class="public-content">
                                        <p class="text-ellipsis" style="opacity: 60%;" id="my-p-element-{{ $popular }}">
                                            {{ $popular->category->title }}
                                        </p>
                                    </div>
                                    <a class="text-sm font-semibold absolute bottom-4 left-1/2 -translate-x-1/2 w-4/5 rounded-md text-white transition-all hover:bg-[#9b1750] py-2 bg-[#ee4c7d]"
                                        href="{{ route('Story', ['id' => $popular->id]) }}">Читать</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="public w-full mb-10">
                <h2 class="text-2xl font-semibold mb-4">Новые публикации</h2>
                <ul class="flex items-center gap-10">
                    @foreach ($stories as $index => $story)
                        <li class="max-w-[300px] w-full">
                            <div class="w-full">
                                <div
                                    class="public-block relative w-full h-64 bg-white border-primary rounded-md text-center p-5 color-grey">
                                    <div class="public-title text-xl mb-5">
                                        <h3>{{ $story->name }}</h3>
                                    </div>
                                    <div class="public-content mb-5">
                                        <p class="text-ellipsis" id="my-p-element-{{ $story }}">
                                            {{ $story->description }}
                                        </p>
                                    </div>
                                    <div class="public-content">
                                        <p class="text-ellipsis" style="opacity: 60%;" id="my-p-element-{{ $story }}">
                                            {{ $story->category->title }}
                                        </p>
                                    </div>
                                    <a class="text-sm font-semibold absolute bottom-4 left-1/2 -translate-x-1/2 w-4/5 rounded-md text-white transition-all hover:bg-[#9b1750] py-2 bg-[#ee4c7d]"
                                        href="{{ route('Story', ['id' => $story->id]) }}">Читать</a>
                                </div>
                                <div class="text-right">
                                    
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <h1 class="title text-2xl font-semibold">Историй нет :(</h1>
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
