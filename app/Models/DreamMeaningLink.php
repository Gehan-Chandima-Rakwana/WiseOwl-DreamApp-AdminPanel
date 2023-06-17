<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SystemDreamMeaning;

class DreamMeaningLink extends Model
{
    protected $table = 'dream_meaning_link';

    public $timestamps = false;

    protected $fillable = [
        'sys_dream_id', 'dream_meaning_id'
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
