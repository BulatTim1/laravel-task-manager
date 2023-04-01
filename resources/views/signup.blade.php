@extends('layout.layout')

@section('title', 'Sign In')

@section('content')
<div class="blackscreen">
<div class="modal">
    <h2>Вход</h2>
    <form action="{{ route('signupPost') }}" method="POST">
        @csrf
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="form-group">
            <label><input type="text" name="username" id="username" class="form-control" placeholder="Имя пользователя" required></label>
        </div>
        <div class="form-group">
            <label><input type="text" name="email" id="email" class="form-control" placeholder="Email" required></label>
        </div>
        <div class="form-group">
            <label><input type="password" name="password" id="password" class="form-control" placeholder="Пароль" required></label>
        </div>
        <div class="form-group">
            <label><input type="password" name="repassword" id="repassword" class="form-control" placeholder="Подтвердите пароль" required></label>
        </div>
        <div class="form-group">

        </div>
        <div class="form-group" style="display: inline-flex">
            <p style="margin-right: 5px;">Согласие на обработку персональных данных: </p><label><input type="checkbox" name="agreement" id="agreement"></label>
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        <a href="{{route('signin')}}">Есть аккаунт? Войдите</a>
    </form>
</div>
</div>
@endsection