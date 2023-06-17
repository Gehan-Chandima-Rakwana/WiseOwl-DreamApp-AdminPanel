<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserDream;

class DreamClarity extends Model
{
    protected $table = 'sys_dream_clarity';

    public $timestamps = false;

    protected $primaryKey = 'sys_dream_clarity_id';

    protected $fillable = [
        'dream_clarity', 'is_active', 'is_deleted', 
    ];

    /**
     * Get all of the comments for the DreamClarity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userDream()
    {
        return $this->hasMany(UserDream::class, 'sys_dream_clarity_id', 'sys_dream_clarity_id')->withDefault();
    }
}
