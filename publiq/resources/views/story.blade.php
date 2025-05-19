@extends('layouts.app')
@section('title')
    {{ $story->name }}
@endsection

@section('content')
    <div class="p-10 mx-auto max-w-7xl h-main space-y-4">
        <h2 class="font-semibold text-2xl text-center">{{ $story->name }}</h2>
        <div class="public-block relative w-full bg-white border-primary rounded-md p-5 space-y-4">
            <p class="font-semibold text-lg">{{ $story->description }}</p>
            <p class="opacity-80 text-sm">{{ $story->category->title }}</p>
        </div>
        <div class="mb-10">
            <p class="font-semibold">{{ $story->user->name }}</p>
            <div class="flex items-center gap-x-2">
                <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>
                {{ $story->views_count }}
            </div>
            <!-- <p>Лайков: {{ $story->likes_count }}</p> -->
            <form action="{{ route('story.like', $story->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary flex items-center gap-x-2">
                    <!-- {{ $userLiked ? 'Убрать лайк' : 'Лайк' }} -->
                    @if ($userLiked)
                        <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z"/>
                        </svg>
                    @else
                        <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                        </svg>
                    @endif
                    {{ $story->views_count }}
                </button>
            </form>
        </div>
        <div class="mt-5">
            <h3 class="text-2xl font-semibold text-center mb-4">Комментарии</h3>
            <form action="{{ route('story.comment', $story->id) }}" method="POST" class="mb-4">
                @csrf
                <div class="relative">
                    <textarea name="content" class="w-full py-2 min-h-20 px-4 text-sm font-semibold placeholder:opacity-50 rounded-md" placeholder="Ваш комментарий"></textarea>
                    <button type="submit" class="bg-blue-500 transition-all hover:bg-blue-400 rounded-full absolute right-4 bottom-4 w-8 h-8 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </form>
            @foreach ($story->comments as $comment)
                <div class="bg-white px-4 py-2 rounded-md text-lg mb-10">
                    <p><strong>{{ $comment->user->name }}</strong></p>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection