<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
	public function index()
	{
		$tasks = Task::all();
		return view('tasks.index', ['tasks' => $tasks]);
	}

	public function create()
	{
		return view('tasks.create');
	}

	public function store(Request $request)
	{
		$validatedData = $request->validate([
			'title' => 'required|max:255',
			'description' => 'required',
		]);

		$task = new Task();
		$task->title =  $validatedData['title'];
		$task->description =  $validatedData['description'];
		$task->save();

		return redirect()->route('tasks.index')->with('success', 'Задача успішно створена.');
	}

	public function show($id)
	{
		$task = Task::findOrFail($id);
		return view('tasks.show', ['task' => $task]);
	}

	public function edit($id)
	{
		$task = Task::findOrFail($id);
		return view('tasks.edit', ['task' => $task]);
	}

	public function update(Request $request, $id)
	{
		$validatedData = $request->validate([
			'title' => 'required|max:255',
			'description' => 'required',
		]);

		$task = Task::findOrFail($id);
		$task->title =  $validatedData['title'];
		$task->description =  $validatedData['description'];
		$task->save();

		return redirect()->route('tasks.index')->with('success', 'Задача успішно оновлена.');
	}

	public function destroy($id)
	{
		$task = Task::findOrFail($id);
		$task->delete();

		return redirect()->route('tasks.index')->with('success', 'Задача успішно видалена.');
	}
}
