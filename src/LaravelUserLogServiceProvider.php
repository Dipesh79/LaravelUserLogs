<?php

namespace Dipesh79\LaravelUserLogs;

use Illuminate\Support\ServiceProvider;

class LaravelUserLogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (method_exists($this, 'loadViewsFrom')) {
            $this->loadViewsFrom(__DIR__.'/views', 'laravel-user-logs');
        }
        if (method_exists($this, 'publishes')) {
            $this->publishes([
                __DIR__ . '/../databases/migrations/create_logs_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_user_activity_logs_table.php'),
            ], 'migrations');
        }

    }
}
