<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'feedbacks';
    protected $primaryKey = 'feedback_id';

    protected $fillable = [
       'booking_date_time',
       'service_name',
       'service_status',
       'vehical_type',
       'tyre_type',
       'cust_detail',
       'shop_detail',
       'calling_status',
       'description',
       'next_call_date_time'
    ];

}