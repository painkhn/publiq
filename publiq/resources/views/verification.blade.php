@extends('layouts.app')

@section('content')
    <div class="max-w-lg h-auto mx-auto my-0 mb-20 py-20">
        <div class="input mb-10">
            <input class="w-full h-14 border-2 border-primary px-4 color-grey text-lg" type="text" name=""
                id="" value="{{ $story->name }}">
        </div>
        <div class="textarea mb-10">
            <textarea class="w-full h-96 border-2 border-primary px-4 color-grey text-lg pt-2">{{ $story->description }}</textarea>
        </div>
        <div class="submit text-center">
            <a href="{{ route('Solution', ['story_id' => $story->id, 'status' => 'accepted']) }}"
                class="max-w-52 w-full h-12 border-2 border-primary rounded-lg text-lg mx-2">Одобрить</a>
            <a href="{{ route('Solution', ['story_id' => $story->id, 'status' => 'reject']) }}"
                class="max-w-52 w-full h-12 border-2 border-primary rounded-lg text-lg mx-2">Отказать</a>
        </div>
    </div>
@endsection
