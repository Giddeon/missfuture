@extends('layouts.layout')
@section('title',$post->title. " Женский блог Miss Future")
@section('description',$post->description)
@section('keywords',$post->tags)

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
                            <a href="/?tag={!! trim($tag)!!}" itemprop="articleSection">{{$tag}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if(\Illuminate\Support\Facades\Auth::user())
                <a class="like" data-code="{{$post->code}}" data-token="{{csrf_token()}}" href="javascript:void(0);">Мне
                    нравится</a>
            @endif
        </div>
        <!-- Text-->
        <h1 class="post__title" itemprop="name">{{$post->name}}</h1>
        <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
        <script src="//yastatic.net/share2/share.js"></script>
        {{--<p class="post__info">Рубрика: <a href="/category/{{$post->category->code}}">{{$post->category->name}}</a></p>--}}
        <div class="shareSocialURL">
            <div class="textShare">Поделиться ссылкой</div>
            <div class="socialIcons ya-share2" data-services="vkontakte,facebook,twitter"></div>
        </div>

        <div class="post__info">
            <div class="author">Автор:
                <span itemprop="author">{{$post->user->name}}</span>
            </div>
            <div class="date"
                 itemprop="datePublished">{{\Laravelrus\LocalizedCarbon\LocalizedCarbon::parse($post->date)->diffForHumans()}}</div>

        </div>
        <div class="post__text">{!!  html_entity_decode($post->text) !!}</div>
        <div class="control-panel">
            <div class="date">
                <span>Опубликовано: </span>{{\Laravelrus\LocalizedCarbon\LocalizedCarbon::parse($post->date)->diffForHumans()}}
            </div>
            <div class="counters">
                <div class="counters__looks">
                    <span>

                        @if ($post->views==0)
                            Нет просмотров
                        @elseif(substr($post->views,-1)==1)
                            {{$post->views}} просмотр
                        @elseif(substr($post->views,-1)>1 && substr($post->comments->count(),-1)<5)
                            {{$post->comments->count()}} просмотра
                        @else
                            {{$post->comments->count()}} просмотров
                        @endif

                    </span>
                </div>
                <div class="counters__comments" itemprop="interactionCount">
                    <span> @if ($post->comments->count()==0)
                            Нет комментариев
                        @elseif(substr($post->comments->count(),-1)==1)
                            {{$post->comments->count()}} комментарий
                        @elseif(substr($post->comments->count(),-1)>1 && substr($post->comments->count(),-1)<5)
                            {{$post->comments->count()}} комментария
                        @else
                            {{$post->comments->count()}} комментариев
                        @endif
                        </span>
                </div>
            </div>
            <div class="control-panel__btn">
                <a class="link up" href="https://missfuture.ru">
                    <span>Вернуться к списку записей</span>
                </a>
            </div>

        </div>
        @if(!\Illuminate\Support\Facades\Auth::user())
            <div class="noticeReg">Комментарии доступны после <a href="/blog/register"
                                                                 title="Регистрация в блоге Miss Future">регистрации в
                    блоге</a></div>
        @endif
    </article>
    @if(\Illuminate\Support\Facades\Auth::user())
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
                        <textarea class="subscribe__input" name="text" placeholder="Текст комментария" rows="4"></textarea>
                        {{--<input class="subscribe__input" type="text" name="text" placeholder="Текст комментария"/>--}}
                        <input class="subscribe__input" type="hidden" name="post_id" value="{{$post->id}}"/>
                    </label>
                    <div class="subscribe__btn">
                        <button class="subscription" type="submit" id="comment">Отправить</button>
                    </div>
                </form>
            </div>
        </section>
    @endif
@endsection