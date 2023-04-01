@extends('layout.layout')

@section('title', 'Home Page')

@section('header')
    @extends('components.Header')
@section('header-btn')

    <a class="header-btn btn" href={{ route('task.create') }}>
        Создать задачу
    </a>
@endsection
@endsection
@section('content')
<div class="container">
    <div class="cards">
        @foreach ($tasks as $task)
            <div class="card">
                <div class="card-box"></div>
                <a class="title" href="{{ route('task.show', $task) }}">{{ $task->title }}</a>
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
                <div class="toolbox">
                    <div class="tag">
                        <p>{{ $task->tag }}</p>
                    </div>
                    <div class="card-actions">
                        <a href="{{ route('task.edit', $task) }}" class="card-edit"></a>
                        <a href="{{ route('task.edit', $task) }}" class="card-delete"></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
