<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testBelumLogin()
    {
        $this->get('/')->assertRedirect('/masuk');
    }

    public function testSudahLogin()
    {
        $this->withSession(['user' => 'richo'])->get('/')->assertRedirect('todolist');
    }
}
