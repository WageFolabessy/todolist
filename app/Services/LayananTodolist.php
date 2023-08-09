<?php

namespace App\Services;

interface LayananTodolist
{
    public function saveTodo(string $id, string $todo): void;

    public function getTodolist(): array;

    public function removeTodolist(string $id): void;

}