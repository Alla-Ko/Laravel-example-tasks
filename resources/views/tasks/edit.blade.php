@extends('welcome')

@section('title', 'Tasks')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4 text-center">Редагувати задачу</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-4">
            <label for="title" class="form-label">Заголовок:</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" class="form-control" required>
        </div>

        <div class="form-group mb-4">
            <label for="description" class="form-label">Опис:</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $task->description }}</textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Оновити</button>
        </div>
    </form>
</div>

@endsection
