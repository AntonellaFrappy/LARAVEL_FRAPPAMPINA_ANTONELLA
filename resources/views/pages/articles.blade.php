<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title }} </title>
    <link rel="stylesheet" href="{{asset ('css/style.css')}}">
</head>
<body>
  <nav>
    <a href =" {{ route ('welcome')}}">Home </a>
    <a href =" {{ route ('articles')}}">Articoli </a>
    <a href =" {{ route ('about-us')}}">Chi siamo </a>
    <a href =" {{ route ('contacts')}}"> Contatti </a>
    </nav>
    @if($titleIsVisible)
    <h1 class="title">Articoli</h1>
    @endif

    @foreach($articles as $index => $article)
    @if ($article['visible'])
    <li>
      <a href="{{route ('article.show',$index)}}">{{index}} - {($article ['title'])}
    </li>
    @endif
    @endforeach
</body>
</html>