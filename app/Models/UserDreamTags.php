<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Tag;

class UserDreamTags extends Model
{
    protected $table = 'user_dream_tags';

    public $timestamps = false;

    protected $fillable = [
        'user_dream_id', 'tag_id', 'created_time', 
    ];

    /**
     * Get the user that owns the UserDreamTags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'tag_id');
    }
}
