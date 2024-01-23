<?php

namespace Dipesh79\LaravelUserLogs\Traits;

use Dipesh79\LaravelUserLogs\Models\Log;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasLog
{
    protected $listeners = [
        'log' => 'log',
    ];

    /**
     * This method of trait defines the boot method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        /**
         * The parent boot method is called to ensure that the parent boot method is not overridden.
         */
        parent::boot();

        /**
         * The created event for the model is listened to and the logs are created.
         */
        if (auth()->user()) {
            static::created(function ($model) {
                $model->logs()->create([
                    'action' => 'Create',
                    'ip_address' => request()->ip(),
                    'device' => request()->userAgent(),
                    'user_id' => auth()->user()->id
                ]);
            });
        }

        /**
         * The updated event for the model is listened to and the logs are created.
         */
        if (auth()->user()) {
            static::updated(function ($model) {
                $model->logs()->create([
                    'action' => 'Update',
                    'ip_address' => request()->ip(),
                    'device' => request()->userAgent(),
                    'user_id' => auth()->user()->id,
                    'old_values' => json_encode($model->getRawOriginal()),
                    'changed_values' => json_encode($model->getChanges())
                ]);
            });
        }

        /**
         * The deleted event for the model is listened to and the logs are created.
         */
        if (auth()->user()) {
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

    public function logs(): MorphMany
    {
        return $this->morphMany(Log::class, 'loggable');
    }
}
