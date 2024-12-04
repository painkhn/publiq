@extends('layouts.app')
@section('title')
    Админка
@endsection

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <div class="h-main">
        <div class="px-28 text-center py-20">
            <div class="title mb-10 text-2xl">
                @if (count($stories) > 0)
                    <h2>Публикации на проверку</h2>
                @else
                    <h2>Публикаций на проверку нет</h2>
                @endif
            </div>
            <ul class="grid grid-adaptive w-full h-auto mx-auto my-0 justify-items-center mb-10">
                @foreach ($stories as $story)
                    <li class="max-w-md w-full mb-10">
                        <a href="{{ route('VerifStory', ['story_id' => $story->id]) }}"
                            class="w-full border-2 h-14 border-primary flex justify-center items-center color-grey text-xl rounded-md">{{ $story->name }}</a>
                        <div class="text-right color-grey">
                            <a href="{{ route('VerifStory', ['story_id' => $story->id]) }}">Проверить</a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="w-full bg-black p-10">
                <h2 class="text-gray-600 font-bold text-2xl mb-10">
                    Добавить категорию
                </h2>
                <form action="{{ route('category.create') }}" method="POST" style="max-width: 30%; margin: 0 auto">
                    @csrf
                    <input type="text" placeholder="Введите название категории" class="w-full border-2 border-primary px-4 h-14 mb-10" name="title">
                    <input type="submit" value="Добавить">
                </form>
            </div>
        </div>
        <div class="max-w-xl mx-auto my-0 mb-10">
            <div class="max-w-sm w-full mx-auto my-0 bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">{{ $totalUsers }}</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Пользователей за 7 дней</p>
                    </div>
                    <div>
                        <a href="{{ route('admin.exportUsers') }}" class="btn btn-primary">Экспорт в Excel</a>
                    </div>
                </div>
                <div id="area-chart"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        const options = {
            chart: {
                height: "100%",
                maxWidth: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                enabled: false,
                },
                toolbar: {
                show: false,
                },
            },
            tooltip: {
                enabled: true,
                x: {
                show: false,
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#1C64F2",
                gradientToColors: ["#1C64F2"],
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 6,
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                left: 2,
                right: 2,
                top: 0
                },
            },
            series: [
                {
                name: "Новых пользователей:",
                data: @json($data),
                color: "#1A56DB",
                },
            ],
            xaxis: {
                categories: @json($labels),
                labels: {
                show: false,
                },
                axisBorder: {
                show: false,
                },
                axisTicks: {
                show: false,
                },
            },
            yaxis: {
                show: false,
            },
        }

        if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("area-chart"), options);
            chart.render();
        }
    </script>
@endsection