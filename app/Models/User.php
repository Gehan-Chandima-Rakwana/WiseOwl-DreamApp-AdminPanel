<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\UserRole;

class User extends Authenticatable
{
    protected $table = 'user';

    public $timestamps = false;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username', 'password', 'first_name', 'last_name', 'age','country','timezone','sys_user_role_id',
        'created_time','is_active','is_deleted','deleted_time','email'
    ];

    
    public function userRole()
    {
        return $this->belongsTo(UserRole::class, 'sys_user_role_id', 'sys_user_role_id')->withDefault();
    }

}
