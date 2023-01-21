<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Care extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'cares';
    protected $primaryKey = 'care_id';

    protected $fillable = [
       'servicetype',
       'tyre_type',
       'vehical_type',
    ];

}