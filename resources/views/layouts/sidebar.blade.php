<aside class="sidebar">
    <div class="main-info">
        <div class="main-info__block main-info__block--info">
            <a class="main-info__img" href="/">
                <img src="/img/girl-icon.png"
                     alt="Женский блог о моде, красоте, здоровье, культуре, увлечениях и современном образе жизни">
            </a>
            <div class="main-info__text">
                <h1 class="main-info__title">
                    <span>Женский блог </span>о красоте, здоровье, увлечениях и&nbsp;образе жизни для девушек</h1>
                <div class="main-info__warning">Блог для женской аудитории старше 18 лет</div>
            </div>
        </div>
        <div class="main-info__block main-info__block--buttons">
            <div class="main-info__btn">
                {{--<a class="main-info__link" href="page-subscribe.html">Подписаться</a>--}}
                {{--<a class="btn btn--subscribe" href="{{url("/subscribe")}}">Подписаться</a>--}}
            </div>
            <div class="categories">
                <a class="cat-hamburger" href="#">
                    <span class="hamburger-icon"></span><span class="rubric_name">Рубрики</span></a>
                <h2 class="categories__title">Рубрики женского блога</h2>
                <ul class="categories__list">
                    @foreach($categories as $category)
                        @if ($category->blog_posts->where("date", "<=", \Carbon\Carbon::now())->count()>0)
                            <li class="categories__item">
                                <a class="categories__link @if (stripos(request()->url(),$category->code)!==false) current @endif"
                                   data-url="{{request()->url()}}" href="/category/{{$category->code}}"><span
                                            class="rubric_name">{{$category->name}}</span>
                                    <span class="categories__counter">{{$category->blog_posts->where("date", "<=", \Carbon\Carbon::now())->count()}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{--<div class="invitation">--}}
    {{--<h3 class="invitation__title">Пригласить подругу в блог </h3>--}}
    {{--<form class="invitation__form" action="" method="">--}}
    {{--<label class="invitation__label">--}}
    {{--<input class="invitation__input" type="email" name="Email" placeholder="Укажите эл.почту"/>--}}
    {{--</label>--}}
    {{--<button class="btn btn--invite" type="submit">--}}
    {{--<span>Выслать приглашение</span>--}}
    {{--</button>--}}
    {{--</form>--}}
    {{--</div>--}}
</aside>