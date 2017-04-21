<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends("layouts.cms")
@section('title', 'Модерация постов')
@section("content")
    <div class="text-block create_post">
        <form action="/{{$url}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <label for="">Название (H1) </label><input type="text" placeholder="Название" value="{{$post->name}}" name="name" required><br><br>
            <label for="">URL (ЧПУ) </label><input type="text" placeholder="ЧПУ" value="{{$post->code}}" name="code" required><br><br>
            <label for="" style="width: 150px;">Опубликовать сейчас </label> <input type="checkbox" class="publish_now"> <input type="text" value="{{$post->date}}" placeholder="Дата публикации" name="date"><br><br>
            <label for="">Хештеги </label><input type="text" placeholder="Хештеги (через запятую)" name="tags" value="{{$post->tags}}" required><br><br>
            <label for="">TITLE <span class="small_text">(70 символов)</span> </label><input type="text" value="{{$post->title}}" placeholder="Title" name="title" required><br><br>
            <label for="" style="position: relative; top: -20px;">Description </label>
            <textarea rows="2" style="width: 500px;" placeholder="Description" name="description" required>{{$post->description}}</textarea><br><br>
            <label for="">Категория </label><select name="category" id="" required>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($post->blog_posts_categories_id==$category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select><br><br>
            <label for="">Изображение <span class="small_text"><br>(769x305px)</span> </label><input type="file" placeholder="" name="picture"><br><br><br>
            <label for="" style="position: relative; top: -20px;"><b>Анонс</b> <br><span class="small_text">(макс. 250 символов)</span></label>
            <textarea maxlength="250" rows="5" class="" style="width: 795px;" name="preview_text">{{$post->preview_text}}</textarea><br><br>
            <label for=""><b>Текст статьи</b></label><br><br>
            <div id="summernote"></div>
			<textarea class="editor" style="display: none" name="text">{{$post->text}}</textarea>
            <div class="form-buttons">
                <button class="btn"  onclick="$('.editor').val($('#summernote').summernote('code'))">Сохранить изменения</button>
            </div>
        </form>
    </div>
@endsection
@section("scripts")
    {{--<script src="/js/tinymce/tinymce.min.js"></script>--}}
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script type="application/javascript" src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>

    <script>

        $(function () {

        });
    </script>
    <script>
        $(document).ready(function () {
            $(".publish_now").change(function () {
                if ($(this).is(":checked")) {
                    $(this).next().attr("disabled","disabled");
                } else {
                    $(this).next().removeAttr("disabled");
                }
            });
        });

        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
        });

        $('#summernote').summernote('code', '{!! preg_replace("/('|\"|\r?\n)/", '',html_entity_decode($post->text)) !!}');

//        tinymce.init({
//            selector: '.editor',
//            relative_urls: false,
//            menubar: false,
//            content_css: '/css/editor.css',
//            plugins: [
//                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
//                'searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking',
//                'save table contextmenu directionality template paste textcolor'
//            ],
//            toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | table | bullist numlist | link image media | codetag codeblocktag | removeformat charmap code ',
//            statusbar: false,
//            language: 'ru',
//            element_format: 'html',
//            extended_valid_elements: 'span[class]',
//            valid_children: '+a[span|b|i|u|sup|sub|img]'
//        });
    </script>
@endsection