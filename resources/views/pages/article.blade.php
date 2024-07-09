<x-layout :title="$article->title">

    <a href="{{ route('articles') }}">indietro</a>

    <br><br>
    <span>{{ $article->category}}</span>
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->user->email }}</p>
    <p>{{ $article->description }}</p>

    @if($article->image)
    <div class="mt-2">
        <img class="img-fluid" src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}">
    </div>
    @endif
</x-layout>