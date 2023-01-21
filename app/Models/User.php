<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
    
    protected $fillable = [
        'customer_name',
        'email',
        'customer_mobile',
        'company_name',
        'vehical_name',
        'service_type',
        'password',
        'customer_cpassword',
        'fcm_token',
        'status',
        'user_type',      
    ];
   
    protected $hidden = [
        'password',
        'customer_cpassword',
        'remember_token',
    ];

    public function ratings(){
           return $this->hasMany('App\Models\Rating');
    }

    public static function getImageAttribute($value)
    {
        if ($value) {
            return FileService::getFileUrl('files/users/', $value, 'user');
        } else {
            return url('/') . '/blank_user.png';
        }
    }
   
    public function getJWTIdentifier()
    {
           return $this->getKey();
    }
 
    public function getJWTCustomClaims()
    {
           return [];
    }

}