@extends('welcome')

@section('title', 'Tasks')

@section('content')

<div class="container mt-5">
	<h1 class="mb-4">{{ $task->title }}</h1>
	<p class="lead">{{ $task->description }}</p>

	<div class="d-flex">
		<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm me-2">Редагувати</a>

		<form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-danger btn-sm">Видалити</button>
		</form>
	</div>
</div>

@endsection