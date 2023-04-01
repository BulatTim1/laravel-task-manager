@extends('layout.layout')

@section('title', 'Task')

@section('header')
    @extends('components.Header')
@section('header-btn')

    <a class="header-btn btn" href={{ route('index') }}>
        Назад к списку
    </a>
@endsection
@endsection
@section('content')
<div class="container">
  <div class="task">
    <div class="info">
        <div class="info-comments">
            <p>{{ count($task->comments()) }}</p>
        </div>
        @if ($task->deadline)
            <div class="info-deadline">
                <p>{{ $task['deadline']->format('d.m.Y') }}</p>
            </div>
        @endif
    </div>
    <div class="title">{{ $task->title }}</div>
    <div class="tag">
        <p>{{ $task->tag }}</p>
    </div>
  </div>

  <div class="comments">
    <h2>Комментарии</h2>
    @foreach ($task->comments() as $comment)
        <div class="comment">
          <div class="icon"><img src="" alt=""></div>
          <div class="comment-body">
            <div class="comment-author">{{$comment->user()->username}}</div>
            <div class="comment-content">{{$comment->text}}</div>
          </div>
        </div>
    @endforeach
    <div class="add-comment">
      <h2>Добавить комментарий</h2>
      <form action="{{route('comment.create')}}" method="post">
        @csrf
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <input type="hidden" name="task_id" id="task_id" value="{{$task->id}}" hidden>
        <div class="form-group">
            <label><input type="text" name="text" id="text" class="form-control" placeholder="Добавьте комментарий"
                    required></label>
        </div>
        <button type="submit" class="btn btn-primary">Добавить комментарий</button>
      </form>
    </div>
  </div>
</div>
@endsection
