<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app){
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'mw2fzzrkg46z42sk',
                'publicKey' => 'c7qq29gx9r4w8fpc',
                'privateKey' => '1943bc61cbb4ae5a5f2c94276121325e'
            ]);
        });
    }
}
