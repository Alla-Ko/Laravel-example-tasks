@extends('welcome')

@section('title', 'Tasks')

@section('content')
<div class="container mt-5">
	<h1 class="mb-4 text-center">Створити задачу</h1>

	<form action="{{ route('tasks.store') }}" method="POST">
		@csrf
		<div class="form-group mb-4">
			<label class="form-label" for="title">Заголовок:</label>
			<input class="form-control" type="text" name="title" id="title" required>
		</div>
		<div class="form-group mb-4">
			<label class="form-label" for="description">Опис:</label>
			<textarea class="form-control" name="description" id="description" required></textarea>
			<br>
		</div>
		<button class="btn btn-primary btn-lg" type="submit">Створити</button>
	</form>
</div>
@endsection