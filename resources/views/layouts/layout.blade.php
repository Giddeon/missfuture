<!DOCTYPE html>
<html lang="ru">
<!-- Head-->
<head>
    <title>@yield("title")</title>
    <!-- Main Meta information-->
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <meta name="keywords" content="@yield("keywords")">
    <meta name="description"
          content="@yield("description")">
    <meta name="author" content="Miss Future">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/img/favicon/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="shortcut icon" href="/fav.ico">
    <meta name="apple-mobile-web-app-title" content="Женский блог Miss Future">
    <meta name="application-name" content="Женский блог Miss Future">
    <link rel="stylesheet" href="/css/cssmin.css">
    <link rel="stylesheet" href="/css/auth.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<!-- Header-->
<header class="header">
    <div class="header__inner">
        <div class="header__slogan">
            <a href="/" title="Вернуться на главную страницу блога Miss Future">
                <img src="/img/svg/logo.svg"
                     alt="Miss Future: женский блог о красоте, здоровье, увлечениях и образе жизни для девушек">
            </a>
        </div>
        <div class="header__nav">
            <!-- Nav-->
            <nav class="nav">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a class="nav__link @if (request()->url()=="https://missfuture.ru" && request("order")=="") current @endif" href="/">Женский блог</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link @if (request("order")=="popularity") current @endif" href="/?order=popularity">Популярное</a>
                    </li>
                    {{--<li class="nav__item">--}}
                    {{--<a class="nav__link" href="/">Подписка</a>--}}
                    {{--</li>--}}
                    <li class="nav__item">
                        <a class="nav__link @if (request()->url()=="https://missfuture.ru/blog") current @endif" href="/blog">О&nbsp;блоге</a>
                    </li>
                </ul>
                <div class="nav__hamburger">
                    <a class="main-hamburger" href="#"><span></span></a>
                </div>
            </nav>
        </div>
        <div class="header__user">
            @if(\Illuminate\Support\Facades\Auth::user())
                <a class="username" href="javascript:void(0)">{{@\Illuminate\Support\Facades\Auth::user()->name}}</a>
            @endif
            <a @if(\Illuminate\Support\Facades\Auth::user()) onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" @else href="/blog/login" @endif><img src="/img/svg/enter-icon.svg" alt="Вход"
                                       title="Авторизация для подписчиков блога" width="18"></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
        </div>
        <div class="header__search">
            <form id="head__search" action="/search">
                <input type="search" name="q" placeholder="Поиск по сайту">
            </form>
        </div>
    </div>
</header>
<div class="page page--index">
    <!-- Sidebar-->
@include('layouts.sidebar')
<!-- Sidebar-->
    <main class="main" role="main">
        @yield('content')
    </main>
</div>
<!-- Footer-->
<footer class="footer">
    <div class="footer__inner">
        <div class="copyright">2017&nbsp;©&nbsp;Miss&nbsp;Future. <strong>Женский блог</strong><span class="hidden"> о красоте, здоровье, увлечениях</span>.
        </div>
    </div>
</footer>
<script src="/js/scripts.js?123123"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript"> (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter44359942 = new Ya.Metrika({
                    id: 44359942,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true,
                    trackHash: true
                });
            } catch (e) {
            }
        });
        var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
            n.parentNode.insertBefore(s, n);
        };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks"); </script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/44359942" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript> <!-- /Yandex.Metrika counter -->
</body>
</html>