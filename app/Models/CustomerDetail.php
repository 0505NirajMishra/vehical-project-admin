<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerDetail extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'customerdetails';
    protected $primaryKey = 'customer_id';

    protected $fillable = 
    [
       'shop_employee',
       'booking_date_time',
       'location',
       'service_status',
       'servicetype',
       'tyre_type',
       'vehical_type',
    ];
}