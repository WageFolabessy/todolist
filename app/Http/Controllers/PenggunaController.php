<?php

namespace App\Http\Controllers;

use App\Services\LayananPengguna;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PenggunaController extends Controller
{
    private LayananPengguna $layananPengguna;

    public function __construct(LayananPengguna $layananPengguna)
    {
        $this->layananPengguna = $layananPengguna;
    }

    public function masuk(): View
    {
        return view('user.masuk', [
            'title' => 'Login',
        ]);
    }
    
    public function doMasuk(Request $request): View | RedirectResponse
    {
        $user = $request->input('user');
        $password = $request->input('password');

        if(empty($user) || empty($password))
        {
            return view('user.masuk', [
                'title' => 'Login',
                'error' => 'User dan Password wajib diisi'
            ]);
        }

        if($this->layananPengguna->login($user, $password))
        {
            $request->session()->put('user', $user);
            return redirect('/');
        }

        return view('user.masuk', [
            'title' => 'Login',
            'error' => 'User atau Password salah'
        ]);
    }

    public function doKeluar(Request $request): RedirectResponse
    {
        $request->session()->forget('user');
        return redirect('/masuk');
    }
}
