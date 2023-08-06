<?php

namespace App\Providers;

use App\Services\Impl\LayananPenggunaImpl;
use App\Services\LayananPengguna;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class LayananPenggunaProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [LayananPengguna::class => LayananPenggunaImpl::class];
    public function provides(): array
    {
        return [LayananPengguna::class];
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
