<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\DreamType;
use App\Models\DreamClarity;
use App\Models\DreamMood;
use App\Models\SysYamayan;
use App\Models\SleepQuality;

class UserDream extends Model
{
    protected $table = 'user_dream';

    public $timestamps = false;

    protected $primaryKey = 'user_dream_id';

    protected $fillable = [
        'user_id', 'dream_title', 'dream_story', 'dream_datetime', 'sys_dream_clarity_id', 'sys_dream_mood_id', 
        'sys_sleep_quality', 'sys_yamayan', 'dream_type_id', 'created_time', 'created_user_id', 'last_updated_time', 
        'last_updated_user', 'is_active', 'is_deleted', 
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id')->withDefault();
    }


    public function dreamType()
    {
        return $this->belongsTo(DreamType::class, 'dream_type_id', 'dream_type_id')->withDefault();
    }


    public function dreamClarity()
    {
        return $this->belongsTo(DreamClarity::class, 'sys_dream_clarity_id', 'sys_dream_clarity_id')->withDefault();
    }


    public function dreamMood()
    {
        return $this->belongsTo(DreamMood::class, 'sys_dream_mood_id', 'sys_dream_mood_id')->withDefault();
    }


    public function sleepQuality()
    {
        return $this->belongsTo(SleepQuality::class, 'sys_sleep_quality', 'sleep_quality_id')->withDefault();
    }


    public function sysYamayan()
    {
        return $this->belongsTo(SysYamayan::class, 'sys_yamayan', 'yamayan_id')->withDefault();
    }




}
