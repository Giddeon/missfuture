@extends('layouts.layout')

@section('title')
    Женский блог о красоте, здоровье, увлечениях и образе жизни для девушек
@endsection

@section('content')

    <!-- Subscribe-->
    <section class="subscribe">
        <h1 class="subscribe__title">Подписка на блог</h1>
        <div class="subscribe__text">Если вы заинтересовались блогом, дело за малым. Осталось оформить подписку и быть в&nbsp;курсе
            новых записей. Блог&nbsp;обновляется достаточно часто. Стоит заполнить поля формы подписки и скоро вы&nbsp;сможете
            получать обновления блога.
        </div>
        <form class="subscribe__form" action="/subscribe/create" method="post">
            {{csrf_field()}}
            <label class="subscribe__label">
                <input class="subscribe__input" type="text" name="name" placeholder="Укажите ваше полное имя"/>
                <div class="subscribe__error">Укажите ваше имя на русском языке</div>
            </label>
            <!--<label class="subscribe__label">
              <input class="subscribe__input" type="text" name="Фамилия" placeholder="Фамилия" />
              <div class="subscribe__error">Укажите вашу фамилию на русском языке</div>
            </label>-->
            <label class="subscribe__label subscribe__label--email">
                <input class="subscribe__input" type="email" name="email" placeholder="Электронная почта"/>
            </label>
            <!-- Tags-->
            <fieldset class="subscribe-interests">
                <h2 class="subscribe-interests__title">Укажите интересующие темы</h2>
                <ul class="subscribe-interests__list">
                    <li class="subscribe-interests__item">
                        <input class="subscribe-interests__input" type="checkbox" name="subscribe[]" value="1" id="subscribe1"/>
                        <label class="subscribe-interests__label" for="subscribe1">Искусство и творчество<br>
                            <div>Все о творческой жизни и произведениях классического и современного искусства.<br>
                                <em>Несколько записей в месяц.</em></div>
                        </label>
                    </li>
                    <li class="subscribe-interests__item">
                        <input class="subscribe-interests__input" type="checkbox" name="subscribe[]" value="2" id="subscribe2"/>
                        <label class="subscribe-interests__label" for="subscribe2">Семья и отношения<br>
                            <div>Записи из опыта семейной жизни, про отношения между близкими людьми.<br>
                                <em>Несколько записей в месяц.</em></div>
                        </label>
                    </li>
                    <li class="subscribe-interests__item">
                        <input class="subscribe-interests__input" type="checkbox" name="subscribe[]" value="3" id="subscribe3"/>
                        <label class="subscribe-interests__label" for="subscribe3">Красота и здоровье<br>
                            <div>Тонкости и секреты женской красоты: здоровье, диета, визаж, макияж и многое другое.<br>
                                <em>Несколько записей в месяц.</em></div>
                        </label>
                    </li>
                    <li class="subscribe-interests__item">
                        <input class="subscribe-interests__input" type="checkbox" name="subscribe[]" value="4" id="subscribe4"/>
                        <label class="subscribe-interests__label" for="subscribe4">Религия и философия<br>
                            <div>Примечательные записи о культурных особенностях разных стран, групп людей и
                                философии.<br>
                                <em>Записи — иногда.</em></div>
                        </label>
                    </li>
                    <li class="subscribe-interests__item">
                        <input class="subscribe-interests__input" type="checkbox" name="subscribe[]" value="5" id="subscribe5"/>
                        <label class="subscribe-interests__label" for="subscribe5">Карьера и развитие<br>
                            <div>Истории и мысли о бизнесе и домохозяйстве, изучении языков, кулинарии, конечно, о
                                личностном росте и психологии.<br>
                                <em>Несколько записей в месяц.</em></div>
                        </label>
                        </label>
                    </li>
                    <li class="subscribe-interests__item">
                        <input class="subscribe-interests__input" type="checkbox" name="subscribe[]" value="6" id="subscribe6"/>
                        <label class="subscribe-interests__label" for="subscribe6">Мода и стиль<br>
                            <div>Интересные записи о модной одежде и обуви, тренды, рекомендации о комфорте, покупки и
                                технологии в производстве одежды и аксессуаров.<br>
                                <em>Несколько записей в месяц.</em></div>
                        </label>
                    </li>
                    <li class="subscribe-interests__item">
                        <input class="subscribe-interests__input" type="checkbox" name="subscribe[]" value="7" id="subscribe7"/>
                        <label class="subscribe-interests__label" for="subscribe7">Спорт и отдых<br>
                            <div>Актуальные записи об активном образе жизни, спорте и просто отдыхе и досуге.<br>
                                <em>Несколько записей в месяц.</em></div>
                        </label>
                    </li>
                </ul>
            </fieldset>
            <div class="subscribe__btn">
                <button class="subscription" type="submit">Отправить заявку
                </button>
            </div>
            <div id="modalSubcribe" @if(!request("s")) style="display:none;" @endif>
                <div class="overlay"></div>
                <div class="visible">
                    <h2>Благодарим за подписку</h2>
                    <div class="content">
                        <img src="img/svg/subscribe.svg" class="subscribe" border="0"
                             alt="Подписка на женский блог Best Girl">
                        <p>{UserName}, ваша заявка на подписку принята в&nbsp;обработку.</p>
                        <p>Уже скоро вы сможете получить обновление блога на&nbsp;электронную почту.</p>
                        <p>Мы&nbsp;обязательно учтём ваши пожелания по&nbsp;интересам.</p>
                        <p>Читайте блог — это интересно.</p>
                    </div>
                    <button class="btn" type="button" onClick="getElementById('modalSubcribe').style.display='none';">
                        Вернуться&nbsp;к&nbsp;блогу
                    </button>
                </div>
            </div>
        </form>
    </section>
    <script type="application/javascript">
        $(document).ready(function () {
            @foreach($subscriptions as $subscription)
                $("#subscribe{{$subscription->id}}").attr("checked", "checked");
            @endforeach
        });
    </script>
@endsection