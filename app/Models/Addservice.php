<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addservice extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'addservices';
    protected $primaryKey = 'service_id';

    protected $fillable = 
    [
       'service_name',
    ];

}