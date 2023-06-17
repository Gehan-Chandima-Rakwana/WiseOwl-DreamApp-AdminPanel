<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DreamType;

class SystemDream extends Model
{
    protected $table = 'dream';

    public $timestamps = false;

    protected $primaryKey = 'sys_dream_id';

    protected $fillable = [
        'sys_dream', 'sys_dream_type', 'created_date', 'is_active', 'is_deleted', 'last_updated_date', 
    ];


    /**
     * Get the user associated with the SystemDream
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dreamType()
    {
        return $this->hasOne(DreamType::class, 'dream_type_id', 'sys_dream_type')->withDefault();
    }

}
