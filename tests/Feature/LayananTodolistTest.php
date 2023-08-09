<?php

namespace Tests\Feature;

use App\Services\LayananTodolist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class LayananTodolistTest extends TestCase
{
    private LayananTodolist $layananTodolist;

    protected function setUp(): void
    {
        parent::setUp();
        $this->layananTodolist = $this->app->make(LayananTodolist::class);
    }

    public function testTodolistNotNull()
    {
        self::assertNotNull($this->layananTodolist);
    }

    public function testSaveTodo()
    {
        $this->layananTodolist->saveTodo('1', 'belajar laravel');
        $todolist = Session::get('todolist');

        foreach ($todolist as $value) {
            self::assertEquals("1", $value['id']);
            self::assertEquals('belajar laravel', $value['todo']);
        }
    }

    public function testTodolistEmpty()
    {
        self::assertEquals([], $this->layananTodolist->getTodolist());
    }

    public function testTodolistNotEmpty()
    {
        $expected = [
            [
                'id' => '1',
                'todo' => 'php'
            ],
            [
                'id' => '2',
                'todo' => 'laravel'
            ],
        ];

        $this->layananTodolist->saveTodo('1', 'php');
        $this->layananTodolist->saveTodo('2', 'laravel');
        self::assertEquals($expected, $this->layananTodolist->getTodolist());
    }

    public function testRemoveTodo()
    {
        $this->layananTodolist->saveTodo('1', 'php');
        $this->layananTodolist->saveTodo('2', 'laravel');

        $this->layananTodolist->removeTodolist('3');
        self::assertEquals(2, sizeof($this->layananTodolist->getTodolist()));

        $this->layananTodolist->removeTodolist('1');
        self::assertEquals(1, sizeof($this->layananTodolist->getTodolist()));


    }
}
