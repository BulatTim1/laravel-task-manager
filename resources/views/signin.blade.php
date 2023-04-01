@extends('layout.layout')

@section('title', 'Sign In')

@section('content')
    <div class="blackscreen">
        <div class="modal">
            <h2>Вход</h2>
            <form action="{{ route('signinPost') }}" method="POST">
                @csrf
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <div class="form-group">
                    <label><input type="text" name="username" id="username" class="form-control"
                            placeholder="Имя пользователя" required></label>
                </div>
                <div class="form-group">
                    <label><input type="password" name="password" id="password" class="form-control" placeholder="Пароль"
                            required></label>
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
                <a href="{{route('signup')}}">Нет аккаунта? Зарегистрируйтесь</a>
            </form>
        </div>
    </div>
@endsection
