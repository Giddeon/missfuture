@extends('layouts.layout')

@section('title','О блоге для девушек. Miss Future — женский блог о красоте, здоровье, увлечениях и образе жизни.')


@section('content')
    <!-- Post-->
    <article class="post">
        <div class="post__text">
            <div class="subscribe__text" style="background:#fff;">
                <form action="{{ route('login') }}" method="POST" class="login__form">
                    {{csrf_field()}}
                    <div class="login__form-header">Авторизация для подписчиков блога</div>
                    <div class="login__form-text">
                        <p>Авторизуйтесь, пожалуйста, это позволит настроить подписку.</p>
                        <label class="login__form-label">
                            <input class="login__form-input" type="email" name="email"
                                   title="Введите адрес ваш эл. почты" placeholder="Введите адрес ваш эл. почты">
                        </label>
                        <label class="login__form-label">
                            <input class="login__form-input" type="password" name="password" title="Введите пароль"
                                   placeholder="Введите пароль">
                        </label>
                        <div class="login__form-submit">
                            <button class="btn">Войти в аккаунт</button>
                            <div class="login__form-link">
                                {{--<a href="#">Я забыл (-а) пароль, что делать?</a>--}}
                            </div>
                        </div>
                        <div class="login__social-web">
                            <div class="noticeText">Авторизация через соц.сети:</div>
                            <div class="icons">
                                {{--<a href="#" title="Авторизация через аккаунт Вконтакте" class="vkontakte"><img--}}
                                            {{--src="/img/svg/vkontakte.svg" alt="Авторизация через аккаунт Вконтакте"--}}
                                            {{--border="0" width="24px" height="24px"></a>--}}
                                {{--<a href="#" title="Авторизация через аккаунт Facebook" class="facebook"><img--}}
                                            {{--src="/img/svg/facebook.svg" alt="Авторизация через аккаунт Facebook"--}}
                                            {{--border="0" width="24px" height="24px"></a>--}}
                                {{--<a href="#" title="Авторизация через аккаунт Mail.ru" class="mailru"><img--}}
                                            {{--src="/img/svg/mailru.svg" alt="Авторизация через аккаунт Mail.ru" border="0"--}}
                                            {{--width="24px" height="24px"></a>--}}


                                <div class="text-center margin-bottom-20" id="uLogin"
                                     data-ulogin="display=panel;theme=flat;fields=first_name,last_name,email,nickname,photo,country;
                             providers=facebook,vkontakte,mailru;
                             redirect_uri={{ urlencode('https://' . $_SERVER['HTTP_HOST']) }}/ulogin;mobilebuttons=0;">
                                </div>

                                    <script src="//ulogin.ru/js/ulogin.js"></script>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>
@endsection