<?php

namespace Dipesh79\LaravelUserLogs\Traits;

use Dipesh79\LaravelUserLogs\Models\Log;

trait HasLog
{
    /**
     * This method of trait defines the polymorphic relationship between the model and the Log model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function logs(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Log::class, 'loggable');
    }
}
