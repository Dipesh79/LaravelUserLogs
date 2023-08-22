<?php

namespace Dipesh79\LaravelUserLogs\Traits;

use Dipesh79\LaravelUserLogs\Models\Log;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasLog
{
    public function logs(): MorphMany
    {
        return $this->morphMany(Log::class, 'loggable');
    }
}
