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
                <a @if(request("order")=="popularity") class="current" @endif href="?order=popularity">популярные записи</a>
            </li>
            {{--<li class="sorting__item sorting__item--active">--}}
            {{--<a href="javascript:void(0);">по интересам</a>--}}
            {{--</li>--}}
            <li class="sorting__item">
                <a @if(request("order")=="new") class="current" @endif href="?order=new">новые записи</a>
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
                    <div class="author">Автор:
                        <span>{{$item->user->name}}</span>
                    </div>
                    <div class="date">{{\Laravelrus\LocalizedCarbon\LocalizedCarbon::parse($item->date)->diffForHumans()}} </div>

                </div>
                <a class="post__img" href="/posts/{{$item->code}}">
                    <img src="/blog_pics/{{$item->picture}}" alt="{{$item->name}}"/>
                </a>
                <ul class="post-tags">
                    @foreach(explode(",",$item->tags) as $tag)
                        <li class="post-tags__item">
                            <a href="?tag={!! trim($tag)!!}" itemprop="articleSection">{{$tag}}</a>
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
                            {{--<a class="link" href="/posts/{{$item->code}}">Комментировать</a>--}}
                        </div>
                        {{--<a class="like" data-token="{{csrf_token()}}" data-code="{{$item->code}}"--}}
                        {{--href="javascript:void(0);">--}}
                        {{--<span>Мне нравится</span>--}}
                        {{--</a>--}}
                    </div>
                </div>
            </article>
        @endforeach

    </div>
    <!-- Pagination-->
    <section class="pagination">
        <div class="pagination__inner">
            {{$posts->links("postsPagination")}}
        </div>
    </section>

@endsection