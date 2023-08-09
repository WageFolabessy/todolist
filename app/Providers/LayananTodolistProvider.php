<?php

namespace App\Providers;

use App\Services\Impl\LayananTodolistImpl;
use App\Services\LayananTodolist;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;


class LayananTodolistProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [LayananTodolist::class => LayananTodolistImpl::class];

    public function provides(): array
    {
        return [LayananTodolist::class];
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
