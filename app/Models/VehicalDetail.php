<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicalDetail extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'vehicaladddetails';
    protected $primaryKey = 'vehicaladddetail_id';

    protected $fillable = 
    [
       'vehical_detail',
       'vehical_type',
       'vehical_company_name',
       'vehical_name',
       'vehical_registration_no'
    ];

}