<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PenggunaControllerTest extends TestCase
{
    public function testHalamanLogin()
    {
        $response = $this->get('/masuk');
        $response->assertSeeText('Login');
    }

    public function testLoginBerhasil()
    {
        $this->post('/masuk', [
            'user' => 'richo',
            'password' => '123'
        ])->assertRedirect('/')->assertSessionHas('user', 'richo');
    }

    public function testLoginValidasiEror()
    {
        $this->post('/masuk', [])->assertSeeText('User dan Password wajib diisi');
    }

    public function testLoginFail()
    {
        $this->post('/masuk', [
            'user' => '1234',
            'password' => '1234'
        ])->assertSeeText('User atau Password salah');
    }
}
