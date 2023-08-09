<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodolist()
    {
        $this->withSession([
            'user' => 'richo',
            'todolist' => [
                [
                    'id' => '1',
                    'todo' => 'php'
                ]
            ]
        ])->get('/todolist')->assertSeeText('1')->assertSeeText('php');
    }
}
