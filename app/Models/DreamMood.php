<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\UserDream;

class DreamMood extends Model
{
    protected $table = 'sys_dream_mood';

    public $timestamps = false;

    protected $primaryKey = 'sys_dream_mood_id';

    protected $fillable = [
        'dream_mood', 'is_active', 'is_deleted', 
    ];


    /**
     * Get all of the comments for the DreamMood
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userDream()
    {
        return $this->hasMany(UserDream::class, 'sys_dream_mood_id', 'sys_dream_mood_id')->withDefault();
    }

}
