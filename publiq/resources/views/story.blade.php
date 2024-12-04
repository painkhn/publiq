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
        <div class="mb-10">
            <p>Просмотров: {{ $story->views_count }}</p>
            <p>Лайков: {{ $story->likes_count }}</p>
            <form action="{{ route('story.like', $story->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">
                    {{ $userLiked ? 'Убрать лайк' : 'Лайк' }}
                </button>
            </form>
        </div>
        <div class="mt-5">
            <h3 class="text-xl mb-3">Комментарии</h3>
            <form action="{{ route('story.comment', $story->id) }}" method="POST" class="mb-10">
                @csrf
                <textarea name="content" class="w-full h-20 border-2 border-primary px-4 py-2 color-grey text-lg mb-3" placeholder="Ваш комментарий"></textarea>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
            @foreach ($story->comments as $comment)
                <div class="border-2 border-primary px-4 color-grey text-lg mb-10">
                    <p><strong>{{ $comment->user->name }}</strong></p>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection