<?php

namespace App\Services;

interface LayananPengguna
{
    function login(string $user, string $password): bool;
}

?>