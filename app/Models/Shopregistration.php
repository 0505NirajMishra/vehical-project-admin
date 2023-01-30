<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shopregistration extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'shop_registrations';
    protected $primaryKey = 'shop_id';

    protected $fillable = 
    [
       'company_name',
       'gst_no',
       'owner_name',
       'address',
       'email',
       'mobile',
       'year_of_exper',
       'about_you',
       'password',
       'c_password',
       'work_place_photo',
       'profile_image',
       'location',
       'longitude',
       'latitude',
    ];
}