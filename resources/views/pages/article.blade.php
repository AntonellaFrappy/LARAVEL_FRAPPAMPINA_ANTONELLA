<x-layout :title="$article['title']">

    <a href="{{route('articles')}}">indietro</a>
    
    

    <br><br>

    <span>{{ $article['category'] }}</span>

    <h1>{{ $article['title'] }}</h1>
    <p>{{ $article['description'] }}</p>
</x-layout>


    