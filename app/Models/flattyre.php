<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class flattyre extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'flattyres';
    protected $primaryKey = 'flattyre_id';

    protected $fillable = 
    [
       'vehical_type',
       'tube_tyre',
       'tyre_width',
       'tyre_wheel_size',
       'tyre_speed_rating',
       'vehical_registration_no',
       'tyresize_image',
       'location',
       'longitude',
       'latitude',
       'description'
    ];
}