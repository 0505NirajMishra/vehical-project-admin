<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class shopemployee extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'shopemployees';
    protected $primaryKey = 'shopemployee_id';

    protected $fillable = [
       'booking_date_time',
       'location',
       'servicetype',
       'tyre_type',
       'vehical_type',
       'service_status'
    ];

}