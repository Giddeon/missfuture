@extends("layouts.cms")

@section("content")
    <div class="content-text">
        <div class="text">
            Выберите ваш аккаунт из списка и введите пароль для авторизации:
            <form method="post" action="{{ route('login') }}" class="auth js-auth">
                {{csrf_field()}}

                @foreach($users as $user)
                    <label class="auth-user">
                        <input type="radio" name="email" value="{{$user->email}}">
                        <div class="auth-user-info">
                            <span class="auth-user-avatar"><img src="{{$user->picture}}" alt="" width="37"
                                                                height="37"></span>
                            <span class="auth-user-name">{{$user->name}}</span>
                            <span class="auth-user-title">{{$user->role}}</span>
                        </div>
                    </label>
                @endforeach
                <div class="auth-password clearfix">
                    <input type="password" name="password" placeholder="Введите ваш пароль">
                    <button class="btn">Войти</button>
                </div>
            </form>
        </div>
    </div>
@endsection