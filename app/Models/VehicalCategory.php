<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicalCategory extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'vehicalcategorys';
    protected $primaryKey = 'vehical_catgeory_id';

    protected $fillable = [
       'vehical_name',
       'vehical_logo',
       'vehical_type'
    ];

}