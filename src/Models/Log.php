<?php

namespace Dipesh79\LaravelUserLogs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Log extends Model
{
    protected $guarded = [];

    protected $table = 'user_activity_logs';

    public $timestamps = true;

    public function loggable(): MorphTo
    {
        return $this->morphTo();
    }
}
