@extends('layouts.app')
@section('title')
    {{ $story->name }}
@endsection

@section('content')
    <div class="py-20 mx-auto max-w-7xl h-main">
        <div class="text-center text-2xl mb-14">
            <h2>{{ $story->name }}</h2>
        </div>
        <div class="border-4 border-primary px-8 py-10 color-grey text-xl rounded-md mb-5">
            <p class="mb-10">{{ $story->description }}</p>
            <p style="opacity: 60%;">{{ $story->category->title }}</p>
        </div>
        <div class="user text-xl">
            <a>{{ $story->user->name }}</a>
        </div>
    </div>
@endsection
