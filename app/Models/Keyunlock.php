<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keyunlock extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'keyunlocks';
    protected $primaryKey = 'keyunlocks_id';

    protected $fillable = 
    [
       'vehical_type',
       'vehical_photo',
       'vehical_registration_no',
       'service_location',
       'service_longitude',
       'service_latitude',
       'description',
       'status'
    ];
}