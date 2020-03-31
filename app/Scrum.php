<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scrum extends Model
{
    protected $table = "daily_scrum";

    protected $fillable = [
        'id_users',
        'team',
        'activity_yesterday',
        'activity_today',
        'problem_yesterday',
        'solution',
    ];
}
