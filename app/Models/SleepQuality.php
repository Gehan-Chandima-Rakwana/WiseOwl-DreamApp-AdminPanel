<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SleepQuality extends Model
{
    protected $table = 'sys_sleep_quality';

    public $timestamps = false;

    protected $primaryKey = 'sleep_quality_id';

    protected $fillable = [
        'sleep_quality', 'is_active', 'is_deleted', 
    ];

}
