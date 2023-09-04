<?php

namespace Dipesh79\LaravelUserLogs\Controllers;

class UserLogController extends \Illuminate\Routing\Controller
{

    public function index()
    {
        $logs = \Dipesh79\LaravelUserLogs\Models\Log::with('user')->orderBy('id', 'desc')->get();
        return app('view')->make('laravel-user-logs::logs', compact('logs'));
    }
}
