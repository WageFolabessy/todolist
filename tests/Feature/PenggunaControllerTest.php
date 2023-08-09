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

    public function testHanyaYangSudahLogin()
    {
        $this->withSession(['user' => 'richo'])->get('/masuk')->assertRedirect('/');
    }
    

    public function testLoginBerhasil()
    {
        $this->post('/masuk', [
            'user' => 'richo',
            'password' => '123'
        ])->assertRedirect('/')->assertSessionHas('user', 'richo');
    }
    public function testSudahLoginBerhasil()
    {
        $this->withSession(['user' => 'richo'])->post('/masuk', [
            'user' => 'richo',
            'password' => '123'
        ])->assertRedirect('/');
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

    public function testLogout()
    {
        $this->withSession(['user' => 'richo'])->post('/keluar')->assertRedirect('/masuk')->assertSessionMissing('user');
    }

    public function testLogoutBelumLogin()
    {
        $this->post('/keluar')->assertRedirect('/masuk');
    }
}
