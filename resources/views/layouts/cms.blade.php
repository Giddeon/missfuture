<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>BestGirl admin</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="/css/cms_style.css" rel="stylesheet">
</head>
<body>

<div class="header clearfix">
    <div class="wrapper">
        <div class="logo"><a href="#"><img src="/img/bestgirl.png" alt="" width="101" height="20"></a></div>
    </div>
</div>
<div class="wrapper">
    <div class="main clearfix">
        <div class="side">
            <div class="side-header">Content Management System</div>
            <ul class="side-menu">
                <li><a href="#" class="side-menu-link">Основные характеристики</a></li>
                <li><a href="#" class="side-menu-link">Настройки профиля</a></li>
                <li>
                    <a href="#" class="side-menu-link">Пользователи</a>
                    <ul class="side-submenu">
                        <li><a href="#" class="side-submenu-link">Участницы</a></li>
                        <li><a href="#" class="side-submenu-link active">Зрители</a></li>
                        <li><a href="#" class="side-submenu-link">Победители</a></li>
                        <li><a href="#" class="side-submenu-link">Интересы</a></li>
                        <li><a href="#" class="side-submenu-link">Черный список</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="side-menu-link">Голосование</a>
                    <ul class="side-submenu">
                        <li><a href="#" class="side-submenu-link">Рейтинг</a></li>
                        <li><a href="#" class="side-submenu-link">Модерация</a></li>
                        <li><a href="#" class="side-submenu-link">Выгрузить отчет</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="side-menu-link">Платежи</a>
                    <ul class="side-submenu">
                        <li><a href="#" class="side-submenu-link">История платежей</a></li>
                        <li><a href="#" class="side-submenu-link">Банковские карты</a></li>
                        <li><a href="#" class="side-submenu-link">Выгрузить отчет</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="side-menu-link">Обратная связь</a>
                    <ul class="side-submenu">
                        <li><a href="#" class="side-submenu-link">Написать сообщение</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="side-menu-link">Правила ресурса</a>
                    <ul class="side-submenu">
                        <li><a href="#" class="side-submenu-link">Перечень правил</a></li>
                        <li><a href="#" class="side-submenu-link">Политика безопасности</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="content-header">
                <h1>@yield("title")</h1>
                <time>Сегодня {{\Laravelrus\LocalizedCarbon\LocalizedCarbon::now()->formatLocalized("%a")}}
                    , {{date("d.m.Y")}}</time>
            </div>

            <div class="content-text">
                @if (\Illuminate\Support\Facades\Auth::user())
                    @include("cms.".\Illuminate\Support\Facades\Auth::user()->role.".top_menu")
                @endif
                @yield('content')

            </div>
        </div>
    </div>

    <div class="footer">Miss Future © Конкурс талантов для девушек. Конкурсный сервис женских талантов.</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/cms.js"></script>
@yield("scripts")
</body>
</html>