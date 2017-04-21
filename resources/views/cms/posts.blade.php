@extends("layouts.cms")
@section('title', 'Модерация постов')
@section("content")


    <table class="tbl">
        <tr class="tbl-head">
            <td><a href="#">Название</a></td>
            <td><a href="#">Категория</a></td>
            <td class="center"><a href="#">Дата</a></td>
            <td class="center"><a href="#">Дата создания</a></td>
            <td class="center"><a href="#">Кем создано</a></td>
            <td class="center"><a href="#"></a></td>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td class="tbl-cell-name"><a href="/cms/posts/{{$post->code}}">{{$post->name}}</a></td>
                <td><a href="/cms/posts/{{$post->code}}">{{$post->category->name}}</a></td>
                <td class="center"><a href="/cms/posts/{{$post->code}}">{{$post->date}}</a></td>
                <td class="tbl-cell-status center">{{$post->created_at}}</td>
                <td class="center">{{$post->user->name}}</td>
                <td class="center"><a href="/posts/delete/{{$post->code}}">Удалить</a></td>
            </tr>
        @endforeach
    </table>

    <div class="pager">
        <a href="#" class="pager-item pager-first">
            <svg height="24" viewBox="0 0 48 48" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M30.83 32.67l-9.17-9.17 9.17-9.17-2.83-2.83-12 12 12 12z"/>
            </svg>
        </a>
        <a href="#" class="pager-item active">1</a>
        <a href="#" class="pager-item">2</a>
        <a href="#" class="pager-item">3</a>
        <a href="#" class="pager-item">4</a>
        <span class="pager-item">...</span>
        <a href="#" class="pager-item">7</a>
        <a href="#" class="pager-item pager-last">
            <svg height="24" viewBox="0 0 48 48" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.17 32.92l9.17-9.17-9.17-9.17 2.83-2.83 12 12-12 12z"/>
            </svg>
        </a>
    </div>
@endsection