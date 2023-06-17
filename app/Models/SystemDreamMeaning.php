<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SysLang;

class SystemDreamMeaning extends Model
{
    protected $table = 'dream_meaning';

    public $timestamps = false;

    protected $primaryKey = 'dream_meaning_id';

    protected $fillable = [
        'dream_meaning', 'lang_iso_code', 
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
