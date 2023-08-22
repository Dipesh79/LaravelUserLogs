<?php

namespace Dipesh79\LaravelUserLogs\Models;

class Log extends \Illuminate\Database\Eloquent\Model
{
    /**
     * This property defines the fields that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * This property defines the table name for the model.
     *
     * @var string
     */
    protected $table = 'user_activity_logs';

    /**
     * This property defines the timestamps for the model.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * This method defines the relationship between the Log model and the model that is being logged.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function loggable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    /**
     * This method is used to add a new log with default values. It can be used to add a log for any action.
     *
     * @param string $action
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addLog($action = 'create'): \Illuminate\Database\Eloquent\Model
    {
        return $this->create([
            'action' => $action,
            'ip_address' => request()->ip(),
            'device' => request()->userAgent(),
            'user_id' => auth()->user()->id
        ]);
    }
}
