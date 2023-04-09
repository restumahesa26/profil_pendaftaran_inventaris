<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ActivityLog extends Model
{
    use HasFactory;

    public $table = 'activity_log';

    public $fillable = [
        'url', 'session_id', 'ip', 'agent', 'user_id', 'activity'
    ];

    public static function createViewLog($user_id, $activity)
    {
        $log = new ActivityLog();
        $log->url = Request::url();
        $log->session_id = Request::getSession()->getId();
        $log->ip = Request::getClientIp();
        $log->agent = Request::header('User-Agent');
        $log->user_id = $user_id;
        $log->activity = $activity;
        $log->save();
    }
}
