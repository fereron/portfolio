<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/960.css') }}">
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}">

    <title>Статьи</title>
</head>
<body>

<section class="container_12">

    <aside class="grid_4 ">
        <ul class="categories_list">

            @foreach ($categories as $category)
                <li {{ (Request::url() == route('category',[$category->alias])) ? 'class=active' : '' }} >
                    <a href="{{ route('category', $category->alias) }}">{{ $category->title }}</a>
                </li>
            @endforeach

        </ul>
    </aside>

    <div class="grid_8">
        <?php /** @var \App\Article $article */ ?>
{{--{{ dd($articles) }}--}}
        @forelse ($articles as $article )
            <article class="article">
                <img src="{{ $article->image_url }}" alt="">

                <div class="article-description">
                    <h2>
                        <a href="{{ route('article', [$article->slug]) }}">
                            {{ $article->title }}
                        </a>
                    </h2>
                    <div class="created_date">
                        {{ $article->created_at->format('j F o') }}
                    </div>
                    <hr>
                    <br>
                    <div class="article-preview">
                        {{ substr($article->text, 0, 1000) }}...
                    </div>
                </div>
                <footer>
                    {{--<hr>--}}
                    <a class="read_more" href="{{ route('article', [$article->slug]) }}">Читать далее...</a>
                </footer>
            </article>
            @empty
            <h1 style="text-align: center; color: #4c4c4c">Статей нет</h1>
            @endforelse
    </div>

</section>

</body>
</html>