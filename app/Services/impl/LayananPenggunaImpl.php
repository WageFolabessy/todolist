<?php

namespace App\Services\Impl;
use App\Services\LayananPengguna;

class LayananPenggunaImpl implements LayananPengguna
{
    private array $users = [
        "richo" => "123",
        'rinam' => '123'
    ];

    function login(string $user, string $password): bool
    {
        if(!isset($this->users[$user]))
        {
            return false;
        }
        $passwordBenar = $this->users[$user];
        return $password == $passwordBenar;
    }
}

?>