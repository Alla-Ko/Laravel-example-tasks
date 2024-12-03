@extends('welcome')

@section('title', 'Tasks')

@section('content')
<!-- Кнопка для створення нової задачі -->
<a href="{{ route('tasks.create') }}" class="btn btn-success m-3">Add New Task</a>
<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Title</th>
				<th scope="col">Description</th>
				<th scope="col">Actions</th> <!-- Додано стовпець для кнопок -->
			</tr>
		</thead>
		<tbody>
			@foreach ($tasks as $task)
			<tr>
				<td>{{ $task->id }}</td>
				<td>{{ $task->title }}</td>
				<td>{{ $task->description }}</td>
				<td>
					<!-- Кнопки для редагування та видалення -->
					<a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View</a>
					<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>

					<form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script>
	function confirmDelete() {
		return confirm('Ви впевнені, що хочете видалити цю задачу?');
	}
</script>
@endsection