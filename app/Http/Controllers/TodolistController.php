<?php

namespace App\Http\Controllers;

use App\Services\LayananTodolist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TodolistController extends Controller
{

    private LayananTodolist $layananTodolist;

    public function __construct(LayananTodolist $layananTodolist)
    {
        $this->layananTodolist = $layananTodolist;
    }
    
    public function todoList(Request $request): View
    {
        $todolist = $this->layananTodolist->getTodolist();
        return view('todo.todo', [
            'title' => 'Todolist',
            'todolist' => $todolist
        ]);
    }

    public function addTodo(Request $request): view | RedirectResponse
    {
        $todo = $request->input('todo');
        if(empty($todo))
        {
            $todolist = $this->layananTodolist->getTodolist();
            return view('todo.todo', [
                'title' => 'Todolist',
                'todolist' => $todolist,
                'error' => 'Todo harus diisi',
            ]);
        }

        $this->layananTodolist->saveTodo(uniqid(), $todo);
        return redirect('/todolist');
    }

    public function removeTodo(Request $request, string $id): View
    {
        $this->layananTodolist->removeTodolist($id);
        $todolist = $this->layananTodolist->getTodolist();
        return view('todo.todo', [
            'title' => 'Todolist',
            'todolist' => $todolist,
            'berhasil' => 'Todo berhasil dihapus'
        ]);
    }
}
