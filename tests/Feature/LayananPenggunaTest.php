<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\LayananPengguna;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class LayananPenggunaTest extends TestCase
{
    private LayananPengguna $layananPengguna;

    protected function setUp(): void
    {
        parent::setUp();
        $this->layananPengguna = $this->app->make(LayananPengguna::class);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->layananPengguna->login('richo', '123'));
    }

    public function testLoginFail()
    {
        self::assertFalse($this->layananPengguna->login('abc', 'abc'));
    }

    public function testLoginPasswordSalah()
    {
        self::assertFalse($this->layananPengguna->login('richo', '1234'));
    }

}
