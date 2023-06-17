<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysLang extends Model
{
    protected $table = 'sys_lang';

    public $timestamps = false;

    // protected $primaryKey = 'dream_type_id';

    protected $fillable = [
        'lang_iso_code', 'language', 'is_active', 
    ];
}
