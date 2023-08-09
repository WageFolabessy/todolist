<?php

namespace App\Services\Impl;
use App\Services\LayananTodolist;
use Illuminate\Support\Facades\Session;

class LayananTodolistImpl implements LayananTodolist
{
    public function saveTodo(string $id, string $todo): void
    {
        if(!Session::exists('todolist')){
            Session::put('todolist', []);
        }
        Session::push('todolist', [
            'id' => $id,
            'todo' => $todo,
        ]);
    }

    public function getTodolist(): array
    {
        return Session::get('todolist', []);
    }

    public function removeTodolist(string $id): void
    {
        $todolist = Session::get('todolist');

        foreach ($todolist as $index => $value) {
            if($value['id'] == $id)
            {
                unset($todolist[$index]);
                break;
            }
        }

        Session::put('todolist', $todolist);
    }

}