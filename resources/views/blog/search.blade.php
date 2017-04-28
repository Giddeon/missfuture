@extends('layouts.layout')

@section('title','О блоге для девушек. Miss Future — женский блог о красоте, здоровье, увлечениях и образе жизни.')


@section('content')
    <!-- Search advanced-->
    <section class="search-advanced">
        <form class="search-advanced__form" action="/search">
            <label class="search-advanced__label">
                <input class="search-advanced__input" type="text" name="q" value="{{request("q")}}" placeholder="Поиск по сайту"/>
            </label>
            <select class="search-advanced__select" name="category">
                <option selected="selected">По интересам</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <button class="btn" type="submit">Найти</button>
        </form>
    </section>
    <!-- Search results-->
    <section class="search-results">
        <div class="search-results__heading">
            @if (!empty($posts))
                <h3 class="search-results__title">Результаты поиска по запросу "{{request("q")}}":</h3>
                <div class="search-results__amount">Найдено {{$posts->count()}} записей в блоге</div>
            @endif
        </div>
        @if (!empty($posts))
            <ol class="search-results__list">
                @foreach($posts as $post)
                    <li class="search-results__item">
                        <h2 class="search-results__subtitle">
                            <a class="search-results__link" href="/posts/{{$post->code}}">{{$post->name}}</a>
                        </h2>
                        <div class="search-results__date">
                            Опубликовано {{\Laravelrus\LocalizedCarbon\LocalizedCarbon::parse($post->date)->diffForHumans()}}</div>
                    </li>
                @endforeach
            </ol>
        @endif
    </section>
@endsection