<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SystemDream;
use App\Models\UserDream;

class DreamType extends Model
{
    protected $table = 'dream_type';

    public $timestamps = false;

    protected $primaryKey = 'dream_type_id';

    protected $fillable = [
        'dream_type_name', 'dream_type_detail', 'is_active', 'is_deleted', 'last_updated_date', 
    ];

    /**
     * Get all of the comments for the DreamClarity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userDream()
    {
        return $this->hasMany(UserDream::class, 'dream_type_id', 'dream_type_id')->withDefault();
    }

}
