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

        $this->publishes([
            __DIR__ . '/../databases/migrations/create_logs_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_user_activity_logs_table.php'),
        ], 'migrations');

    }
}
