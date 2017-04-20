@extends('layouts.layout')
@section('title',$post->title)
@section('description',$post->description)
@section('keywords',$post->tags)
@section('title')
    Женский блог о красоте, здоровье, увлечениях и образе жизни для девушек
@endsection

@section('content')
    <!-- Post-->
    <article class="post page--sample">
        <!-- Main img-->
        <div class="post__img">
            <img src="/blog_pics/{{$post->picture}}" alt="{{$post->name}}" itemprop="image">
        </div>
        <!-- Tags-->
        <div class="post__tags">
            <div class="post__tags-block">
                <span>Интересы:</span>
                <ul class="post-tags">
                    @foreach(explode(",",$post->tags) as $tag)
                        <li class="post-tags__item">
                            <a href="#" itemprop="articleSection">{{$tag}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <a class="like" data-code="{{$post->code}}" data-token="{{csrf_token()}}" href="javascript:void(0);">Мне
                нравится</a>
        </div>
        <!-- Text-->
        <h1 class="post__title" itemprop="name">{{$post->name}}</h1>
        <div class="post__info">
            <div class="date" itemprop="datePublished">{{$post->created_at->diffForHumans()}}</div>
            <div class="author">Автор:
                <span itemprop="author">{{$post->user->name}}</span>
            </div>
        </div>
        <div class="post__text">{!!  html_entity_decode($post->text) !!}</div>
        <div class="control-panel">
            <div class="date">
                <span>Опубликовано: </span>{{$post->date}}</div>
            <div class="counters">
                <div class="counters__looks">{{$post->views}}
                    <span>просмотров</span>
                </div>
                <div class="counters__comments" itemprop="interactionCount">{{$post->comments->count()}}
                    <span>комментария</span>
                </div>
            </div>
            <div class="control-panel__btn">
                <a class="link up" href="" onclick="window.history.back()">
                    <span>Вернуться к списку записей</span>
                </a>
            </div>
        </div>
    </article>
    <!-- Comments-->
    <section class="comments">
        <div class="comments__inner">
            <h3 class="comments__title">Комментарии</h3>
            <div class="comments__items">
                @foreach($post->comments as $comment)
                    <article class="comment">
                        <a class="comment__person" href="#">{{$comment->user->name}}</a>
                        <div class="comment__text">
                            <p>{{$comment->text}}</p>
                        </div>
                        <div class="comment__time">
                            <span class="comment__time-added">Добавлено {{$comment->created_at->diffForHumans()}}</span>
                        </div>
                    </article>
                @endforeach

            </div>
            <a class="comments__add" href="#">Добавить комментарий</a>
            <form action="/comments/create" class="comments_form" method="post" style="display: none">
                {{csrf_field()}}

                <label class="subscribe__label">
                    <input class="subscribe__input" type="text" name="text" placeholder="Текст комментария"/>
                    <input class="subscribe__input" type="hidden" name="post_id" value="{{$post->id}}"/>
                </label>
                <div class="subscribe__btn">
                    <button class="subscription" type="submit">Отправить</button>
                </div>
            </form>
        </div>
    </section>
@endsection