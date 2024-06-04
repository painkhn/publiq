@extends('layouts.app')

@section('content')
    <div class="px-28">
        <div class="public w-full mb-20">
            <div class="title text-2xl mb-8">
                <h2>Самые просматриваемые публикацию</h2>
            </div>
            <ul class="grid grid-adaptive">
                <li>
                    <div class="max-w-lg">
                        <div
                            class="public-block w-full h-64 border-4 border-primary rounded-md text-center px-5 py-8 color-grey mb-2">
                            <div class="public-title text-xl mb-5">
                                <h3>Название истории</h3>
                            </div>
                            <div class="public-content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque repellendus culpa
                                    odit incidunt natus error illo maxime, quae beatae temporibus ipsum, doloribus
                                    consequuntur tempore distinctio similique suscipit nam. Ex?</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <a class="color-light-grey text-xl" href="#!">Читать</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="max-w-lg">
                        <div
                            class="public-block w-full h-64 border-4 border-primary rounded-md text-center px-5 py-8 color-grey">
                            <div class="public-title text-xl mb-5">
                                <h3>Название истории</h3>
                            </div>
                            <div class="public-content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque repellendus culpa
                                    odit incidunt natus error illo maxime, quae beatae temporibus ipsum, doloribus
                                    consequuntur tempore distinctio similique suscipit nam. Ex?</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <a class="color-light-grey text-xl" href="#!">Читать</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="max-w-lg">
                        <div
                            class="public-block w-full h-64 border-4 border-primary rounded-md text-center px-5 py-8 color-grey">
                            <div class="public-title text-xl mb-5">
                                <h3>Название истории</h3>
                            </div>
                            <div class="public-content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque repellendus culpa
                                    odit incidunt natus error illo maxime, quae beatae temporibus ipsum, doloribus
                                    consequuntur tempore distinctio similique suscipit nam. Ex?</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <a class="color-light-grey text-xl" href="#!">Читать</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="public w-full mb-20">
            <div class="title text-2xl mb-8">
                <h2>Новые публикации</h2>
            </div>
            <ul class="grid grid-adaptive">
                @foreach ($stories as $story)
                    <li>
                        <div class="max-w-lg">
                            <div
                                class="public-block w-full h-64 border-4 border-primary rounded-md text-center px-5 py-8 color-grey mb-2">
                                <div class="public-title text-xl mb-5">
                                    <h3>{{ $story->name }}</h3>
                                </div>
                                <div class="public-content">
                                    <p>{{ $story->description }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <a class="color-light-grey text-xl" href="#!">Читать</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
