@extends('layouts.layout')

@section('title','О блоге для девушек. Miss Future — женский блог о красоте, здоровье, увлечениях и образе жизни.')


@section('content')
    <article class="post page--sample">
        <div class="post__img">
            <img src="img/promo.jpg" alt="О женском блоге Best Girl">
        </div>
        <div class="post__text">
            <div class="subscribe__text" style="background:#fff;padding-top:30px">
                <h1 align="center">О женском блоге</h1>
                <p>Под названием Miss Future представлен активно обновляемый женский блог для взрослой аудитории. Все
                    записи публикуются на сайте блога по адресу: <a href="https://missfuture.ru"
                                                                    title="Женский блог Miss Future" class="context">https://missfuture.ru</a>.
                </p>
                <h2 id="aboutpage">Удобный блог для чтения в&nbsp;дороге или в&nbsp;кафе</h2>
                <p>Мы стараемся делать ежедневный блог для женщин — удобный и приятный для чтения. Miss Future
                    раскрывает интересные факты, мысли и рекомендации.</p>
                <p>Мы работаем по блогу Miss Future, чтобы вам было удобно читать не только на ноутбуке, но и с&nbsp;планшета
                    и смартфона (по&nbsp;дороге домой или в кафе). Обновление блога происходит по мере фактической
                    возможности каждую неделю.</p>
                <p>Наша забота о читательницах выражается в том, что данный блог не содержит рекламы брендов, банков или
                    косметических салонов.</p>
                <p><img src="/img/woman-read-blog-miss-future.jpg" alt="Интересный блог для женской аудитории"
                        align="center" width="100%" height="100%" border="0" style="margin: 10px 0 -16px 0"></p>
                <h2 id="aboutpage">Интересы и темы блога</h2>
                <p>Темы записей блога — это актуальные интересы из реальной жизни активных девушек и зрелых женщин. В&nbsp;целом
                    блог предназначен для женской аудитории в возрасте от 18 лет: некоторые материалы могут содержать
                    информацию исключительно для взрослых людей.</p>
                <p>Представленные интересы автор позиционирует по следующим темам:</p>
                <ul>
                    <li><b>искусство и творческая культурная жизнь</b> — записи об актерском мастерстве, живописи,
                        cовременном искусстве, фото- и видеосъёмке, кино и театре, музыке, художественной фотографии,
                        экскурсиях по музеям,
                    </li>
                    <li style="padding-top:10px"><b>семья и отношения</b> — записи о дружбе, уходе за детьми, общении и,
                        конечно, о домашних животных,
                    </li>
                    <li style="padding-top:10px"><b>красота и здоровье</b> — записи о женское здоровье, диете, визаже,
                        макияже и солярии,
                    </li>
                    <li style="padding-top:10px"><b>религия и философия</b> — записи о культурных традициях и ценностях,
                    </li>
                    <li style="padding-top:10px"><b>карьера и развитие</b> — записи о бизнесе, личностном росте,
                        домохозяйстве, кулинарии, психологии, иностранных языках,
                    </li>
                    <li style="padding-top:10px"><b>мода и стиль</b> — записи об одежде и обуви, модных трендах,
                        комфорте, покупках и технологиях производства одежды и обуви,
                    </li>
                    <li style="padding-top:10px"><b>спорт и отдых</b> — записи о фитнесе, танцах, плавании, отдыхе с
                        друзьями, чтении книг, настольных играх, вязании, комнатных растениях, оригами.
                    </li>
                </ul>
                <hr size="1" color="#ececec" width="100%" style="margin:20px 0 20px 0">
                <img src="img/girl-icon.png" alt="Автор женского блога Miss Future" align="right" width="100px"
                     height="100px" border="0">
                <h2 style="font-family:Arial;font-size: 17px;color:#ba2544">Автор женского блога Miss Future</h2>
                <p>Автор блога — Александра Полякова.<br>Связаться с автором можно по электронной почте: <a
                            href="mailto:author@missfuture.ru" title="Написать автору женского блога Miss Future"
                            class="context">author@missfuture.su</a>.<br>
                    <small><span style="color:#999">Ответ на ваш запрос поступит по мере возможности.</span></small>
                </p>
                <hr size="1" color="#ececec" width="100%" style="margin:20px 0 20px 0">
                <p><img src="img/illustration.jpg"
                        alt="Женский блог по интересам: удобный для чтения в дороге или в кафе" align="center"
                        width="100%" height="100%" border="0" style="margin:0 0 -20px 0"></p>
                <div class="infoBlock" style="background:#6a2f39; color:#fcfcfc; border-top:1px solid #975964">
                    <h3 style="color:#fff">Возможность пригласить подругу в&nbsp;блог</h3>
                    <p>Если вы желаете поделить ссылкой на блог, воспользуйтесь сервисом «Пригласить подругу в&nbsp;блог»
                        (см. в левой колонке сайта при просмотре на компьютере или в виде ссылке на мобильном экране
                        смартфона или планшета).</p>
                </div>
                <div class="infoBlock">
                    <h2>Поделиться ссылкой для&nbsp;чтения блога</h2>
                    <p>Вы можете быстро скопировать ссылку и поделиться её с подругой воспользовавшись кодом ссылки,
                        представленным ниже.</p>
                    <div class="copyTool">
                        <div class="copyURL"><span>Ссылка</span><b id="siteURL">missfuture.ru</b></div>
                        <div class="copyBtn">
                            <button class="btn copyPaste" title="Копировать ссылку на сайт женского блога Miss Future"
                                    data-clipboard-target="#siteURL"
                                    style="font-weight:normal">Копировать
                            </button>
                        </div>
                        <script src='/js/clipboard.min.js'></script>
                        <script>var clipboard = new Clipboard('.copyPaste');</script>
                    </div>
                </div>
                <div class="infoBlock">
                    <h2>Подписка на обновление блога Miss Future</h2>
                    <p>Если вы желаете быть в курсе обновлений блога Miss Future, то рекомендуем вам заполнить форму
                        подписки для своевременного получения писем обновлений записей блога.</p>
                    <p>
                        <button class="btn subscribeBtn">Перейти&nbsp;к&nbsp;подписке</button>
                    </p>
                </div>
                <p style="line-height:1.75em;padding-bottom:20px">Желаем вам приятного чтения!<br>
                    <em><a href="/" title="Вернуться на главную страницу блога Miss Future" class="context">Miss
                            Future</a>.</em></p>
            </div>
        </div>
    </article>
@endsection