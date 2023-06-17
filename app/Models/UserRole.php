<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'sys_role';

    public $timestamps = false;

    protected $primaryKey = 'sys_user_role_id';

    protected $fillable = [
        'sys_user_role', 'created_time', 'is_active', 'is_deleted',
    ];
}
