@extends("layouts.cms")
@section('title', 'Модерация постов')
@section("content")
    <div class="text-block create_post">
        <form action="/blog_posts" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <label for="">Название (H1) </label><input type="text" placeholder="Название" name="name" required><br><br>
            <label for="">URL (ЧПУ) </label><input type="text" placeholder="ЧПУ" name="code" required><br><br>
            <label for="" style="width: 143px;">Опубликовать сейчас </label> <input type="checkbox" class="publish_now"> <input type="text" placeholder="Дата публикации" name="date"><br><br>
            <label for="">Хештеги </label><input type="text" placeholder="Хештеги (через запятую)" name="tags" required><br><br>
            <label for="">TITLE <span class="small_text">(70 символов)</span> </label><input type="text" placeholder="Title" name="title" required><br><br>
            <label for="" style="position: relative; top: -20px;">Description </label>
            <textarea rows="2" style="width: 500px;" placeholder="Description" name="description" required></textarea><br><br>
            <label for="">Категория </label><select name="category" id="" required>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select><br><br>
            <label for="">Изображение <span class="small_text"><br>(769x305px)</span> </label><input type="file" placeholder="" name="picture"><br><br><br>
            <label for="" style="position: relative; top: -20px;"><b>Анонс</b> <br><span class="small_text">(макс. 250 символов)</span></label>
            <textarea maxlength="250" rows="5" class="" style="width: 818px;" name="preview_text"></textarea><br><br>
            <label for=""><b>Текст статьи</b></label><br><br>
			<textarea class="editor" name="text"></textarea>
            <div class="form-buttons">
                <button class="btn">Сохранить изменения</button>
            </div>
        </form>
    </div>
@endsection
@section("scripts")
    <script src="/js/tinymce/tinymce.min.js"></script>
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

        tinymce.init({
            selector: '.editor',
            relative_urls: false,
            menubar: false,
            content_css: '/css/editor.css',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking',
                'save table contextmenu directionality template paste textcolor'
            ],
            toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | table | bullist numlist | link image media | codetag codeblocktag | removeformat charmap code ',
            statusbar: false,
            language: 'ru',
            element_format: 'html',
            extended_valid_elements: 'span[class]',
            valid_children: '+a[span|b|i|u|sup|sub|img]'
        });
    </script>
@endsection