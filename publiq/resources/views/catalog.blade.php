@extends('layouts.app')

@section('content')
    <div class="h-main px-28 py-20">
        <ul class="grid grid-adaptive">
            @foreach ($populars as $popular)
                <li class="mb-5">
                    <div class="max-w-lg">
                        <div
                            class="public-block w-full h-64 border-4 border-primary rounded-md text-center px-5 py-8 color-grey mb-2">
                            <div class="public-title text-xl mb-5">
                                <h3>{{ $popular->name }}</h3>
                            </div>
                            <div class="public-content">
                                <p>{{ $popular->description }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <a class="color-light-grey text-xl" href="{{ route('Story', ['id' => $popular->id]) }}">Читать</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
