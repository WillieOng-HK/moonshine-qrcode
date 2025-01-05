<?php

declare(strict_types=1);

namespace Geekstek\Qrcode\Providers;

use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'moonshine-qrcode');

        // $this->publishes([
        //     __DIR__ . '/../../public' => public_path('vendor/moonshine-qrcode'),
        // ], ['moonshine-qrcode-assets', 'laravel-assets']);
    }
}
