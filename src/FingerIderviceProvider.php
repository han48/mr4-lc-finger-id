<?php

namespace Mr4Lc\FingerId;

use Illuminate\Support\ServiceProvider;

class FingerIderviceProvider extends ServiceProvider
{

    public $assets = __DIR__ . '/../resources/assets';

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        if ($this->app->runningInConsole() && $assets = $this->assets) {
            $this->publishes(
                [$assets => public_path('vendor/mr4-lc/finger-id')],
                'mr4-lc-finger-id'
            );
        }
    }
}
