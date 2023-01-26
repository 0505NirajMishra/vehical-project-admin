<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class flatBattery extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'flatbatterys';
    protected $primaryKey = 'flatbattery_id';

    protected $fillable = 
    [
       'vehical_type',
       'battery_photo',
       'vehical_registration_no',
       'vehical_image',
       'location',
       'longitude',
       'latitude',
       'description'
    ];
}