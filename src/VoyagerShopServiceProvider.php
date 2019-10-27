<?php

namespace Tjventurini\VoyagerShop;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use Tjventurini\VoyagerShop\Models\Order;
use Tjventurini\VoyagerShop\Models\Payment;
use Tjventurini\VoyagerShop\Observers\OrderObserver;
use Tjventurini\VoyagerShop\Observers\PaymentObserver;
use Tjventurini\VoyagerShop\Console\Commands\VoyagerShopInstall;

class VoyagerShopServiceProvider extends ServiceProvider
{
    /**
     * Boot method of this service provider.
     *
     * @return void
     */
    public function boot()
    {
        // tell laravel where to find the migrations.
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');

        // tell laravel where to publish config if the user wants it to
        $this->publishes([
            __DIR__.'/../config' => config_path(),
        ], 'config');

        // tell laravel where to find the views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'shop');

        // tell laravel where to publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views'),
        ], 'views');

        // tell laravel where to find translations
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'shop');

        // tell laravel where to publish package translations
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/shop'),
        ], 'lang');

        // tell laravel where to publish package graphql schema
        $this->publishes([
            __DIR__.'/../graphql' => base_path('graphql'),
        ], 'graphql');

        // tell laravel where to find routes
        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');

        // publish providers
        $this->publishes([
            __DIR__.'/Providers' => base_path('app/Providers'),
        ], 'providers');

        // publish providers
        $this->publishes([
            __DIR__.'/Policies' => base_path('app/Policies'),
        ], 'policies');

        // publish middleware
        $this->publishes([
            __DIR__.'/Http/Middleware' => base_path('app/Http/Middleware'),
        ], 'middleware');

        // register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                VoyagerShopInstall::class,
            ]);
        }

        // observers
        Order::observe(OrderObserver::class);
        Payment::observe(PaymentObserver::class);

        // update lighthouse configurationc
        config(
            [
                'lighthouse.namespaces.mutations' => array_merge(
                    [
                        'Tjventurini\\VoyagerShop\\GraphQL\\Mutations'
                    ],
                    (!is_array(config('lighthouse.namespaces.mutations'))) ? [config('lighthouse.namespaces.mutations')] : config('lighthouse.namespaces.mutations')
                ),
                'lighthouse.namespaces.queries' => array_merge(
                    [
                        'Tjventurini\\VoyagerShop\\GraphQL\\Queries'
                    ],
                    (!is_array(config('lighthouse.namespaces.queries'))) ? [config('lighthouse.namespaces.queries')] : config('lighthouse.namespaces.queries')
                )
            ]
        );
    }

    /**
     * Register method of this service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
