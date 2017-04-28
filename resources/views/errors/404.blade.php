@extends('layouts.layout')
@section('title',"Ошибка 404. Страница не найдена")
@section('content')
    <!-- Post-->
    <article class="post">
        <div class="post__text">
            <div class="subscribe__text" style="background:#fff;padding-top:30px">
                <img src="/img/svg/404.svg" alt="Ошибка 404" class="error404" border="0">
                <h1 style="font-family:Arial,Tahoma,sans-serif;font-size:17px;color:#666;font-weight:normal !important">
                    Страница не найдена</h1>
                <p>Такой страницы нет на сайте женского блога. Вероятно, ссылка, по которой вы сюда попали, устарела,
                    или вы ошиблись, когда набирали адрес.</p>
                <p style="line-height:2em"><a href="/" class="goBack" title="Вернуться на главную страницу">Вернуться
                        на главную страницу</a></p>
                <p style="line-height:2em"><a href="/search" class="goBack" title="Искать в поиске по блогу">Искать
                        в поиске по блогу</a></p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </div>
    </article>
@endsection