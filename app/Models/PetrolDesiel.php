<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetrolDesiel extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'petroldesiels';
    protected $primaryKey = 'petrol_id';

    protected $fillable = 
    [
       'vehical_type',
       'fuel_type',
       'fuel_quantity',
       'vehical_registration_no',
       'vehical_image',
       'location',
       'longitude',
       'latitude',
       'description'
    ];
}