@extends('layouts.layout')
@section('title','Женский блог о красоте, здоровье, увлечениях и образе жизни для девушек')
@section('description','Miss Future — женский блог о красоте, здоровье, увлечениях и образе жизни для девушек')
@section('keywords','Miss Future, блог, женский журнал, красота, здоровье, образ жизни, блог для девушек')
@section('title')
    Женский блог о красоте, здоровье, увлечениях и образе жизни для девушек
@endsection

@section('content')

    <!-- Sorting-->
    <section class="sorting">
        <span class="sorting__text">Актуальные записи женского блога Miss Future:</span>
        <ul class="sorting__list">
            <li class="sorting__item">
                <a href="?order=popularity">популярное</a>
            </li>
            {{--<li class="sorting__item sorting__item--active">--}}
                {{--<a href="javascript:void(0);">по интересам</a>--}}
            {{--</li>--}}
            <li class="sorting__item">
                <a href="/">новые записи</a>
            </li>
        </ul>
    </section>
    <!-- Articles-->
    <div class="articles">
        @foreach ($posts as $item)
            <article class="post">
                <h3 class="post__title">
                    <a href="/posts/{{$item->code}}"
                       title="Как правильно организовать занятия йогой и диету">{{$item->name}}</a>
                </h3>
                <div class="post__info">
                    <div class="date">{{$item->created_at->diffForHumans()}} </div>
                    <div class="author">Автор:
                        <span>{{$item->user->name}}</span>
                    </div>
                </div>
                <a class="post__img" href="/posts/{{$item->code}}">
                    <img src="/blog_pics/{{$item->picture}}" alt="{{$item->name}}"/>
                </a>
                <ul class="post-tags">
                    @foreach(explode(",",$item->tags) as $tag)
                        <li class="post-tags__item">
                            <a href="?tag={{$tag}}" itemprop="articleSection">{{$tag}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="post__excerpt">{!! $item->preview_text !!}
                </div>
                <div class="control-panel">
                    <a class="btn btn--more" href="/posts/{{$item->code}}">Читать дальше</a>
                    <div class="functions">
                        <div class="functions__wrapper">
                            <div class="counters">
                                <div class="counters__looks">{{$item->views}}</div>
                                <div class="counters__comments">{{$item->comments->count()}}</div>
                            </div>
                            <a class="link" href="page.html">Комментировать</a>
                        </div>
                        <a class="like" data-token="{{csrf_token()}}" data-code="{{$item->code}}"
                           href="javascript:void(0);">
                            <span>Мне нравится</span>
                        </a>
                    </div>
                </div>
            </article>
        @endforeach

    </div>
    <!-- Pagination-->
    {{--<section class="pagination">--}}
        {{--<div class="pagination__inner">--}}
            {{--<span class="pagination__page">Страница</span>--}}
            {{--<li class="pagination__item">--}}
                {{--<a href="page.html" rel="prev">Назад</a>--}}
            {{--</li>--}}
            {{--<ul class="pagination__list">--}}
                {{--<li class="pagination__item  pagination__item--active">--}}
                    {{--<a href="page.html" rel="canonical">1</a>--}}
                {{--</li>--}}
                {{--<li class="pagination__item">--}}
                    {{--<a href="page.html">2</a>--}}
                {{--</li>--}}
                {{--<li class="pagination__item">--}}
                    {{--<a href="page.html">3</a>--}}
                {{--</li>--}}
                {{--<li class="pagination__item">--}}
                    {{--<a href="page.html">4</a>--}}
                {{--</li>--}}
                {{--<li class="pagination__item">--}}
                    {{--<a href="page.html">5</a>--}}
                {{--</li>--}}
                {{--<li class="pagination__item">--}}
                    {{--<a href="page.html" rel="next">Вперед</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--<a class="pagination__back up" href="page.html">Вернуться в начало</a>--}}
        {{--</div>--}}
    {{--</section>--}}

@endsection