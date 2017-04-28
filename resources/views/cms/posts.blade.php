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

        {{ $posts->links() }}
    </div>
@endsection