<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysYamayan extends Model
{
    protected $table = 'sys_yamayan';

    public $timestamps = false;

    protected $primaryKey = 'yamayan_id';

    protected $fillable = [
        'yamaya_from', 'yamaya_to', 'period', 'yamayan_details', 
    ];
}
