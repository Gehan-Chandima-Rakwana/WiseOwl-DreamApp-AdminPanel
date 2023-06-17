<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SysLang;

class Tag extends Model
{
    protected $table = 'tags';

    public $timestamps = false;

    protected $primaryKey = 'tag_id';

    protected $fillable = [
        'tag', 'lang_iso_code', 'created_user_id', 'created_date', 'is_active','is_deleted',
    ];

    /**
     * Get the user that owns the SystemDreamMeaning
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sysLang()
    {
        return $this->belongsTo(SysLang::class, 'lang_iso_code', 'lang_iso_code')->withDefault();
    }


}
