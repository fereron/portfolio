<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/960.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">

    <title>Статьи</title>
</head>
<body>

<div class="container_12">

    <div class="grid_4 ">
        <ul class="categories_list">

            @foreach ($categories as $category)
                <li {{ (Request::url() == route('category',[$category->alias])) ? 'class=active' : '' }} >
                    <a href="{{ $category->alias }}">{{ $category->title }}</a>
                </li>
            @endforeach

        </ul>
    </div>

    <div class="grid_7 suffix_1">

        @foreach ($articles as $article )
            <div class="article">
                <h2>
                    <a href="{{ route('article', [$article->slug]) }}">
                        {{ $article->title }}
                    </a>
                </h2>
                <div class="created">
                    {{ $article->created_at->format('j F o') }}
                </div>
                <div class="text">
                    {{ substr($article->text, 0, 1000) }}...
                </div>
            </div>
        @endforeach

    </div>


</div>

</body>
</html>