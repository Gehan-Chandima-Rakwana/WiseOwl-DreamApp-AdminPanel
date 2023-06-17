<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SystemDreamMeaning;

class UserDreamMeaning extends Model
{
    protected $table = 'user_dream_meaning';

    public $timestamps = false;

    protected $fillable = [
        'user_dream_id', 'sys_dream_id', 'dream_meaning_id', 'created_time',
    ];

        /**
     * Get the user that owns the DreamMeaningLink
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function SystemDream()
    {
        return $this->BelongsTo(SystemDreamMeaning::class, 'dream_meaning_id', 'dream_meaning_id')->withDefault();
    }

}
