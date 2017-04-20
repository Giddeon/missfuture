<!DOCTYPE html>
<html lang="ru">
<!-- Head-->
<head>
    <title>Женский блог о красоте, здоровье, увлечениях и образе жизни для девушек</title>
    <!-- Main Meta information-->
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <meta name="keywords" content="best girl, блог, женский журнал, красота, здоровье, образ жизни, блог для девушек">
    <meta name="description"
          content="Best Girl — женский блог о красоте, здоровье, увлечениях и образе жизни для девушек">
    <meta name="author" content="Best Girl">
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
    <meta name="apple-mobile-web-app-title" content="Женский блог Best Girl">
    <meta name="application-name" content="Женский блог Best Girl">
    <link rel="stylesheet" href="/css/cssmin.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<!-- Header-->
<header class="header">
    <div class="header__inner">
        <div class="header__slogan">
            <a href="index.html" title="Вернуться на главную страницу блога Best Girl">
                <img src="/img/svg/logo.svg"
                     alt="Best Girl: женский блог о красоте, здоровье, увлечениях и образе жизни для девушек">
            </a>
        </div>
        <div class="header__nav">
            <!-- Nav-->
            <nav class="nav">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a class="nav__link" href="index.html">Женский блог</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="page.html">Популярное</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="page-subscribe.html">Подписка</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="page-about.html">О&nbsp;блоге</a>
                    </li>
                </ul>
                <div class="nav__hamburger">
                    <a class="main-hamburger" href="#"><span></span></a>
                </div>
            </nav>
        </div>
        <div class="header__search">
            <form id="head__search">
                <input type="search" placeholder="Поиск по сайту">
            </form>
        </div>
    </div>
</header>
<div class="page page--index">
    <!-- Sidebar-->
    @include('layouts.sidebar');
    <!-- Sidebar-->
    <main class="main" role="main">
        @yield('content')
    </main>
</div>
<!-- Footer-->
<footer class="footer">
    <div class="footer__inner">
        <div class="copyright">2017&nbsp;©&nbsp;Best&nbsp;Girl. <strong>Женский блог</strong><span class="hidden"> о красоте, здоровье, увлечениях</span>.
        </div>
    </div>
</footer>
<script src="/js/scripts.js"></script>
</body>
</html>