<?php

namespace Dipesh79\LaravelUserLogs\Traits;

use Dipesh79\LaravelUserLogs\Models\Log;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasLog
{
    protected $listeners = [
        'log' => 'log',
    ];

    public function logs(): MorphMany
    {
        return $this->morphMany(Log::class, 'loggable');
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->logs()->create([
                'action' => 'Create',
                'ip_address' => request()->ip(),
                'device' => request()->userAgent(),
                'user_id' => auth()->user()->id
            ]);
        });

        static::updated(function ($model) {
            $model->logs()->create([
                'action' => 'Update',
                'ip_address' => request()->ip(),
                'device' => request()->userAgent(),
                'user_id' => auth()->user()->id
            ]);
        });

        static::deleted(function ($model) {
            $model->logs()->create([
                'action' => 'Delete',
                'ip_address' => request()->ip(),
                'device' => request()->userAgent(),
                'user_id' => auth()->user()->id
            ]);
        });

    }
}
