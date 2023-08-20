<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|min:5|max:500'
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0

        ]);

        // $request->session()->flash('alert-success', 'Todo created successfully');

        return to_route('todos.index');
    }

    public function edit($id)
    {
        $editInfo = Todo::findOrFail($id);

        return view('todos.edit', compact('editInfo'));
    }

    public function update(Request $request)
    {
        $todo_id = $request->todo_id;

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|min:5|max:500'
        ]);

        Todo::findOrFail($todo_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed
        ]);

        return redirect()->route('todos.index')->with('message', 'Todo Updatetd!');
    }

    public function delete($id)
    {
        Todo::findOrFail($id)->delete();

        return redirect()->route('todos.index')->with('message', 'Todo Deleted!');
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        return view('todos.show', ['todo' => $todo]);
    }
}
