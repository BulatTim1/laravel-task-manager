@extends('layout.layout')

@section('title', 'Create new task')

@section('content')
    <div class="blackscreen">
        <div class="modal">
            <div class="close"><a href="{{route('index')}}">X</a></div>
            <h2>Добавление записи</h2>
            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <div class="form-group">
                    <label><input type="text" name="title" id="title" class="form-control"
                            placeholder="Заголовок" required></label>
                </div>
                <div class="form-group">
                    <label><input type="text" name="tag" id="tag" class="form-control" placeholder="Задайте тему"
                            required></label>
                </div>
                <div class="form-group">
                    <label><input type="date" name="deadline" id="deadline" class="form-control"
                            placeholder="Дата" required></label>
                </div>
                <button type="submit" class="btn btn-primary">Добавить задачу</button>
            </form>
        </div>
    </div>
@endsection
